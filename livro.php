<?php
session_start();
require "conexao.php"; // conexão com banco

$livros = [
    1 => ["titulo" => "Memórias póstumas de Brás Cubas (1881)", "autor" => "Machado de Assis", "categoria" => "Clássicos Brasileiros", "subcategoria" => "Romance", "editora" => "Domínio Público", "capa" => "livros/Machado.png", "descricao" => "Um dos maiores clássicos da literatura brasileira, narrado pelo defunto-autor Brás Cubas."],
    2 => ["titulo" => "Até o Verão Terminar", "autor" => "Colleen Hoover", "categoria" => "Romance Contemporâneo", "subcategoria" => "Romance", "editora" => "Galera Record", "capa" => "livros/Colleen.png", "descricao" => "Uma emocionante história sobre amor, perda e superação."],
    3 => ["titulo" => "É Assim que Acaba", "autor" => "Colleen Hoover", "categoria" => "Romance Contemporâneo", "subcategoria" => "Romance", "editora" => "Galera Record", "capa" => "livros/Colleen1.png", "descricao" => "Um dos romances mais impactantes da autora Colleen Hoover, abordando relações intensas e emocionantes."],
    4 => ["titulo" => "Memorial de Aires", "autor" => "Machado de Assis", "categoria" => "Clássicos Brasileiros", "subcategoria" => "Romance", "editora" => "Domínio Público", "capa" => "livros/image.png", "descricao" => "O último romance escrito por Machado de Assis, trazendo reflexões sobre a velhice e a memória."],
    5 => ["titulo" => "Diário de um Banana Batalha Neval", "autor" => "Jeffrey P. Kinney", "categoria" => "Infantojuvenil", "subcategoria" => "Humor", "editora" => "VR Editora", "capa" => "livros/diáriobanana.png", "descricao" => "Mais uma aventura divertida e cheia de trapalhadas do Greg Heffley na série Diário de um Banana."],
    6 => ["titulo" => "Harry Potter e a Pedra Filosofal", "autor" => "J. K. Rowling", "categoria" => "Fantasia", "subcategoria" => "Juvenil", "editora" => "Rocco", "capa" => "livros/harrypotter.png", "descricao" => "O primeiro livro da saga Harry Potter, onde conhecemos Hogwarts e o início da jornada do jovem bruxo."],
    7 => ["titulo" => "A Culpa é das Estrelas", "autor" => "John Green", "categoria" => "Romance Jovem Adulto", "subcategoria" => "Romance", "editora" => "Intrínseca", "capa" => "livros/johangreen.png", "descricao" => "Uma história emocionante de amor e superação entre dois jovens que enfrentam o câncer."],
    8 => ["titulo" => "O Pequeno Príncipe", "autor" => "Antoine D. Saint-Exupéry", "categoria" => "Clássicos Universais", "subcategoria" => "Fábula", "editora" => "HarperCollins Brasil", "capa" => "livros/pequenoprincipe.png", "descricao" => "Um dos maiores clássicos universais, trazendo reflexões sobre amizade, amor e a essência da vida."],
    9 => ["titulo" => "Alice no País das Maravilhas", "autor" => "Lewis Carroll", "categoria" => "Clássicos Universais", "subcategoria" => "Fantasia", "editora" => "Zahar", "capa" => "livros/Aliceno.png", "descricao" => "A fantástica aventura de Alice em um mundo cheio de personagens inusitados e surreais."],
    10 => ["titulo" => "O Diário de Anne Frank", "autor" => "Anne Frank", "categoria" => "Biografia/Diário", "subcategoria" => "Memórias", "editora" => "Record", "capa" => "livros/annefrank.png", "descricao" => "O relato emocionante e real de Anne Frank durante a Segunda Guerra Mundial."]
];

$id = $_GET['id'] ?? null;
if (!$id || !isset($livros[$id])) {
    echo "<h2>Livro não encontrado.</h2>";
    echo "<a href='nosso-acervo.php'>Voltar ao acervo</a>";
    exit;
}

$livro = $livros[$id];
$usuarioId = $_SESSION['usuario_id'] ?? null;
$usuarioNome = $_SESSION['usuario_nome'] ?? null;

$stmt = $conn->prepare("SELECT r.id, u.nome FROM reservas r JOIN usuarios u ON u.id = r.usuario_id WHERE r.livro_id = ? AND r.ativo = 1");
$stmt->bind_param("i", $id);
$stmt->execute();
$reservasLivro = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

