<?php
$dns="mysql:host=sql102.infinityfree.com;dbname=if0_43383171_ideathon_fatec;charset=utf8";
$user="if0_43383171";
$pass="ideathonpass";

    try {
        $conexao = new PDO($dns, $user, $pass);
    } catch(PDOException $erro) {
        echo("Entre em contato com o suporte!")
    }
