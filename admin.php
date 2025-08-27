<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login Admin - Biblioteca</title>
<link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@300;700&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
<style>
    body, html {
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        background: url('e8b28f2a-0f85-4107-bcdf-40ed638bcae4.png') no-repeat center center fixed;
        background-size: cover;
    }
    body::before {
        content: "";
        position: fixed;
        inset: 0;
        background: rgba(20, 30, 40, 0.75);
        z-index: 0;
    }
    .container {
        position: relative;
        z-index: 1;
        background: rgba(255,255,255,0.95);
        padding: 40px;
        border-radius: 12px;
        box-shadow: 0px 8px 20px rgba(0,0,0,0.3);
        width: 350px;
        text-align: center;
    }
    h2 {
        font-family: 'Merriweather', serif;
        margin-bottom: 20px;
    }
    input {
        width: 100%;
        padding: 12px;
        margin: 10px 0;
        border: 1px solid #ccc;
        border-radius: 8px;
    }
    button {
        width: 100%;
        padding: 14px;
        border: none;
        border-radius: 8px;
        background-color: #e74c3c;
        color: white;
        font-weight: bold;
        cursor: pointer;
        transition: background 0.3s;
    }
    button:hover {
        background-color: #c0392b;
    }
    a {
        display: block;
        margin-top: 10px;
        color: #2980b9;
        text-decoration: none;
    }
    a:hover {
        text-decoration: underline;
    }
</style>
</head>
<body>
<div class="container">
    <h2>Login Administrador</h2>
    <form action="processa_admin.php" method="POST">
        <input type="text" name="usuario" placeholder="Usuário" required>
        <input type="password" name="senha" placeholder="Senha" required>
        <button type="submit">Entrar</button>
    </form>
    <a href="index.html">Voltar</a>
</div>
</body>
</html>
