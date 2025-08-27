<?php
session_start();

// Só entra se for admin logado
if (!isset($_SESSION['tipo']) || $_SESSION['tipo'] !== 'admin') {
    header("Location: admin.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<title>Painel Administrativo</title>
</head>
<body>
    <h1>Bem-vindo, <?php echo $_SESSION['nome']; ?>!</h1>
    <p>Aqui você poderá gerenciar usuários, livros e relatórios.</p>
    <a href="admin.php">Sair</a>
</body>
</html>
