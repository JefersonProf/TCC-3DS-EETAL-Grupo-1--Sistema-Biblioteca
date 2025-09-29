<?php
session_start();

$id = $_GET['id'] ?? null;
$usuarioAtual = $_SESSION['usuario_nome'] ?? null;

if (!$usuarioAtual) {
    header("Location: entrar.php");
    exit;
}

if (!$id) {
    echo "Livro não encontrado.";
    exit;
}

$_SESSION['reservas'] = $_SESSION['reservas'] ?? [];
$_SESSION['fila'] = $_SESSION['fila'] ?? [];

$_SESSION['reservas'][$id] = $_SESSION['reservas'][$id] ?? [];
$_SESSION['fila'][$id] = $_SESSION['fila'][$id] ?? [];

if (($key = array_search($usuarioAtual, $_SESSION['reservas'][$id])) !== false) {
    unset($_SESSION['reservas'][$id][$key]);
}

if (($key = array_search($usuarioAtual, $_SESSION['fila'][$id])) !== false) {
    unset($_SESSION['fila'][$id][$key]);
}

$_SESSION['reservas'][$id] = array_values($_SESSION['reservas'][$id]);
$_SESSION['fila'][$id] = array_values($_SESSION['fila'][$id]);

header("Location: livro.php?id=" . $id);
exit;
