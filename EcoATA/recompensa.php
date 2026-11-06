<?php
session_start();

if (!isset($_SESSION['id_usuario'])) {
    header("Location: login.php");
    exit;
}

require_once 'conexao.php';

$id_usuario = $_SESSION['id_usuario'];
$nome_usuario = $_SESSION['nome_usuario'];

try {
    $stmt_saldo = $pdo->prepare("SELECT saldo_pontos FROM usuarios WHERE id = :id");
    $stmt_saldo->execute([':id' => $id_usuario]);
    $saldo = $stmt_saldo->fetchColumn();

    $stmt_recompensas = $pdo->query("SELECT * FROM recompensas WHERE ativo = 1 ORDER BY custo_pontos ASC");
    $recompensas = $stmt_recompensas->fetchAll();
} catch (\PDOException $e) {
    die("Erro ao buscar dados: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recompensas - Araçatuba</title>
    <style>
        body { background-color: #121212; color: #ffffff; font-family: Arial, sans-serif; margin: 0; padding: 0; }
        .navbar { background-color: #1e1e1e; padding: 15px 30px; display: flex; justify-content: space-between; align-items: center; border-bottom: 2px solid #00e676; }
        .navbar a { color: #fff; text-decoration: none; margin: 0 10px; }
        .navbar a.active { color: #00e676; font-weight: bold; }
        .container { padding: 30px; max-width: 900px; margin: 0 auto; }
        .header-painel { display: flex; justify-content: space-between; align-items: center; background-color: #1e1e1e; padding: 20px; border-radius: 8px; margin-bottom: 20px; }
        .saldo { color: #00e676; font-size: 24px; font-weight: bold; }
        .btn-scan-link {
    background-color: transparent;
    color: #00e676;
    border: 2px solid #00e676;
    padding: 10px 20px;
    border-radius: 8px;
    text-decoration: none;
    font-weight: bold;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    transition: 0.3s;
}
.btn-scan-link:hover {
    background-color: rgba(0, 230, 118, 0.1);
    transform: translateY(-2px);
}
    </style>
</head>
<body>

    <div class="navbar">
        <div>
            <a href="index.php">Home</a>
            <a href="#">Mapa de Linhas</a>
            <a href="sobre.php">Sobre</a>
            <a href="#" class="active">Recompensa</a>
        </div>
        <a href="logout.php" style="color: #ff5252;">Sair</a>
    </div>

    <div class="container">
        <!-- Área de Alertas -->
        <?php if (isset($_SESSION['mensagem_sucesso'])): ?>
            <div class="alerta alerta-sucesso">
                <?= $_SESSION['mensagem_sucesso'] ?>
            </div>
            <?php unset($_SESSION['mensagem_sucesso']); ?>
        <?php endif; ?>

        <?php if (isset($_SESSION['mensagem_erro'])): ?>
            <div class="alerta alerta-erro">
                <?= $_SESSION['mensagem_erro'] ?>
            </div>
            <?php unset($_SESSION['mensagem_erro']); ?>
        <?php endif; ?>

        <div class="header-painel">
    <div>
        <h2>Olá, <?= htmlspecialchars($nome_usuario) ?>!</h2>
        <div class="saldo"><?= $saldo ?> pts</div>
    </div>
    
    <!-- Este é o botão novo que leva para a câmera -->
    <a href="simular_scan.php" class="btn-scan-link">
        📷 Escanear QR Code
    </a>
</div>

        <div class="grid-cupons">
            <?php foreach ($recompensas as $cupom): ?>
                <div class="cupom-card">
                    <small><?= htmlspecialchars($cupom['parceiro']) ?></small>
                    <h3><?= htmlspecialchars($cupom['titulo']) ?></h3>
                    <p><?= $cupom['custo_pontos'] ?> pts</p>
                    
                    <?php if ($saldo >= $cupom['custo_pontos']): ?>
                        <form action="processar_resgate.php" method="POST" style="margin-top: 15px;">
                            <input type="hidden" name="id_recompensa" value="<?= $cupom['id'] ?>">
                            <button type="submit" class="btn-resgatar" style="width: 100%; margin-top: 0;">Resgatar</button>
                        </form>
                    <?php else: ?>
                        <button class="btn-resgatar btn-disabled" disabled>Pontos insuficientes</button>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

</body>
</html>