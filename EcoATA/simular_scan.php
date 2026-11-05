<?php
session_start();
require_once 'conexao.php';

// Proteção de sessão
if (!isset($_SESSION['id_usuario'])) {
    header("Location: login.php");
    exit;
}

$mensagem = '';
$tipo_alerta = '';

// Se o botão de simular scan for clicado
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['hash_lido'])) {
    $id_usuario = $_SESSION['id_usuario'];
    $hash_lido = trim($_POST['hash_lido']); // O código que veio do QR Code

    try {
        $pdo->beginTransaction();

        // 1. Verifica se o QR Code existe e está ativo
        $stmt_qr = $pdo->prepare("SELECT id, pontos_concedidos FROM qr_codes WHERE hash_codigo = :hash AND ativo = 1");
        $stmt_qr->execute([':hash' => $hash_lido]);
        $qr_code = $stmt_qr->fetch();

        if (!$qr_code) {
            throw new Exception("QR Code inválido ou inativo.");
        }

        $id_qrcode = $qr_code['id'];
        $pontos_ganhos = $qr_code['pontos_concedidos'];

        // 2. Verifica se o usuário JÁ escaneou esse mesmo QR Code HOJE (regra antifraude)
        $stmt_check = $pdo->prepare("SELECT id FROM historico_scans WHERE id_usuario = :id_user AND id_qrcode = :id_qr AND DATE(lido_em) = CURDATE()");
        $stmt_check->execute([':id_user' => $id_usuario, ':id_qr' => $id_qrcode]);
        
        if ($stmt_check->rowCount() > 0) {
            throw new Exception("Você já resgatou os pontos desta viagem hoje!");
        }

        // 3. Registra o scan no histórico
        $stmt_insert = $pdo->prepare("INSERT INTO historico_scans (id_usuario, id_qrcode) VALUES (:id_user, :id_qr)");
        $stmt_insert->execute([':id_user' => $id_usuario, ':id_qr' => $id_qrcode]);

        // 4. Adiciona os pontos ao saldo do usuário
        $stmt_update = $pdo->prepare("UPDATE usuarios SET saldo_pontos = saldo_pontos + :pontos WHERE id = :id_user");
        $stmt_update->execute([':pontos' => $pontos_ganhos, ':id_user' => $id_usuario]);

        $pdo->commit();
        
        $mensagem = "Sucesso! Você ganhou +{$pontos_ganhos} pontos pela sua viagem sustentável!";
        $tipo_alerta = "sucesso";

    } catch (Exception $e) {
        $pdo->rollBack();
        $mensagem = $e->getMessage();
        $tipo_alerta = "erro";
    }
}
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leitor de QR Code - Transporte Araçatuba</title>
    <style>
        body { background-color: #121212; color: #ffffff; font-family: Arial, sans-serif; display: flex; flex-direction: column; align-items: center; justify-content: center; height: 100vh; margin: 0; }
        .camera-box { background-color: #1e1e1e; border: 2px dashed #00e676; border-radius: 15px; width: 300px; height: 300px; display: flex; align-items: center; justify-content: center; margin-bottom: 20px; box-shadow: 0 0 20px rgba(0, 230, 118, 0.1); }
        .btn-scan { background-color: #00e676; color: #000; border: none; padding: 15px 30px; border-radius: 8px; font-size: 16px; font-weight: bold; cursor: pointer; transition: 0.2s; }
        .btn-scan:hover { background-color: #00c853; transform: scale(1.05); }
        .btn-voltar { margin-top: 20px; color: #aaa; text-decoration: none; }
        .btn-voltar:hover { color: #fff; }
        .alerta { padding: 15px; border-radius: 8px; margin-bottom: 20px; width: 300px; text-align: center; font-weight: bold; }
        .alerta.sucesso { background-color: rgba(0, 230, 118, 0.2); border: 1px solid #00e676; color: #00e676; }
        .alerta.erro { background-color: rgba(255, 82, 82, 0.2); border: 1px solid #ff5252; color: #ff5252; }
    </style>
</head>
<body>

    <h2>Validar Viagem</h2>
    <p style="color: #aaa; margin-bottom: 30px;">Aponte para o QR Code do ônibus</p>

    <?php if ($mensagem): ?>
        <div class="alerta <?= $tipo_alerta ?>"><?= $mensagem ?></div>
    <?php endif; ?>

    <div class="camera-box">
        <!-- Ícone simulando uma câmera -->
        <span style="font-size: 50px;">📱</span>
    </div>

    <!-- Formulário que envia o Hash fixo simulando a leitura real -->
    <form method="POST">
        <input type="hidden" name="hash_lido" value="QR-LINHA-01-FATEC">
        <button type="submit" class="btn-scan">Simular Leitura do QR Code</button>
    </form>

    <a href="recompensa.php" class="btn-voltar">← Voltar para Recompensas</a>

</body>
</html>