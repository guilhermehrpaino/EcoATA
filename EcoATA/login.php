<?php
session_start(); // Inicia a sessão para manter o utilizador logado
require_once 'conexao.php';

$erro = '';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = trim($_POST['email']);
    $senha = $_POST['senha'];

    try {
        
        $sql = "SELECT * FROM usuarios WHERE email = :email";
        $stmt = $conexao->prepare($sql);
        $stmt->execute([':email' => $email]);
        $usuario = $stmt->fetch();

        
        if ($usuario && password_verify($senha, $usuario['senha'])) {
            // Guarda os dados na sessão
            $_SESSION['id_usuario'] = $usuario['id'];
            $_SESSION['nome_usuario'] = $usuario['nome'];
            
            
            header("Location: recompensa.php");
            exit;
        } else {
            $erro = "E-mail ou senha incorretos.";
        }
    } catch (\PDOException $erro) {
        $erro = "Erro no sistema: " . $erro->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - EcoATA</title>
    <style>
        body {
            background-color: #fbfbfb;
            
            background-image: url("./img/fundo-mapa.png");
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
    </style>
</head>



<div class="login-container">
    
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
    
    <form method="POST" action="login.php">
        <input type="text" name="email" placeholder="Usuário ou E-mail" required value="admin">
        <input type="password" name="senha" placeholder="Senha" required value="123456">
        <button type="submit">Entrar</button>
        
        <a href="cadastro.php" class="btn-secundario">Criar nova conta</a>
    </form>
</div>

</body>
</html>
