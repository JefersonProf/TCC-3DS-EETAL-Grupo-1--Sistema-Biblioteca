<?php
session_start();

$posts = [
    1 => [
        "titulo" => "Equipe em ação",
        "imagem" => "imagem/post1.png",
        "conteudo" => "Nossa equipe está em plena atividade, organizando os livros, catalogando novos títulos e preparando eventos para a comunidade. Cada membro tem contribuído com ideias criativas para tornar a Biblioteca Evolução um espaço ainda mais acolhedor e inspirador. Além disso, estamos realizando treinamentos para melhorar o atendimento ao público e otimizar o uso dos recursos digitais."
    ],
    2 => [
        "titulo" => "Novidades do projeto",
        "imagem" => "imagem/post2.png",
        "conteudo" => "Temos grandes novidades! A biblioteca agora conta com um sistema de empréstimo online, permitindo que você reserve livros sem sair de casa. Também estamos ampliando nosso acervo com livros digitais e audiolivros. Em breve, lançaremos o 'Clube do Leitor', um espaço interativo para discussões literárias e troca de experiências entre os usuários."
    ],
    3 => [
        "titulo" => "Dicas de estudo",
        "imagem" => "imagem/post3.png",
        "conteudo" => "Organize seu tempo: crie um cronograma de estudos realista. Busque um ambiente silencioso e confortável. Use a técnica Pomodoro (25 minutos de foco + 5 de pausa) para manter a produtividade. Utilize os recursos da nossa biblioteca como resumos, videoaulas e livros especializados. E lembre-se: estudar com frequência é melhor do que deixar tudo para última hora!"
    ]
];

$postId = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if (isset($posts[$postId])) {
    $post = $posts[$postId];
} else {
    echo "<h1>Post não encontrado.</h1>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $post['titulo']; ?> - Biblioteca Evolução</title>
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

    header img {
      height: 40px;
    }

    nav a {
      margin: 0 15px;
      text-decoration: none;
      font-weight: bold;
      color: #002147;
    }

    nav a:hover {
      color: #007bff;
    }

    .btn-login, .user-info {
      background: #002147;
      color: #fff;
      padding: 8px 15px;
      border-radius: 6px;
      text-decoration: none;
      font-weight: bold;
    }

    .user-info {
      background: transparent;
      color: #002147;
      font-weight: bold;
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

    .post-container {
      max-width: 900px;
      margin: 40px auto;
      background: #fff;
      border-radius: 10px;
      box-shadow: 0px 4px 8px rgba(0,0,0,0.1);
      padding: 30px;
    }

    .post-container img {
      width: 100%;
      border-radius: 10px;
      margin-bottom: 20px;
    }

    .post-container h1 {
      margin-bottom: 20px;
      font-size: 2rem;
      color: #002147;
      text-align: center;
    }

    .post-container p {
      font-size: 1rem;
      line-height: 1.6;
      color: #333;
      text-align: justify;
    }
  </style>
</head>
<body>

  <header>
    <img src="imagem/logo.png" alt="Biblioteca Evolução">
    <nav>
      <a href="home.php">Home</a>
      <a href="quem_somos.php">Quem Somos</a>
      <a href="recursos.php">Recursos</a>
      <a href="blog.php">Blog</a>
      <a href="nosso-acervo.php">Nosso Acervo</a>
      <a href="contato.php">Contato</a>
    </nav>
    <?php if (isset($_SESSION['usuario'])): ?>
      <span class="user-info">👤 <?php echo htmlspecialchars($_SESSION['usuario']); ?></span>
      <a href="logout.php" class="btn-login">Sair</a>
    <?php else: ?>
      <a href="entrar.php" class="btn-login">Entrar</a>
    <?php endif; ?>
  </header>

  <a href="blog.php" class="back">← Voltar para o Blog</a>

  <div class="post-container">
    <img src="<?php echo $post['imagem']; ?>" alt="<?php echo $post['titulo']; ?>">
    <h1><?php echo $post['titulo']; ?></h1>
    <p><?php echo $post['conteudo']; ?></p>
  </div>

</body>
</html>
