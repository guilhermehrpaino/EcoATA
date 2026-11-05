<?php
// Configurações do banco de dados (padrões do XAMPP)
$host = 'localhost';
$dbname = 'ideathon_aracatuba';
$usuario = 'root';
$senha = ''; // No XAMPP, a senha do root por padrão é vazia

// DSN (Data Source Name) - especifica o tipo de banco e o charset
$dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";

// Opções do PDO para melhor tratamento de erros e retorno de dados
$opcoes = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, // Lança exceções em caso de erro
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,       // Retorna dados como array associativo
    PDO::ATTR_EMULATE_PREPARES   => false,                  // Usa prepared statements reais
];

try {
    // Tenta estabelecer a conexão
    $pdo = new PDO($dsn, $usuario, $senha, $opcoes);
    // echo "Conexão bem-sucedida!"; // Descomente para testar, mas apague em produção
} catch (\PDOException $erro) {
    // Captura e exibe o erro caso a conexão falhe
    die("Erro de conexão com o banco de dados: " . $erro->getMessage());
}
?>
