<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contato</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f9f9f9;
      margin: 0;
      padding: 0;
    }

    .container {
      max-width: 900px;
      margin: 40px auto;
      background: #fff;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0px 4px 10px rgba(0,0,0,0.1);
    }

    h1 {
      text-align: center;
      color: #002147;
      margin-bottom: 10px;
    }

    p {
      text-align: center;
      color: #444;
      margin-bottom: 30px;
    }

    form {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 20px;
    }

    label {
      font-weight: bold;
      margin-bottom: 5px;
      display: block;
    }

    input, select, textarea {
      width: 100%;
      padding: 12px;
      border: 1px solid #ccc;
      border-radius: 6px;
      font-size: 14px;
    }

    textarea {
      grid-column: span 2;
      resize: none;
      height: 100px;
    }

    .checkbox {
      grid-column: span 2;
      font-size: 14px;
    }

    .submit-btn {
      grid-column: span 2;
      padding: 15px;
      background: #0056b3;
      color: white;
      border: none;
      border-radius: 6px;
      font-size: 18px;
      font-weight: bold;
      cursor: pointer;
      transition: 0.3s;
    }

    .submit-btn:hover {
      background: #003d80;
    }
  </style>
</head>

  <div class="container">
    <div class="voltar">
      <a href="home.php">← Voltar</a>
    </div>

<body>
  <div class="container">
    <h1>Contato<span style="color:#007bff;">.</span></h1>
    <p>Precisa de ajuda ou deseja mais informações? Preencha o formulário abaixo e nossa equipe retornará rapidamente.</p>
    
    <form action="processa_contato.php" method="POST">
      <div>
        <label for="nome">Nome*</label>
        <input type="text" id="nome" name="nome" required>
      </div>
      
      <div>
        <label for="sobrenome">Sobrenome*</label>
        <input type="text" id="sobrenome" name="sobrenome" required>
      </div>

      <div>
        <label for="motivo">Qual é o motivo do contato?*</label>
        <select id="motivo" name="motivo" required>
          <option value="">Selecione</option>
          <option value="duvida">Dúvida</option>
          <option value="suporte">Suporte</option>
          <option value="outros">Outros</option>
        </select>
      </div>

      <div>
        <label for="email">E-mail institucional*</label>
        <input type="email" id="email" name="email" required>
      </div>

      <div>
        <label for="celular">Celular*</label>
        <input type="tel" id="celular" name="celular" placeholder="+55" required>
      </div>

      <div>
        <label for="estado">Estado*</label>
        <input type="text" id="estado" name="estado" required>
      </div>

      <div>
        <label for="comentarios">Comentários</label>
        <textarea id="comentarios" name="comentarios" placeholder="Escreva aqui sua mensagem..."></textarea>
      </div>

      <div class="checkbox">
        <input type="checkbox" id="privacidade" required>
        <label for="privacidade">Política de privacidade e processamento de dados.*</label>
      </div>

      <button type="submit" class="submit-btn">Solicitar Contato</button>
    </form>
  </div>
</body>
</html>