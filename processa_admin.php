<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "etal@2025";
$dbname = "biblioteca";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

$usuario = $_POST['usuario'] ?? '';
$senha   = $_POST['senha'] ?? '';

$stmt = $conn->prepare("SELECT id, nome, senha FROM admins WHERE usuario = ?");
$stmt->bind_param("s", $usuario);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $row = $result->fetch_assoc();

    if ($senha === $row['senha']) {
        $_SESSION['tipo'] = "admin";
        $_SESSION['id']   = $row['id'];
        $_SESSION['nome'] = $row['nome'];

        header("Location: painel_admin.php");
        exit();
    } else {
        echo "<script>alert('Senha incorreta!'); window.location.href='admin.php';</script>";
    }
} else {
    echo "<script>alert('Usuário não encontrado!'); window.location.href='admin.php';</script>";
}

$stmt->close();
$conn->close();
?>
