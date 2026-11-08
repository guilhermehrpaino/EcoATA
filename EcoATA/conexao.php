<?php
$dns="EnderecoDNSAqui";
$user="UsuarioAqui";
$pass="senhaAqui";
$opcoes = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, 
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,       
    PDO::ATTR_EMULATE_PREPARES   => false,                  
];


    try {
        $conexao = new PDO($dns, $user, $pass, $opcoes);
    } catch(PDOException $erro) {
        echo("Entre em contato com o suporte!");
    }
