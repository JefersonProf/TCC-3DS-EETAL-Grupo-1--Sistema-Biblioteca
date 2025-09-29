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

$result = $conn->query("
    SELECT reservas.id, usuarios.nome AS usuario_nome, livros.titulo AS livro_titulo, reservas.data_reserva, reservas.status
    FROM reservas
    INNER JOIN usuarios ON reservas.usuario_id = usuarios.id
    INNER JOIN livros ON reservas.livro_id = livros.id
    ORDER BY reservas.data_reserva DESC
");
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<title>Status das Reservas - Admin</title>
<style>
    body { font-family: Arial; padding: 20px; }
    table { width: 100%; border-collapse: collapse; }
    th, td { padding: 10px; border: 1px solid #ccc; }
    th { background-color: #003366; color: white; }
    .btn { padding: 5px 10px; border: none; cursor: pointer; border-radius: 5px; }
    .aprovado { background-color: #2ecc71; color: white; }
    .pendente { background-color: #f39c12; color: white; }
    .recusado { background-color: #e74c3c; color: white; }
    .atrasado { background-color: #e67e22; color: white; }
</style>
</head>
<body>
<h2>📊 Status das Reservas</h2>
<table>
<tr>
    <th>ID</th>
    <th>Usuário</th>
    <th>Livro</th>
    <th>Data Reserva</th>
    <th>Status</th>
    <th>Ações</th>
</tr>
<?php while ($row = $result->fetch_assoc()): ?>
<tr>
    <td><?= $row['id'] ?></td>
    <td><?= htmlspecialchars($row['usuario_nome']) ?></td>
    <td><?= htmlspecialchars($row['livro_titulo']) ?></td>
    <td><?= $row['data_reserva'] ?></td>
    <td class="<?= $row['status'] ?>"><?= $row['status'] ?></td>
    <td>
        <form method="POST" action="alterar_status.php">
            <input type="hidden" name="reserva_id" value="<?= $row['id'] ?>">
            <select name="novo_status">
                <option value="pendente">Pendente</option>
                <option value="aprovado">Aprovado</option>
                <option value="recusado">Recusado</option>
                <option value="atrasado">Atrasado</option>
            </select>
            <button class="btn">Atualizar</button>
        </form>
    </td>
</tr>
<?php endwhile; ?>
</table>
</body>
</html>
