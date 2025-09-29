<?php
session_start();

$servername = "localhost";
$username   = "root";
$password   = "etal@2025";
$dbname     = "biblioteca";

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
        $_SESSION['usuario_nome']   = $row['nome'];
        $_SESSION['usuario_id']     = $row['id'];
        $_SESSION['usuario_tipo']   = "admin";

        header("Location: home.php");
        exit;
    } else {
        $_SESSION['erro_login'] = "Senha incorreta!";
        header("Location: admin.php");
        exit;
    }
} else {
    $_SESSION['erro_login'] = "Usuário não encontrado!";
    header("Location: admin.php");
    exit;
}

$stmt->close();
$conn->close();
