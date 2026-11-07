<?php
session_start();
require_once 'conexao.php';


if (!isset($_SESSION['id_usuario'])) {
    header("Location: login.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id_recompensa'])) {
    $id_usuario = $_SESSION['id_usuario'];
    $id_recompensa = $_POST['id_recompensa'];

    try {
        
        $pdo->beginTransaction();

        
        $stmt_rec = $pdo->prepare("SELECT custo_pontos FROM recompensas WHERE id = :id_rec AND ativo = 1");
        $stmt_rec->execute([':id_rec' => $id_recompensa]);
        $recompensa = $stmt_rec->fetch();

        if (!$recompensa) {
            throw new Exception("Recompensa não encontrada ou inativa.");
        }

        $custo = $recompensa['custo_pontos'];

        
        $stmt_user = $pdo->prepare("SELECT saldo_pontos FROM usuarios WHERE id = :id_user FOR UPDATE");
        $stmt_user->execute([':id_user' => $id_usuario]);
        $saldo = $stmt_user->fetchColumn();

        
        if ($saldo >= $custo) {
            
            $stmt_update = $pdo->prepare("UPDATE usuarios SET saldo_pontos = saldo_pontos - :custo WHERE id = :id_user");
            $stmt_update->execute([':custo' => $custo, ':id_user' => $id_usuario]);

            //  Gera um código de cupom aleatório 
            $codigo_cupom = 'ARA-' . strtoupper(substr(md5(uniqid()), 0, 6));

            //  Registra o resgate na tabela
            $stmt_insert = $pdo->prepare("INSERT INTO resgates (id_usuario, id_recompensa, codigo_cupom) VALUES (:id_user, :id_rec, :codigo)");
            $stmt_insert->execute([
                ':id_user' => $id_usuario,
                ':id_rec' => $id_recompensa,
                ':codigo' => $codigo_cupom
            ]);

            
            $pdo->commit();

           
            $_SESSION['mensagem_sucesso'] = "Resgate realizado! Seu código é: <strong>" . $codigo_cupom . "</strong>";

        } else {
            
            $pdo->rollBack();
            $_SESSION['mensagem_erro'] = "Pontos insuficientes.";
        }

    } catch (Exception $e) {
        $pdo->rollBack();
        $_SESSION['mensagem_erro'] = "Erro: " . $e->getMessage();
    }
}


header("Location: recompensa.php");
exit;
?>