<?php
$servidor = "localhost";
$usuario = "root";
$senha = "etal@2025";
$banco = "biblioteca";

$conn = new mysqli($servidor, $usuario, $senha, $banco);

if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}

$conn->set_charset("utf8mb4");
?>
