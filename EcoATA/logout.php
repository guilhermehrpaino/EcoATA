<?php
session_start();

// Destrói todas as informações da sessão
session_unset();
session_destroy();

// Redireciona de volta para a página inicial (Home)
header("Location: index.php");
exit;
?>