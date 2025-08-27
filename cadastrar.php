<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Cadastrar - Biblioteca</title>
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
    input, select {
        width: 100%;
        padding: 12px;
        margin: 8px 0;
        border-radius: 8px;
        border: 1px solid #ccc;
        font-size: 1rem;
    }
    button {
        width: 100%;
        padding: 14px;
        border: none;
        border-radius: 8px;
        background-color: #27ae60;
        color: white;
        font-size: 1.1rem;
        font-weight: 700;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }
    button:hover {
        background-color: #1e8449;
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
    <h2>Cadastro de Usuário</h2>

    <form action="processa_cadastro.php" method="POST">
        <input type="text" name="nome" placeholder="Nome completo" required>
        <input type="email" name="email" placeholder="Digite seu Gmail" pattern=".+@gmail\.com" required>
        <input type="password" name="senha" placeholder="Crie uma senha" required>
        <input type="date" name="data_nascimento" placeholder="Data de Nascimento">
        <input type="text" name="telefone" placeholder="Telefone">
        <select name="genero" required>
            <option value="">Gênero</option>
            <option value="Masculino">Masculino</option>
            <option value="Feminino">Feminino</option>
            <option value="Outro">Outro</option>
        </select>
        <button type="submit">Cadastrar</button>
    </form>

    <p><a href="entrar.html">Já tenho conta</a></p>
</div>

</body>
</html>
