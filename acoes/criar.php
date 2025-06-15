<?php
require_once('../database/conn.php');

$descricao = filter_input(INPUT_POST, 'descricao');

if ($descricao) {
    $sql = $pdo->prepare("INSERT INTO task (description) VALUES (:descricao)");
    $sql->bindValue(':descricao', $descricao);
    $sql->execute();

    header('Location: ../index.php');
    exit;
} else {
    header('Location: ../index.php');
    exit;
}