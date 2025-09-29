<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Entrar - Biblioteca Evolução</title>
<link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@700&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
<style>
    * {
        margin: 0; padding: 0; box-sizing: border-box;
        font-family: 'Open Sans', sans-serif;
    }
    body, html {
        height: 100%;
        background-color: #0052a5;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .main-container {
        display: flex;
        width: 900px;
        max-width: 95%;
        background-color: white;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 12px 30px rgba(0,0,0,0.25);
    }

    .info-section {
        flex: 1;
        background-color: #0052a5;
        color: white;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        padding: 40px;
        text-align: center;
    }

    .info-section img {
        width: 80px;
        margin-bottom: 20px;
    }

    .info-section h1 {
        font-family: 'Merriweather', serif;
        font-size: 2rem;
        margin-bottom: 10px;
    }

    .info-section p {
        font-size: 1rem;
        line-height: 1.5;
    }

    .login-section {
        flex: 1;
        padding: 40px;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .login-section h2 {
        font-family: 'Merriweather', serif;
        font-weight: 700;
        font-size: 1.8rem;
        color: #0052a5;
        margin-bottom: 20px;
    }

    .login-section input {
        width: 100%;
        padding: 12px;
        margin-bottom: 15px;
        border-radius: 6px;
        border: 1px solid #ccc;
        font-size: 1rem;
    }

    .login-section button {
        width: 100%;
        padding: 14px;
        border: none;
        border-radius: 6px;
        background-color: #0052a5;
        color: white;
        font-size: 1.1rem;
        font-weight: 700;
        cursor: pointer;
        transition: background-color 0.3s ease;
        margin-bottom: 10px;
    }

    .login-section button:hover {
        background-color: #003d7a;
    }

    .login-section p {
        text-align: center;
        font-size: 0.95rem;
    }

    .login-section a {
        color: #0052a5;
        font-weight: 600;
        text-decoration: none;
    }

    .login-section a:hover {
        text-decoration: underline;
    }

    .alerta-sucesso, .alerta-erro {
        padding: 12px;
        border-radius: 8px;
        margin-bottom: 15px;
        font-weight: bold;
        text-align: center;
        animation: fadeIn 0.6s ease-in-out;
    }
    .alerta-sucesso { background-color: #27ae60; color: white; }
    .alerta-erro { background-color: #c0392b; color: white; }
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(-10px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>
</head>
<body>

<div class="main-container">
    <div class="info-section">
        <img src="imagem/logo.png" alt="Logo Biblioteca">
        <h1>Bem-vindo à Biblioteca Evolução!</h1>
        <p>Acesse a plataforma usando seus dados cadastrados na Biblioteca Evolução. Se não os tiver, faça seu cadastro.</p>
    </div>

    <div class="login-section">
        <?php if (isset($_GET['sucesso']) && $_GET['sucesso'] == 1): ?>
            <div class="alerta-sucesso">✅ Cadastro realizado com sucesso! Agora faça login.</div>
        <?php elseif (isset($_GET['erro']) && $_GET['erro'] == 1): ?>
            <div class="alerta-erro">❌ E-mail ou senha incorretos!</div>
        <?php endif; ?>

        <h2>Login</h2>
        <form action="processa_login.php" method="POST">
            <input type="email" name="email" placeholder="E-mail" required>
            <input type="password" name="senha" placeholder="Senha" required>
            <button type="submit">Acessar</button>
        </form>
        <p>Não tem conta? <a href="cadastrar.php">Faça seu cadastro</a></p>
    </div>
</div>

</body>
</html>
