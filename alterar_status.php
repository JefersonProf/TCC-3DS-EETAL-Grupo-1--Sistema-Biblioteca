<?php
session_start();
if (!isset($_SESSION['usuario_tipo']) || $_SESSION['usuario_tipo'] !== "admin") {
    header("Location: home.php");
    exit;
}

$servername = "localhost";
$username   = "root";
$password   = "etal@2025";
$dbname     = "biblioteca";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

$reserva_id = $_POST['reserva_id'] ?? 0;
$novo_status = $_POST['novo_status'] ?? 'pendente';

$stmt = $conn->prepare("UPDATE reservas SET status = ? WHERE id = ?");
$stmt->bind_param("si", $novo_status, $reserva_id);
$stmt->execute();

header("Location: status.php");
