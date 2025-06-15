<?php
require_once('../database/conn.php');

$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
$concluido = filter_input(INPUT_POST, 'completed');

if ($id && $concluido !== null) {
    $sql = $pdo->prepare("UPDATE task SET completed = :concluido WHERE id = :id");
    $sql->bindValue(':concluido', $concluido === 'true' ? 1 : 0, PDO::PARAM_INT);
    $sql->bindValue(':id', $id);
    $sql->execute();

    echo json_encode(['success' => true]);
    exit;
} else {
    echo json_encode(['success' => false]);
    exit;
}
