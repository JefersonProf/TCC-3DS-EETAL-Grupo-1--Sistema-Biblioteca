<?php
$servername = "localhost";
$username = "root"; 
$password = "etal@2025"; 
$dbname = "biblioteca";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

$nome = $_POST['nome'] ?? '';
$email = $_POST['email'] ?? '';
$senha = $_POST['senha'] ?? '';
$data_nascimento = $_POST['data_nascimento'] ?? '';
$telefone = $_POST['telefone'] ?? '';
$genero = $_POST['genero'] ?? '';

if (empty($nome) || empty($email) || empty($senha)) {
    die("Por favor, preencha os campos nome, email e senha.");
}

$senhaHash = password_hash($senha, PASSWORD_DEFAULT);

$stmt = $conn->prepare("INSERT INTO usuarios (nome, email, senha, data_nascimento, telefone, genero) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssss", $nome, $email, $senhaHash, $data_nascimento, $telefone, $genero);

if ($stmt->execute()) {
    echo "<h2>Cadastro realizado com sucesso!</h2>";
    echo "<a href='entrar.html'>Ir para login</a>";
} else {
    echo "Erro ao cadastrar: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
