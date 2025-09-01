<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Biblioteca Evolução</title>
  <style>
    body {
      margin: 0;
      font-family: "Arial", sans-serif;
      background-color: #f7f9fc;
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

    .hero {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 70px 60px;
      background: linear-gradient(to right, #fff, #eaf4ff);
      gap: 30px;
    }

    .hero-text {
      max-width: 520px;
    }

    .hero-text h1 {
      font-size: 40px;
      line-height: 1.3;
      font-weight: 700;
      color: #003366;
      margin: 0;
      opacity: 0.9;
    }

    .hero-text p {
      margin: 20px 0;
      font-size: 17px;
      color: #333;
      line-height: 1.5;
      opacity: 0.75;
    }

    .btn {
      background-color: #003366;
      color: white;
      padding: 14px 28px;
      border: none;
      border-radius: 6px;
      font-size: 18px;
      cursor: pointer;
      margin-right: 14px;
    }

    .btn-alt {
      background-color: #00b894;
    }

    .hero img {
      max-width: 460px;
      width: 100%;
      border-radius: 0;
      transition: opacity 0.5s ease-in-out;
    }

    /* ACERVO */
    .acervo {
      display: flex;
      justify-content: space-between;
      align-items: center;
      gap: 40px;
      padding: 80px 60px;
      background-color: #002147;
      color: white;
    }

    .acervo-livros {
      position: relative;
      flex: 1;
    }

    .acervo-livros img {
      width: 100%;
      max-width: 500px;
      border-radius: 10px;
    }

    .acervo-destaque {
      position: absolute;
      top: 30%;
      left: 20%;
      background: #00e0d0;
      padding: 30px 40px;
      border-radius: 20px;
      text-align: center;
      font-weight: bold;
      color: #003366;
    }

    .acervo-destaque h2 {
      font-size: 32px;
      margin: 0;
    }

    .acervo-destaque p {
      margin: 5px 0 0;
      font-size: 16px;
      color: #003366;
    }

    .acervo-texto {
      flex: 1;
      max-width: 500px;
    }

    .acervo-texto h2 {
      font-size: 32px;
      font-weight: 700;
      margin-bottom: 20px;
    }

    .acervo-texto h2 span {
      color: #00aaff;
    }

    .acervo-texto p {
      font-size: 16px;
      line-height: 1.6;
      margin-bottom: 20px;
    }

    .acervo-texto .btn {
      background-color: #0056b3;
      padding: 14px 28px;
      border-radius: 6px;
      font-size: 18px;
      border: none;
      cursor: pointer;
    }

    /* NOVA SEÇÃO */
    .recursos {
      text-align: center;
      padding: 80px 60px;
      background-color: #fff;
    }

    .recursos h2 {
      font-size: 32px;
      color: #003366;
      margin-bottom: 20px;
    }

    .recursos p {
      font-size: 16px;
      color: #555;
      max-width: 700px;
      margin: 0 auto 40px;
      line-height: 1.6;
    }

    .cards {
      display: flex;
      justify-content: center;
      gap: 30px;
      flex-wrap: wrap;
    }

    .card {
      background: #f7f9fc;
      padding: 30px;
      border-radius: 12px;
      width: 280px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
      text-align: center;
      transition: transform 0.3s ease;
    }

    .card:hover {
      transform: translateY(-5px);
    }

    .card img {
      width: 60px;
      margin-bottom: 20px;
    }

    .card h3 {
      font-size: 20px;
      color: #003366;
      margin-bottom: 10px;
    }

    .card p {
      font-size: 15px;
      color: #555;
      line-height: 1.5;
    }
  </style>
</head>
<body>
  <header>
    <div class="logo">
      <img src="imagem/logo.png" alt="Biblioteca Evolução" />
    </div>
    <nav>
      <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="quem_somos.php">Quem Somos</a></li>
        <li><a href="recursos.php">Recursos</a></li>
        <li><a href="blog.php">Blog</a></li>
        <li><a href="nosso-acervo.php">Nosso Acervo</a></li>
        <li><a href="contato.php">Contato</a></li>
      </ul>
    </nav>
    <button class="btn-entrar" onclick="window.location.href='entrar.php'">Entrar</button>
  </header>

  <section class="hero">
    <div class="hero-text">
      <h1>Biblioteca Evolução para sua aprendizagem e leitura!</h1>
      <p>A Biblioteca Evolução é um espaço que reúne conhecimento de diversas áreas, com acesso ilimitado e multiusuário.</p>
      <button class="btn" onclick="window.location.href='nosso-acervo.php'">Conheça a Biblioteca</button>
      <button class="btn btn-alt" onclick="window.location.href='contato.php'">Contato</button>
    </div>
    <div>
      <img id="estudante-img" src="imagem/estudante1.png" alt="Estudante" />
    </div>
  </section>

  <section class="acervo">
    <div class="acervo-livros">
      <img src="imagem/livros.png" alt="Livros disponíveis" />
      <div class="acervo-destaque">
        <h2>+50</h2>
        <p>títulos disponíveis</p>
      </div>
    </div>
    <div class="acervo-texto">
      <h2>
        Seu acervo completo, diversificado e sempre atualizado!
      </h2>
      <p>
        Em 2025, a Biblioteca Evolução vem liderando em inovação para educação e
        desenvolvimento profissional. Com uma plataforma acessível e interativa, 
        oferece conteúdos abrangentes que enriquecem o conhecimento de estudantes 
        e profissionais em uma experiência de leitura dinâmica e eficaz.
      </p>
      <button class="btn" onclick="window.location.href='nosso-acervo.php'">Conheça nosso Acervo</button>
    </div>
  </section>

  <section class="recursos">
    <h2>Blog</h2>
    <p>Conheça a nossa história de como aprendemos a montar site, desenvolvimento e várias coisas.</p>
    <div class="cards">
      <div class="card">
        <img src="imagem/blog.png" alt="Recurso 1" />
        <h3>Acesso Ilimitado</h3>
        <p>Tenha acesso a todo o acervo digital de forma ilimitada, em qualquer dispositivo.</p>
      </div>
      <div class="card">
        <img src="imagem/blog1.png" alt="Recurso 2" />
        <h3>Multiusuário</h3>
        <p>Permite uso simultâneo para grupos de estudo, turmas e equipes de trabalho.</p>
      </div>
      <div class="card">
        <img src="imagem/blog2.png" alt="Recurso 3" />
        <h3>Conteúdo Atualizado</h3>
        <p>Nosso acervo está sempre atualizado com novos livros e materiais.</p>
      </div>
    </div>
  </section>

  <script>
    const imagens = [
      'imagem/estudante1.png',
      'imagem/estudante2.png',
      'imagem/estudante3.png',
      'imagem/estudante.png'
    ];
    let index = 0;
    const imgElement = document.getElementById('estudante-img');

    setInterval(() => {
      index = (index + 1) % imagens.length;
      imgElement.style.opacity = 0;
      setTimeout(() => {
        imgElement.src = imagens[index];
        imgElement.style.opacity = 1;
      }, 500);
    }, 4000);
  </script>

  <footer>
    <p>&copy; 2025 Biblioteca Evolução - Todos os direitos reservados</p>
  </footer>
</body>
</html>
