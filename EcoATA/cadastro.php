<?php
session_start();
require_once 'conexao.php';

$erro = '';
$sucesso = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = trim($_POST['nome']);
    $email = trim($_POST['email']);
    $senha = $_POST['senha'];

    try {
        $stmt_check = $pdo->prepare("SELECT id FROM usuarios WHERE email = :email");
        $stmt_check->execute([':email' => $email]);
        
        if ($stmt_check->rowCount() > 0) {
            $erro = "Este usuário já está cadastrado!";
        } else {
            $senha_hash = password_hash($senha, PASSWORD_DEFAULT);
            $saldo_inicial = 100; // Bônus de boas-vindas

            $sql = "INSERT INTO usuarios (nome, email, senha, saldo_pontos) VALUES (:nome, :email, :senha, :saldo_pontos)";
            $stmt = $pdo->prepare($sql);
            
            $stmt->execute([
                ':nome' => $nome,
                ':email' => $email,
                ':senha' => $senha_hash,
                ':saldo_pontos' => $saldo_inicial
            ]);

            $sucesso = "Conta criada com sucesso! Ganhou 100 pontos. Faça o login.";
        }
    } catch (\PDOException $e) {
        $erro = "Erro no sistema: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nova Conta - EcoATA</title>
    <style>
        body {
            background-color: #fbfbfb;
            background-image: url('fundo-mapa.png'); /* Usando a sua imagem PNG */
            background-size: cover;
            background-position: center;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .login-container {
            background-color: #121212;
            color: #ffffff;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.25);
            text-align: center;
            width: 300px;
            position: relative;
            z-index: 10;
        }

        input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #333;
            border-radius: 4px;
            background-color: #2c2c2c;
            color: #fff;
            box-sizing: border-box;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #00e676; 
            color: #000;
            border: none;
            border-radius: 4px;
            font-weight: bold;
            cursor: pointer;
            margin-top: 15px;
            transition: 0.2s;
        }

        button:hover {
            background-color: #00c853;
        }

        .btn-secundario {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: transparent;
            color: #00e676;
            border: 1px solid #00e676;
            border-radius: 4px;
            text-decoration: none;
            font-weight: bold;
            margin-top: 10px;
            box-sizing: border-box;
            transition: 0.3s;
        }

        .btn-secundario:hover {
            background-color: rgba(0, 230, 118, 0.1);
        }

        .erro {
            color: #ff5252;
            margin-bottom: 15px;
            font-size: 14px;
        }

        .sucesso {
            color: #00e676;
            margin-bottom: 15px;
            font-size: 14px;
        }
    </style>
</head>
<body>

<div class="login-container">
    <!-- Logótipo EcoATA centrado -->
    <div style="display: flex; justify-content: center; margin-bottom: 25px;">
        <svg width="180" height="40" viewBox="0 0 180 40" xmlns="http://www.w3.org/2000/svg">
            <path d="M 20 5 C 12 5, 5 12, 5 20 C 5 30, 20 40, 20 40 C 20 40, 35 30, 35 20 C 35 12, 28 5, 20 5 Z" fill="none" stroke="#00e676" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M 20 12 C 15 16, 15 23, 20 27 C 25 23, 25 16, 20 12 Z" fill="#00e676"/>
            <text x="45" y="28" font-family="Arial, sans-serif" font-size="24" font-weight="900" letter-spacing="1">
                <tspan fill="#00e676">Eco</tspan><tspan fill="#ffffff">ATA</tspan>
            </text>
        </svg>
    </div>
    
    <?php if ($erro): ?>
        <div class="erro"><?= $erro ?></div>
    <?php endif; ?>
    
    <?php if ($sucesso): ?>
        <div class="sucesso"><?= $sucesso ?></div>
        <a href="login.php" class="btn-secundario">Ir para o Login</a>
    <?php else: ?>
        <form method="POST" action="cadastro.php">
            <input type="text" name="nome" placeholder="Seu Nome Completo" required>
            <input type="text" name="email" placeholder="Crie um Usuário (ex: joao)" required>
            <input type="password" name="senha" placeholder="Crie uma Senha" required>
            <button type="submit">Cadastrar</button>
            <a href="login.php" class="btn-secundario">Já tenho conta</a>
        </form>
    <?php endif; ?>
</div>

</body>
</html>