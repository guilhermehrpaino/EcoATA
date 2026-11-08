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
    $stmt_saldo = $conexao->prepare("SELECT saldo_pontos FROM usuarios WHERE id = :id");
    $stmt_saldo->execute([':id' => $id_usuario]);
    $saldo = $stmt_saldo->fetchColumn();

    $stmt_recompensas = $conexao->query("SELECT * FROM recompensas WHERE ativo = 1 ORDER BY custo_pontos ASC");
    $recompensas = $stmt_recompensas->fetchAll();
} catch (\PDOException $e) {
    die("Erro ao buscar dados: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recompensas - EcoATA</title>
    
    <link rel="stylesheet" href="./css/estilo.css">
    
    <style>
        body { 
            background-color: #f8faf9; 
            color: #222; 
            font-family: Arial, sans-serif; 
            margin: 0; 
            padding: 0; 
        }
        
        .container { padding: 40px 20px; max-width: 1100px; margin: 0 auto; }
        
        .header-painel { 
            display: flex; 
            justify-content: space-between; 
            align-items: center; 
            background-color: #ffffff; 
            padding: 25px; 
            border-radius: 12px; 
            margin-bottom: 30px; 
            border: 1px solid #e0e0e0;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.05); 
        }
        .header-painel h2 { margin: 0 0 5px 0; color: #222; font-size: 24px; }
        .saldo { color: #16834a; font-size: 26px; font-weight: bold; }
        
        /* Botão de simular câmara */
        .btn-scan-link {
            background-color: #edf5ef;
            color: #16834a;
            border: 1px solid #16834a;
            padding: 12px 20px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: bold;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: 0.2s ease;
        }
        .btn-scan-link:hover {
            background-color: #16834a;
            color: #ffffff;
            transform: translateY(-2px);
        }
        
        
        .grid-cupons { 
            display: grid; 
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); 
            gap: 20px; 
        }
        
       
        .cupom-card { 
            background-color: #ffffff; 
            border: 1px solid #e0e0e0; 
            border-radius: 12px; 
            padding: 25px 20px; 
            text-align: center; 
            display: flex; 
            flex-direction: column; 
            justify-content: space-between; 
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.05);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }
        .cupom-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.10);
        }
        .cupom-card small { color: #666; font-size: 14px; }
        .cupom-card h3 { margin: 12px 0; color: #176b40; font-size: 20px; }
        .cupom-card p { font-weight: bold; color: #222; margin-bottom: 20px; }
        
        
        .btn-resgatar { 
            background-color: #16834a; 
            color: #ffffff; 
            border: none; 
            padding: 12px; 
            border-radius: 6px; 
            cursor: pointer; 
            font-weight: bold; 
            margin-top: auto; 
            transition: 0.2s; 
            font-size: 15px;
        }
        .btn-resgatar:hover { background-color: #116839; }
        .btn-disabled { background-color: #e0e0e0; color: #888; cursor: not-allowed; }
        .btn-disabled:hover { background-color: #e0e0e0; }
        
        
        .alerta { padding: 15px; border-radius: 6px; margin-bottom: 20px; text-align: center; font-weight: bold; }
        .alerta-sucesso { background-color: #edf5ef; border: 1px solid #16834a; color: #16834a; }
        .alerta-erro { background-color: #fce8e8; border: 1px solid #e53935; color: #e53935; }

        footer {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
        }

    </style>
</head>
<body>

   
    <?php require_once 'nav.php'; ?>

    <div class="container">
       
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
                        <form action="processar_resgate.php" method="POST" style="margin-top: 15px; display: flex; flex-direction: column;">
                            <input type="hidden" name="id_recompensa" value="<?= $cupom['id'] ?>">
                            <button type="submit" class="btn-resgatar" style="width: 100%;">Resgatar</button>
                        </form>
                    <?php else: ?>
                        <button class="btn-resgatar btn-disabled" disabled style="width: 100%; margin-top: 15px;">Pontos insuficientes</button>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <footer>
        <?php require_once("./footer.php") ?>
    </footer>
</body>
</html>
