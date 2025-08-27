<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Entrar - Biblioteca</title>
<link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@300;700&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
<style>
    * {
        margin: 0; padding: 0; box-sizing: border-box;
        font-family: 'Open Sans', sans-serif;
    }
    body, html {
        height: 100%;
        background: url('e8b28f2a-0f85-4107-bcdf-40ed638bcae4.png') no-repeat center center fixed;
        background-size: cover;
        display: flex;
        justify-content: center;
        align-items: center;
        position: relative;
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
        background-color: rgba(255, 255, 255, 0.96);
        width: 420px;
        border-radius: 16px;
        box-shadow: 0 12px 30px rgba(0,0,0,0.25);
        padding: 40px 30px;
        text-align: center;
    }
    h2 {
        font-family: 'Merriweather', serif;
        font-weight: 700;
        font-size: 2rem;
        color: #2c3e50;
        margin-bottom: 20px;
    }
    input {
        width: 100%;
        padding: 12px;
        margin: 10px 0;
        border-radius: 8px;
        border: 1px solid #ccc;
        font-size: 1rem;
    }
    button {
        width: 100%;
        padding: 14px;
        border: none;
        border-radius: 8px;
        background-color: #2980b9;
        color: white;
        font-size: 1.1rem;
        font-weight: 700;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }
    button:hover {
        background-color: #1f6390;
    }
    p {
        margin-top: 15px;
    }
    a {
        color: #2980b9;
        font-weight: 600;
        text-decoration: none;
    }
    a:hover {
        text-decoration: underline;
    }
</style>
</head>
<body>

<div class="container">
    <h2>Entrar na Biblioteca</h2>
    <input type="email" placeholder="Digite seu Gmail" pattern=".+@gmail\.com" required>
    <input type="password" placeholder="Digite sua senha" required>
    <button>Entrar</button>
    <p>Não tem conta? <a href="cadastrar.php">Faça seu cadastro</a></p>
</div>

</body>
</html>
