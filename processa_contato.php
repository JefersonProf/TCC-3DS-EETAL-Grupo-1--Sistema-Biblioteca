<?php
$servername = "localhost";
$username = "root"; 
$password = "etal@2025"; 
$dbname = "biblioteca";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
    }

$nome = $_POST['nome'];
$sobrenome = $_POST['sobrenome'];
$motivo = $_POST['motivo'];
$email = $_POST['email'];
$celular = $_POST['celular'];
$estado = $_POST['estado'];
$comentarios = $_POST['comentarios'];

$sql = "INSERT INTO contatos (nome, sobrenome, motivo, email, celular, estado, comentarios)
        VALUES (?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssss", $nome, $sobrenome, $motivo, $email, $celular, $estado, $comentarios);

if ($stmt->execute()) {
    echo "<script>
            alert('Contato enviado com sucesso!');
            window.location.href = 'home.php';
            </script>";
} else {
    echo "Erro: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>