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
  </style>
</head>
<body>
  <header>
    <div class="logo">
      <img src="imagem/image.png" alt="Biblioteca Evolução" />
    </div>
    <nav>
      <ul>
        <li><a href="#">Home</a></li>
        <li><a href="#">Quem Somos</a></li>
        <li><a href="#">Recursos</a></li>
        <li><a href="#">Nosso Acervo</a></li>
        <li><a href="#">Contato</a></li>
      </ul>
    </nav>
    <button class="btn-entrar" onclick="window.location.href='entrar.php'">Entrar/Cadastrar</button>
  </header>

  <section class="hero">
    <div class="hero-text">
      <h1>Biblioteca Evolução para sua aprendizagem e leitura!</h1>
      <p>A Biblioteca Evolução é um espaço que reúne conhecimento de diversas áreas, com acesso ilimitado e multiusuário.</p>
      <button class="btn">Conheça a Biblioteca</button>
      <button class="btn btn-alt">Contato</button>
    </div>
    <div>
      <img id="estudante-img" src="imagem/estudante1.png" alt="Estudante" />
    </div>
  </section>

  <script>
    const imagens = [
      'imagem/estudante1.png',
      'imagem/estudante2.png',
      'imagem/estudante3.png'
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
</body>
</html>