$reservaUsuario = null;
if ($usuarioId) {
    $stmt = $conn->prepare("SELECT * FROM reservas WHERE usuario_id = ? AND ativo = 1");
    $stmt->bind_param("i", $usuarioId);
    $stmt->execute();
    $reservaUsuario = $stmt->get_result()->fetch_assoc();
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= htmlspecialchars($livro['titulo']) ?> - Biblioteca Evolução</title>
<style>
    body { font-family: 'Segoe UI', Arial, sans-serif; margin: 0; background: #f4f7fa; color: #222; }
    .container { max-width: 1100px; margin: 40px auto; padding: 30px; background: #fff; border-radius: 14px; box-shadow: 0 6px 16px rgba(0,0,0,0.12); }
    .livro { display: grid; grid-template-columns: 300px 1fr; gap: 40px; align-items: flex-start; }
    .livro img { width: 100%; border-radius: 12px; box-shadow: 0 4px 10px rgba(0,0,0,0.15); }
    .info h1 { margin: 0 0 20px; font-size: 28px; color: #0f4c81; }
    .info p { margin: 6px 0; font-size: 16px; }
    .descricao { margin-top: 20px; font-size: 17px; line-height: 1.6; color: #444; }
    .botoes { margin-top: 30px; display: flex; gap: 15px; flex-wrap: wrap; }
    .btn { padding: 14px 24px; border: none; border-radius: 10px; cursor: pointer; font-weight: bold; font-size: 16px; transition: 0.3s; }
    .btn.reservar { background: #1ed4c9; color: #002147; }
    .btn.reservar:hover { background: #18b6ad; }
    .btn.cancelar { background: #f2545b; color: #fff; }
    .btn.cancelar:hover { background: #d94349; }
    .btn.entrar { background: #6c63ff; color: #fff; }
    .btn.entrar:hover { background: #574fd1; }
    .btn.voltar { background: #0f4c81; color: #fff; }
    .btn.voltar:hover { background: #0c3a63; }
    .retirada { margin-top: 25px; padding: 18px; border-radius: 12px; background: #f9f9f9; border: 1px solid #ddd; }
    .retirada h3 { margin: 0 0 12px; font-size: 20px; color: #0f4c81; }
    .retirada p { margin: 5px 0; font-size: 15px; }
</style>
</head>
<body>

<div class="container">
    <div class="livro">
        <img src="<?= $livro['capa'] ?>" alt="Capa do livro <?= htmlspecialchars($livro['titulo']) ?>">
        <div class="info">
            <h1><?= htmlspecialchars($livro['titulo']) ?></h1>
            <p><strong>Autor:</strong> <?= htmlspecialchars($livro['autor']) ?></p>
            <p><strong>Categoria:</strong> <?= htmlspecialchars($livro['categoria']) ?></p>
            <p><strong>Subcategoria:</strong> <?= htmlspecialchars($livro['subcategoria']) ?></p>
            <p><strong>Editora:</strong> <?= htmlspecialchars($livro['editora']) ?></p>

            <div class="descricao"><?= htmlspecialchars($livro['descricao']) ?></div>

            <div class="retirada">
                <h3>📚 Status de Reservas</h3>
                <?php if ($reservasLivro): ?>
                    <p><strong>Reservado por:</strong> 
                        <?= implode(", ", array_column($reservasLivro, "nome")) ?>
                    </p>
                <?php else: ?>
                    <p>Nenhuma reserva ainda.</p>
                <?php endif; ?>
            </div>

            <div class="botoes">
                <?php if (!$usuarioId): ?>
                    <a href="entrar.php"><button class="btn entrar">Cadastrar / Entrar</button></a>
                <?php elseif ($reservaUsuario && $reservaUsuario['livro_id'] == $id): ?>
                    <a href="reservar.php?id=<?= $id ?>&cancelar=1"><button class="btn cancelar">Cancelar Reserva</button></a>
                <?php elseif ($reservaUsuario): ?>
                    <button class="btn reservar" disabled>Você já tem outro livro reservado</button>
                <?php else: ?>
                    <a href="reservar.php?id=<?= $id ?>"><button class="btn reservar">Reservar</button></a>
                <?php endif; ?>
                <a href="nosso-acervo.php"><button class="btn voltar">Voltar ao Acervo</button></a>
            </div>
        </div>
    </div>
</div>

</body>
</html>
