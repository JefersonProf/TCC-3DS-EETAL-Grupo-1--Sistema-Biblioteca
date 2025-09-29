<?php
session_start();
include "conexao.php";

if (!isset($_SESSION['usuario_id']) || empty($_SESSION['usuario_id'])) {
    header("Location: entrar.php");
    exit;
}

$usuario_id = $_SESSION['usuario_id'];

// Buscar livros reservados pelo usuário
$sql = "SELECT r.id AS reserva_id, l.titulo, l.autor, r.data_reserva, r.status
        FROM reservas r
        INNER JOIN livros l ON r.livro_id = l.id
        WHERE r.usuario_id = ?
        ORDER BY r.data_reserva DESC";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $usuario_id);
$stmt->execute();
$result = $stmt->get_result();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Meus Livros Reservados</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f9;
            margin: 0;
            padding: 20px;
        }
        h1 {
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
            background: #fff;
        }
        table th, table td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
        }
        table th {
            background: #007bff;
            color: white;
        }
        .status {
            font-weight: bold;
            padding: 5px 10px;
            border-radius: 6px;
        }
        .status.reservado {
            background: #28a745;
            color: #fff;
        }
        .status.fila {
            background: #ffc107;
            color: #000;
        }
        .btn-voltar {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 6px;
            transition: background 0.3s;
        }
        .btn-voltar:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Meus Livros Reservados</h1>

    <?php if ($result->num_rows > 0): ?>
        <table>
            <tr>
                <th>Título</th>
                <th>Autor</th>
                <th>Data da Reserva</th>
                <th>Status</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['titulo']); ?></td>
                    <td><?php echo htmlspecialchars($row['autor']); ?></td>
                    <td><?php echo date("d/m/Y H:i", strtotime($row['data_reserva'])); ?></td>
                    <td>
                        <span class="status <?php echo $row['status']; ?>">
                            <?php echo ucfirst($row['status']); ?>
                        </span>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>
    <?php else: ?>
        <p>Você ainda não reservou nenhum livro.</p>
    <?php endif; ?>

    <a href="javascript:history.back()" class="btn-voltar">⬅ Voltar</a>

</body>
</html>
