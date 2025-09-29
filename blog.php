<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Blog - Biblioteca Evolução</title>
  <style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      background: #f9f9f9;
      color: #002147;
    }

    header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 15px 50px;
      background: #fff;
      box-shadow: 0 2px 4px rgba(0,0,0,0.1);
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
      font-weight: bold;
      color: #002147;
    }

    nav ul li a:hover {
      color: #007bff;
    }

    .btn-entrar {
      background: #002147;
      color: #fff;
      padding: 8px 15px;
      border-radius: 6px;
      border: none;
      cursor: pointer;
      font-weight: bold;
    }

    /* Perfil */
    .user-menu {
      position: relative;
      display: inline-block;
    }

    .user-avatar {
      width: 45px;
      height: 45px;
      border-radius: 50%;
      object-fit: cover;
      cursor: pointer;
      border: 2px solid #003366;
    }

    .dropdown {
      display: none;
      position: absolute;
      right: 0;
      top: 55px;
      background-color: #fff;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
      border-radius: 8px;
      min-width: 180px;
      z-index: 1000;
    }

    .dropdown a {
      display: block;
      padding: 12px 15px;
      color: #003366;
      text-decoration: none;
      font-size: 15px;
      transition: background 0.2s;
    }

    .dropdown a:hover {
      background-color: #f0f0f0;
    }

    .user-menu:hover .dropdown {
      display: block;
    }

    .back {
      display: block;
      margin: 20px 50px;
      text-decoration: none;
      color: #002147;
      font-weight: bold;
    }

    .back:hover {
      color: #007bff;
    }

    .title {
      text-align: center;
      font-size: 2.5rem;
      margin: 20px 0 10px;
    }

    .search-box {
      display: flex;
      justify-content: center;
      margin: 20px auto;
      width: 60%;
    }

    .search-box input {
      width: 100%;
      padding: 12px;
      border: 1px solid #ccc;
      border-radius: 6px 0 0 6px;
      font-size: 16px;
    }

    .search-box button {
      padding: 12px 20px;
      border: none;
      background: #002147;
      color: #fff;
      font-size: 18px;
      border-radius: 0 6px 6px 0;
      cursor: pointer;
    }

    .search-box button:hover {
      background: #0056b3;
    }

    .posts {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
      gap: 20px;
      padding: 40px 10%;
    }

    .post {
      background: #fff;
      border-radius: 10px;
      box-shadow: 0px 4px 8px rgba(0,0,0,0.1);
      overflow: hidden;
      transition: 0.3s;
      cursor: pointer;
    }

    .post:hover {
      transform: translateY(-5px);
    }

    .post img {
      width: 100%;
      height: 200px;
      object-fit: cover;
    }

    .post-content {
      padding: 15px;
      text-align: center;
    }

    .post-content h3 {
      margin-bottom: 10px;
      color: #002147;
    }

    .post-content p {
      color: #555;
      font-size: 14px;
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
        <li><a href="blog.php" style="text-decoration:underline;">Blog</a></li>
        <li><a href="nosso-acervo.php">Nosso Acervo</a></li>
        <li><a href="contato.php">Contato</a></li>

          <?php if (isset($_SESSION['usuario_tipo']) && $_SESSION['usuario_tipo'] === "admin"): ?>
            <li><a href="relatorio.php">Relatório</a></li>
            <li><a href="status.php">Status</a></li>
        <?php endif; ?>
      </ul>
    </nav>

    <?php if (isset($_SESSION['usuario_nome'])): ?>
      <div class="user-menu">
        <img src="<?= $_SESSION['usuario_foto'] ?? 'imagem/padrao.png'; ?>" 
             alt="Perfil" class="user-avatar">

        <div class="dropdown">
          <a href="minha_conta.php">👤 Minha Conta</a>
          <a href="reservados.php">📚 Reservados</a>
          <a href="logout.php">🚪 Sair</a>
        </div>
      </div>
    <?php else: ?>
      <button class="btn-entrar" onclick="window.location.href='entrar.php'">Entrar</button>
    <?php endif; ?>
  </header>

  <a href="home.php" class="back">← Voltar</a>

  <h1 class="title">Blog</h1>

  <div class="search-box">
    <input type="text" id="searchInput" placeholder="Buscar post por palavra-chave">
    <button onclick="searchPosts()">🔍</button>
  </div>

  <section class="posts" id="posts">
    <div class="post" onclick="openPost(1)">
      <img src="imagem/post1.png" alt="Post 1">
      <div class="post-content">
        <h3>Equipe em ação</h3>
        <p>Um pouco sobre nossa trajetória e como trabalhamos em equipe.</p>
      </div>
    </div>

    <div class="post" onclick="openPost(2)">
      <img src="imagem/post2.png" alt="Post 2">
      <div class="post-content">
        <h3>Novidades do projeto</h3>
        <p>Veja as atualizações mais recentes da Biblioteca Evolução.</p>
      </div>
    </div>

    <div class="post" onclick="openPost(3)">
      <img src="imagem/post3.png" alt="Post 3">
      <div class="post-content">
        <h3>Dicas de estudo</h3>
        <p>Recomendações que podem ajudar você a aproveitar melhor nossos recursos.</p>
      </div>
    </div>
  </section>

  <script>
    function searchPosts() {
      let input = document.getElementById("searchInput").value.toLowerCase();
      let posts = document.querySelectorAll(".post");

      posts.forEach(post => {
        let title = post.querySelector("h3").innerText.toLowerCase();
        let text = post.querySelector("p").innerText.toLowerCase();

        if (title.includes(input) || text.includes(input)) {
          post.style.display = "block";
        } else {
          post.style.display = "none";
        }
      });
    }

    function openPost(id) {
      window.location.href = "post.php?id=" + id;
    }
  </script>

</body>
</html>
