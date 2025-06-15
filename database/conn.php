<?php
// Arquivo: database/conn.php

$host = 'localhost';
$porta = 5432;
$banco = 'to_do_list';
$usuario = 'postgres';
$senha = '2703';

try {
    $pdo = new PDO("pgsql:host=$host;port=$porta;dbname=$banco", $usuario, $senha);
 
} catch (PDOException $e) {
    
    die("Erro na conexão: " . $e->getMessage());
}
