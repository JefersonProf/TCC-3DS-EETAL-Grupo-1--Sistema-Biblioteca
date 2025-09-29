<?php
session_start();
include "conexao.php";

if (!isset($_SESSION['usuario_id']) || empty($_SESSION['usuario_id'])) {
    header("Location: entrar.php");
    exit;
}

$usuario_id = $_SESSION['usuario_id'];
$livro_id = $_GET['id'] ?? null;

if (!$livro_id) {
    header("Location: nosso-acervo.php");
    exit;
}

$sqlCheck = "SELECT id FROM usuarios WHERE id = ?";
$stmtCheck = $conn->prepare($sqlCheck);
$stmtCheck->bind_param("i", $usuario_id);
$stmtCheck->execute();
$resultCheck = $stmtCheck->get_result();

if ($resultCheck->num_rows === 0) {
    session_destroy();
    header("Location: entrar.php");
    exit;
}

$message = ""; // Guarda a mensagem da notificação

if (isset($_GET['cancelar'])) {
    $sql = "UPDATE reservas SET ativo = 0 WHERE usuario_id = ? AND livro_id = ? AND ativo = 1";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $usuario_id, $livro_id);
    $stmt->execute();

    $message = "Reserva cancelada com sucesso.";
}

$sql = "SELECT * FROM reservas WHERE usuario_id = ? AND ativo = 1";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $usuario_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0 && empty($message)) {
    $message = "Você já possui um livro reservado. Só é possível reservar outro após devolver ou cancelar.";
}

$sql = "SELECT * FROM reservas WHERE livro_id = ? AND ativo = 1";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $livro_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0 && empty($message)) {
    $message = "Este livro já está reservado.";
}

if (empty($message)) {
    $sql = "INSERT INTO reservas (usuario_id, livro_id, ativo) VALUES (?, ?, 1)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $usuario_id, $livro_id);
    $stmt->execute();

    $message = "Reserva realizada com sucesso!";
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Reserva</title>
    <style>
        .notification {
            position: fixed;
            top: 20px;
            right: 20px;
            background-color: #4CAF50;
            color: white;
            padding: 15px;
            border-radius: 5px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.2);
            opacity: 0;
            transition: opacity 0.5s ease;
            z-index: 1000;
        }
        .notification.show {
            opacity: 1;
        }
    </style>
</head>
<body>

<div id="notification" class="notification"><?= htmlspecialchars($message) ?></div>

<script>
    const notification = document.getElementById("notification");
    notification.classList.add("show");

    setTimeout(() => {
        notification.classList.remove("show");
        window.location.href = "livro.php?id=<?= $livro_id ?>";
    }, 2500); // 2,5 segundos de exibição
</script>

</body>
</html>
