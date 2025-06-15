<?php
require_once('../database/conn.php');

$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
$descricao = filter_input(INPUT_POST, 'descricao');

if ($id && $descricao) {
    $sql = $pdo->prepare("UPDATE task SET description = :descricao WHERE id = :id");
    $sql->bindValue(':descricao', $descricao);
    $sql->bindValue(':id', $id);
    $sql->execute();

    header('Location: ../index.php');
    exit;
} else {
    header('Location: ../index.php');
    exit;
}
