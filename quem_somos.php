<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Quem Somos - Biblioteca Evolução</title>
  <style>
    body {
      margin: 0;
      font-family: "Arial", sans-serif;
      background: #fff;
      color: #002147;
    }

    header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 15px 60px;
      background-color: #fff;
      box-shadow: 0 2px 5px rgba(0,0,0,0.08);
    }

    .logo img {
      height: 60px;
    }

    nav ul {
      list-style: none;
      display: flex;
      gap: 30px;
      margin: 0;
      padding: 0;
    }

    nav ul li a {
      text-decoration: none;
      color: #003366;
      font-weight: 600;
      font-size: 15px;
    }

    .btn-entrar {
      background-color: #003366;
      color: white;
      border: none;
      padding: 10px 22px;
      border-radius: 6px;
      cursor: pointer;
      font-size: 15px;
    }

    /* Quem Somos */
    .quem-somos {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 80px 60px;
      gap: 40px;
    }

    .quem-somos-texto {
      flex: 1;
    }

    .quem-somos-texto h1 {
      font-size: 42px;
      font-weight: 800;
      margin-bottom: 20px;
    }

    .quem-somos-texto h1 span {
      color: #00bfa6; /* detalhe colorido no ponto */
    }

    .quem-somos-texto .destaque {
      font-size: 22px;
      font-weight: bold;
      line-height: 1.5;
      margin-bottom: 25px;
    }

    .quem-somos-texto p {
      font-size: 17px;
      line-height: 1.6;
      color: #444;
      max-width: 600px;
    }

    .quem-somos-imagem {
      flex: 1;
      display: flex;
      justify-content: center;
    }

    .quem-somos-imagem img {
      max-width: 90%;
      height: auto;
    }

    footer {
      background-color: #003366;
      color: white;
      text-align: center;
      padding: 20px;
      margin-top: 60px;
    }
  </style>
</head>
<body>
  <header>
    <div class="logo">
      <img src="imagem/logo.png" alt="Biblioteca Evolução">
    </div>
    <nav>
      <ul>
        <li><a href="home.php">Home</a></li>
        <li><a href="quem_somos.php">Quem Somos</a></li>
        <li><a href="recursos.php">Recursos</a></li>
        <li><a href="blog.php">Blog</a></li>
        <li><a href="nosso-acervo.php">Nosso Acervo</a></li>
        <li><a href="contato.php">Contato</a></li>
      </ul>
    </nav>
    <button class="btn-entrar" onclick="window.location.href='entrar.php'">Entrar</button>
  </header>

  <section class="quem-somos">
    <div class="quem-somos-texto">
      <h1>Quem Somos<span>.</span></h1>
      <p class="destaque">
        A Biblioteca Evolução é uma plataforma de acervo que reúne títulos
        com acesso ilimitado e multiusuário.
      </p>
      <p>
        Bem-vindo à nossa biblioteca evolução, um espaço dedicado ao acesso ao conhecimento e à cultura! Nós somos uma plataforma inovadora que conecta leitores a um vasto acervo, que inclui livros, artigos, audiolivros e muito mais. Com uma interface amigável e recursos de pesquisa avançados, facilitamos a busca pelo material que você precisa. Nosso time é formado por entusiastas da literatura e da tecnologia, comprometidos em oferecer uma experiência de leitura envolvente e acessível. Acreditamos que o conhecimento deve ser democratizado e que a leitura é uma ferramenta poderosa de transformação. Por isso, nossa missão é tornar a literatura e a informação acessíveis a todos. Explore nosso acervo e descubra um mundo de possibilidades na palma da sua mão!.
      </p>
    </div>
    <div class="quem-somos-imagem">
      <img src="imagem/QuemSomos1.png" alt="Ilustração Quem Somos">
    </div>
  </section>

  <footer>
    <p>&copy; 2025 Biblioteca Evolução - Todos os direitos reservados</p>
  </footer>
</body>
</html>
