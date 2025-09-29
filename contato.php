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

    /* Bloco do endereço */
    .endereco {
      margin-top: 40px;
      padding: 20px;
      background: #f4f7fa;
      border-left: 5px solid #002147;
      border-radius: 6px;
    }

    .endereco h2 {
      margin-top: 0;
      color: #002147;
    }

    .mapa {
      margin-top: 20px;
      border-radius: 8px;
      overflow: hidden;
    }

    .voltar {
      margin-bottom: 20px;
    }

    .voltar a {
      text-decoration: none;
      color: #0056b3;
      font-weight: bold;
    }
  </style>
</head>
<body>

  <div class="container">
    <div class="voltar">
      <a href="home.php">← Voltar</a>
    </div>

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

    <div class="endereco">
      <h2>📍 Nosso Endereço</h2>
      <p><strong>Escola: Tarcisio Alvares Lobo</strong></p>
      <p>Rua Estela Borges Morato, 500<br>
      Vila Siqueira - São Paulo - SP<br>
      CEP: 02722-000</p>

      <div class="mapa">
        <iframe 
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3656.251094234952!2d-46.67754612377963!3d-23.596545463493898!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce56d7c0a4b8bb%3A0x6a2a8e0c1d471!2sRua%20Estela%20Borges%20Morato%2C%20500%20-%20Vila%20Siqueira%2C%20S%C3%A3o%20Paulo%20-%20SP%2C%2002722-000!5e0!3m2!1spt-BR!2sbr!4v1694182269870!5m2!1spt-BR!2sbr" 
          width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy">
        </iframe>
      </div>
    </div>
  </div>
</body>
</html>
