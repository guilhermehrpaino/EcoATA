<?php

$host = 'localhost';
$dbname = 'ideathon_aracatuba';
$usuario = 'root';
$senha = ''; 


$dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";


$opcoes = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, 
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,       
    PDO::ATTR_EMULATE_PREPARES   => false,                  
];

try {
    
    $pdo = new PDO($dsn, $usuario, $senha, $opcoes);
    
} catch (\PDOException $erro) {
    
    die("Erro de conexão com o banco de dados: " . $erro->getMessage());
}
?>
