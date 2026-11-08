<?php
$dns="mysql:host=sql102.infinityfree.com;dbname=if0_43383171_ideathon_fatec;charset=utf8";
$user="if0_43383171";
$pass="ideathonpass";
$opcoes = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, 
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,       
    PDO::ATTR_EMULATE_PREPARES   => false,                  
];


    try {
        $conexao = new PDO($dns, $user, $pass, $opcoes);
    } catch(PDOException $erro) {
        echo("Entre em contato com o suporte!")
    }
