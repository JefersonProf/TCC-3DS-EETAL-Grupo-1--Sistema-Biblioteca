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

$result = $conn->query("SELECT * FROM contatos ORDER BY data_envio DESC");
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<title>Relatório de Contatos - Admin</title>
<style>
    body { font-family: Arial; padding: 20px; }
    table { width: 100%; border-collapse: collapse; }
    th, td { padding: 10px; border: 1px solid #ccc; }
    th { background-color: #003366; color: white; }
</style>
</head>
<body>
<h2>📋 Relatório de Contatos</h2>
<table>
<tr>
    <th>ID</th>
    <th>Nome</th>
    <th>Email</th>
    <th>Mensagem</th>
    <th>Data</th>
</tr>
<?php while ($row = $result->fetch_assoc()): ?>
<tr>
    <td><?= $row['id'] ?></td>
    <td><?= htmlspecialchars($row['nome']) ?></td>
    <td><?= htmlspecialchars($row['email']) ?></td>
    <td><?= nl2br(htmlspecialchars($row['mensagem'])) ?></td>
    <td><?= $row['data_envio'] ?></td>
</tr>
<?php endwhile; ?>
</table>
</body>
</html>
