<?php
require_once 'conexao.php';

$nome = "Administrador";
$email = "admin";
$senha_plana = "123456"; 

$senha_hash = password_hash($senha_plana, PASSWORD_DEFAULT);
$saldo_inicial = 5000; 

try {
    $sql = "INSERT INTO usuarios (nome, email, senha, saldo_pontos) VALUES (:nome, :email, :senha, :saldo_pontos)";
    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        ':nome' => $nome,
        ':email' => $email,
        ':senha' => $senha_hash,
        ':saldo_pontos' => $saldo_inicial
    ]);

    echo "Usuário 'admin' criado com sucesso! Agora você pode fazer o login.";

} catch (\PDOException $e) {
    echo "Erro ao cadastrar: " . $e->getMessage();
}
?>