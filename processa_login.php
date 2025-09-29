<?php
session_start();

include "conexao.php";

$email = $_POST['email'] ?? '';
$senha = $_POST['senha'] ?? '';

if (empty($email) || empty($senha)) {
    header("Location: entrar.php?erro=1");
    exit;
}

$stmt = $conn->prepare("SELECT id, nome, senha FROM usuarios WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();

    if (password_verify($senha, $user['senha'])) {
        $_SESSION['usuario_id'] = $user['id'];
        $_SESSION['usuario_nome'] = $user['nome'];

        header("Location: home.php");
        exit;
    } else {
        header("Location: entrar.php?erro=1");
        exit;
    }
} else {
    header("Location: entrar.php?erro=1");
    exit;
}

$stmt->close();
$conn->close();
?>
