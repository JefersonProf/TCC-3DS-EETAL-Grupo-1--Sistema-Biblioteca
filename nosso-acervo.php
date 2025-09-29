<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Nosso Acervo - Biblioteca Evolução</title>
<style>
  :root{
    --brand:#002147;
    --dark:#0f2e52;
    --accent:#1ed4c9;
    --link:#0b63ce;
    --text:#112;
  }
  *{box-sizing:border-box}
  body{margin:0;font-family:system-ui,-apple-system,Segoe UI,Roboto,Arial,sans-serif;background:#f6f8fb;color:#112}
  a{text-decoration:none;color:inherit}

  header{
    display:flex;align-items:center;justify-content:space-between;
    gap:24px;padding:14px 36px;background:#fff;
    box-shadow:0 2px 10px rgba(0,0,0,.06);position:sticky;top:0;z-index:50;
  }
  .logo img{height:50px}
  nav ul{display:flex;list-style:none;gap:28px;margin:0;padding:0}
  nav a{color:var(--brand);font-weight:600;font-size:15px}

  .btn-entrar {
    background-color: #003366;
    color: white;
    border: none;
    padding: 10px 22px;
    border-radius: 6px;
    cursor: pointer;
    font-size: 15px;
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

  .back{
    display:inline-flex;align-items:center;gap:10px;margin:22px 36px;color:#335;opacity:.9;font-weight:600
  }
  .back svg{width:18px;height:18px}

  .title{display:flex;justify-content:center}
  .title h1{font-size:44px;margin:10px 0 30px;color:var(--brand);text-align:center}
  .title h1 .dot{color:var(--accent)}

  .hero{
    position:relative;background:var(--dark);color:#eaf2ff;
    padding:64px 20px 56px;border-top-left-radius:18px;border-top-right-radius:18px;
  }
  .hero::before{
    content:"";position:absolute;left:50%;top:-58px;transform:translateX(-50%);
    width:320px;height:120px;background:#fff;border-bottom-left-radius:200px;border-bottom-right-radius:200px;
  }
  .hero .sub{
    font-size:28px;line-height:1.35;max-width:1050px;margin:0 auto;text-align:center;
    font-weight:800;color:#e9f1ff
  }
  .hero .underline{
    width:74px;height:6px;background:var(--accent);border-radius:6px;margin:18px auto 26px;
  }
  .search-wrap{
    max-width:980px;margin:0 auto;display:flex;align-items:center;gap:0;background:#0b2748;border-radius:14px;border:1px solid #23466f;
  }
  .search-wrap input{
    flex:1;padding:18px 18px 18px 22px;background:#0b2748;color:#eaf2ff;border:0;border-radius:14px 0 0 14px;font-size:16px;outline:none;
  }
  .search-wrap button{
    width:68px;height:56px;border:0;border-left:1px solid #23466f;background:#0b2748;border-radius:0 14px 14px 0;cursor:pointer;
    display:grid;place-items:center;
  }
  .search-wrap svg{width:22px;height:22px;fill:#cfe3ff}

  .filters-wrap{
    padding:26px 20px;background:var(--dark);
  }
  .filters{
    max-width:1180px;margin:0 auto;display:grid;grid-template-columns:repeat(3,1fr);gap:22px;
  }
  .filter{
    background:#fff;border-radius:14px;padding:26px 24px;display:flex;justify-content:center;align-items:center;
    font-weight:700;color:var(--brand);position:relative
  }
  .filter .caret{position:absolute;right:18px;top:50%;transform:translateY(-50%);opacity:.8}
  .filter .label{pointer-events:none}
  .filter select{
    position:absolute;inset:0;width:100%;height:100%;
    opacity:0;appearance:none;border:0;background:transparent;cursor:pointer;
  }

  .meta{
    max-width:1180px;margin:18px auto 8px;display:flex;align-items:center;justify-content:space-between;padding:0 6px;
    color:#334
  }
  .sort{display:flex;align-items:center;gap:8px;font-weight:700}
  .sort .caret{width:14px;height:14px}

  .grid{
    max-width:1180px;margin:8px auto 60px;padding:0 6px;
    display:grid;gap:26px;grid-template-columns:repeat(auto-fill,minmax(230px,1fr));
  }
  .card{
    background:#fff;border-radius:16px;box-shadow:0 6px 18px rgba(0,0,0,.08);overflow:hidden;position:relative
  }
  .cover{position:relative;background:#f0f3f8}
  .cover img{display:block;width:100%;height:320px;object-fit:cover}
  .content{padding:14px 14px 18px}
  .title-book{font-size:15.5px;font-weight:800;color:#122;margin:0 0 6px}
  .author{font-size:13.5px;color:#5b6b85;margin:0}
  .content a{color:#0b63ce}
  .hidden{display:none !important;}

  @media (max-width:960px){
    .filters{grid-template-columns:1fr}
    .hero .sub{font-size:22px}
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
      <li><a href="home.php">Home</a></li>
      <li><a href="quem_somos.php">Quem Somos</a></li>
      <li><a href="recursos.php">Recursos</a></li>
      <li><a href="blog.php">Blog</a></li>
      <li><a href="nosso-acervo.php" style="text-decoration:underline;">Nosso Acervo</a></li>
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

<a class="back" href="home.php">
  <svg viewBox="0 0 24 24"><path d="M15.5 4.5 8 12l7.5 7.5" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round"/></svg>
  Voltar
</a>

<section class="title">
  <h1>Nosso Acervo<span class="dot">.</span></h1>
</section>

  <section class="hero">
    <p class="sub">Títulos relevantes e autores renomados. Inserção<br>de novas obras todo mês.</p>
    <div class="underline"></div>
    <div class="search-wrap">
      <input id="campo-busca" type="text" placeholder="Digite o nome do livro ou do autor(a) que deseja buscar">
      <button id="btn-busca" aria-label="Buscar">
        <svg viewBox="0 0 24 24"><path d="m21 21-4.35-4.35M10.5 18a7.5 7.5 0 1 1 7.5-7.5 7.5 7.5 0 0 1-7.5 7.5Z"/></svg>
      </button>
    </div>
  </section>

  <div class="filters-wrap">
    <div class="filters">
      <div class="filter" id="filtro-categoria">
        <span class="label">Categoria</span>
        <svg class="caret" viewBox="0 0 24 24" width="18" height="18"><path d="m6 9 6 6 6-6" fill="none" stroke="#223" stroke-width="2"/></svg>
        <select></select>
      </div>
      <div class="filter" id="filtro-subcategoria">
        <span class="label">Subcategoria</span>
        <svg class="caret" viewBox="0 0 24 24" width="18" height="18"><path d="m6 9 6 6 6-6" fill="none" stroke="#223" stroke-width="2"/></svg>
        <select></select>
      </div>
      <div class="filter" id="filtro-editora">
        <span class="label">Editora</span>
        <svg class="caret" viewBox="0 0 24 24" width="18" height="18"><path d="m6 9 6 6 6-6" fill="none" stroke="#223" stroke-width="2"/></svg>
        <select></select>
      </div>
    </div>
  </div>

  <div class="meta">
    <div id="meta-count">Exibindo 1 - 10 de livro(s)</div>
    <div class="sort">Mais novos
      <svg class="caret" viewBox="0 0 24 24"><path d="m6 9 6 6 6-6" fill="none" stroke="#223" stroke-width="2"/></svg>
    </div>
  </div>

  <section class="grid" id="grid-livros">
    <article class="card"
      data-id="1"
      data-titulo="Memórias póstumas de Brás Cubas (1881)"
      data-autor="Machado de Assis"
      data-categoria="Clássicos Brasileiros"
      data-subcategoria="Romance"
      data-editora="Domínio Público">
      <div class="cover">
        <img src="livros/Machado.png" alt="">
      </div>
      <div class="content">
        <h3 class="title-book"><a href="livro.php?id=1">Memórias póstumas de Brás Cubas (1881)</a></h3>
        <p class="author">Machado de Assis</p>
      </div>
    </article>
    
    <article class="card"
      data-id="2"
      data-titulo="Até o Verão Terminar"
      data-autor="Colleen Hoover"
      data-categoria="Romance Contemporâneo"
      data-subcategoria="Romance"
      data-editora="Galera Record">
      <div class="cover">
        <img src="livros/Colleen.png" alt="">
      </div>
      <div class="content">
        <h3 class="title-book"><a href="livro.php?id=2">Até o Verão Terminar</a></h3>
        <p class="author">Colleen Hoover</p>
      </div>
    </article>

    <article class="card"
      data-id="3"
      data-titulo="É Assim que Acaba"
      data-autor="Colleen Hoover"
      data-categoria="Romance Contemporâneo"
      data-subcategoria="Romance"
      data-editora="Galera Record">
      <div class="cover">
        <img src="livros/Colleen1.png" alt="">
      </div>
      <div class="content">
        <h3 class="title-book"><a href="livro.php?id=3">É Assim que Acaba</a></h3>
        <p class="author">Colleen Hoover</p>
      </div>
    </article>

    <article class="card"
      data-id="4"
      data-titulo="Memorial de Aires"
      data-autor="Machado de Assis"
      data-categoria="Clássicos Brasileiros"
      data-subcategoria="Romance"
      data-editora="Domínio Público">
      <div class="cover">
        <img src="livros/image.png" alt="">
      </div>
      <div class="content">
        <h3 class="title-book"><a href="livro.php?id=4">Memorial de Aires</a></h3>
        <p class="author">Machado de Assis</p>
      </div>
    </article>

    <article class="card"
      data-id="5"
      data-titulo="Diário de um Banana Batalha Neval"
      data-autor="Jeffrey P. Kinney"
      data-categoria="Infantojuvenil"
      data-subcategoria="Humor"
      data-editora="VR Editora">
      <div class="cover">
        <img src="livros/diáriobanana.png" alt="">
      </div>
      <div class="content">
        <h3 class="title-book"><a href="livro.php?id=5">Diário de um Banana Batalha Neval</a></h3>
        <p class="author">Jeffrey P. Kinney</p>
      </div>
    </article>

    <article class="card"
      data-id="6"
      data-titulo="Harry Potter e a Pedra Filosofal"
      data-autor="J. K. Rowling"
      data-categoria="Fantasia"
      data-subcategoria="Juvenil"
      data-editora="Rocco">
      <div class="cover">
        <img src="livros/harrypotter.png" alt="">
      </div>
      <div class="content">
        <h3 class="title-book"><a href="livro.php?id=6">Harry Potter e a Pedra Filosofal</a></h3>
        <p class="author">J. K. Rowling</p>
      </div>
    </article>

    <article class="card"
      data-id="7"
      data-titulo="A Culpa é das Estrelas"
      data-autor="John Green"
      data-categoria="Romance Jovem Adulto"
      data-subcategoria="Romance"
      data-editora="Intrínseca">
      <div class="cover">
        <img src="livros/johangreen.png" alt="">
      </div>
      <div class="content">
        <h3 class="title-book"><a href="livro.php?id=7">A Culpa é das Estrelas</a></h3>
        <p class="author">John Green</p>
      </div>
    </article>

    <article class="card"
      data-id="8"
      data-titulo="O Pequeno Príncipe"
      data-autor="Antoine D. Saint-Exupéry"
      data-categoria="Clássicos Universais"
      data-subcategoria="Fábula"
      data-editora="HarperCollins Brasil">
      <div class="cover">
        <img src="livros/pequenoprincipe.png" alt="">
      </div>
      <div class="content">
        <h3 class="title-book"><a href="livro.php?id=8">O Pequeno Príncipe</a></h3>
        <p class="author">Antoine D. Saint-Exupéry</p>
      </div>
    </article>

    <article class="card"
      data-id="9"
      data-titulo="Alice no País das Maravilhas"
      data-autor="Lewis Carroll"
      data-categoria="Clássicos Universais"
      data-subcategoria="Fantasia"
      data-editora="Zahar">
      <div class="cover">
        <img src="livros/Aliceno.png" alt="">
      </div>
      <div class="content">
        <h3 class="title-book"><a href="livro.php?id=9">Alice no País das Maravilhas</a></h3>
        <p class="author">Lewis Carroll</p>
      </div>
    </article>

    <article class="card"
      data-id="10"
      data-titulo="O Diário de Anne Frank"
      data-autor="Anne Frank"
      data-categoria="Biografia/Diário"
      data-subcategoria="Memórias"
      data-editora="Record">
      <div class="cover">
        <img src="livros/annefrank.png" alt="">
      </div>
      <div class="content">
        <h3 class="title-book"><a href="livro.php?id=10">O Diário de Anne Frank</a></h3>
        <p class="author">Anne Frank</p>
      </div>
    </article>
  </section>

  <script>
    // util: remover acentos e normalizar busca
    function norm(s){
      return (s||"")
        .toString()
        .toLowerCase()
        .normalize('NFD')
        .replace(/\p{Diacritic}/gu,'')
        .trim();
    }

    const campoBusca = document.getElementById('campo-busca');
    const btnBusca = document.getElementById('btn-busca');
    const grid = document.getElementById('grid-livros');
    const cards = Array.from(grid.querySelectorAll('article.card'));
    const meta = document.getElementById('meta-count');

    const sets = {
      categoria: new Set(),
      subcategoria: new Set(),
      editora: new Set()
    };
    cards.forEach(c=>{
      sets.categoria.add(c.dataset.categoria);
      sets.subcategoria.add(c.dataset.subcategoria);
      sets.editora.add(c.dataset.editora);
    });

    function fillSelect(containerId, set, placeholder){
      const wrap = document.getElementById(containerId);
      const select = wrap.querySelector('select');
      const label = wrap.querySelector('.label');

      const opts = ['Todas', ...Array.from(set).sort((a,b)=>a.localeCompare(b))];
      select.innerHTML = opts.map(v=>`<option value="${v==='Todas'?'':v}">${v}</option>`).join('');
      select.addEventListener('change', ()=>{
        label.textContent = select.value ? select.value : placeholder;
        applyFilters();
      });
    }
    fillSelect('filtro-categoria', sets.categoria, 'Categoria');
    fillSelect('filtro-subcategoria', sets.subcategoria, 'Subcategoria');
    fillSelect('filtro-editora', sets.editora, 'Editora');

    function getFilters(){
      return {
        q: norm(campoBusca.value),
        categoria: document.querySelector('#filtro-categoria select').value,
        subcategoria: document.querySelector('#filtro-subcategoria select').value,
        editora: document.querySelector('#filtro-editora select').value
      };
    }

    function matchCard(card, f){
      const t = norm(card.dataset.titulo);
      const a = norm(card.dataset.autor);
      const okBusca = !f.q || t.includes(f.q) || a.includes(f.q);
      const okCat = !f.categoria || card.dataset.categoria === f.categoria;
      const okSub = !f.subcategoria || card.dataset.subcategoria === f.subcategoria;
      const okEd = !f.editora || card.dataset.editora === f.editora;
      return okBusca && okCat && okSub && okEd;
    }

    function applyFilters(){
      const f = getFilters();
      let visiveis = 0;
      cards.forEach(card=>{
        if (matchCard(card, f)){
          card.classList.remove('hidden');
          visiveis++;
        }else{
          card.classList.add('hidden');
        }
      });
      const total = cards.length;
      meta.textContent = `Exibindo ${visiveis} de ${total} livro(s)`;
    }

    campoBusca.addEventListener('input', applyFilters);
    btnBusca.addEventListener('click', (e)=>{ e.preventDefault(); applyFilters(); });

    applyFilters();
  </script>

</body>
</html>
