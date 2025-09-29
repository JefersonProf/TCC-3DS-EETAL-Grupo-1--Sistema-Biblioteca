<?php
session_start();

include "conexao.php";

$nome = $_POST['nome'] ?? '';
$email = $_POST['email'] ?? '';
$senha = $_POST['senha'] ?? '';
$data_nascimento = $_POST['data_nascimento'] ?? '';
$telefone = $_POST['telefone'] ?? '';
$genero = $_POST['genero'] ?? '';

if (empty($nome) || empty($email) || empty($senha) || empty($data_nascimento)) {
    header("Location: cadastrar.php?erro=1");
    exit;
}

$check = $conn->prepare("SELECT id FROM usuarios WHERE email = ?");
$check->bind_param("s", $email);
$check->execute();
$result = $check->get_result();

if ($result->num_rows > 0) {
    header("Location: cadastrar.php?erro=3");
    exit;
}
$check->close();

$senhaHash = password_hash($senha, PASSWORD_DEFAULT);

$stmt = $conn->prepare("INSERT INTO usuarios (nome, email, senha, data_nascimento, telefone, genero) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssss", $nome, $email, $senhaHash, $data_nascimento, $telefone, $genero);

if ($stmt->execute()) {
    header("Location: entrar.php?sucesso=1");
    exit;
} else {
    header("Location: cadastrar.php?erro=2");
    exit;
}

$stmt->close();
$conn->close();
?>
