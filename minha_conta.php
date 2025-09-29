<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header("Location: entrar.php");
    exit;
}

$servername = "localhost";
$username = "root";
$password = "etal@2025";
$dbname = "biblioteca";
$conn = new mysqli($servername, $username, $password, $dbname);

$id = $_SESSION['usuario_id'];
$mensagem = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = $_POST['nome'] ?? '';
    $email = $_POST['email'] ?? '';
    $senha = $_POST['senha'] ?? '';
    $foto = $_FILES['foto']['name'] ?? '';

    if ($foto) {
        if (!is_dir("uploads")) {
            mkdir("uploads", 0777, true);
        }

        $caminho = "uploads/" . time() . "_" . basename($foto);
        move_uploaded_file($_FILES['foto']['tmp_name'], $caminho);
    } else {
        $caminho = $_SESSION['usuario_foto'] ?? "imagem/padrao.png";
    }

    if (!empty($senha)) {
        $senhaHash = password_hash($senha, PASSWORD_DEFAULT);
        $stmt = $conn->prepare("UPDATE usuarios SET nome=?, email=?, senha=?, foto=? WHERE id=?");
        $stmt->bind_param("ssssi", $nome, $email, $senhaHash, $caminho, $id);
    } else {
        $stmt = $conn->prepare("UPDATE usuarios SET nome=?, email=?, foto=? WHERE id=?");
        $stmt->bind_param("sssi", $nome, $email, $caminho, $id);
    }

    if ($stmt->execute()) {
        $_SESSION['usuario_nome'] = $nome;
        $_SESSION['usuario_foto'] = $caminho;
        $mensagem = "✅ Perfil atualizado com sucesso!";
    } else {
        $mensagem = "❌ Erro ao atualizar perfil.";
    }
    $stmt->close();
}

$stmt = $conn->prepare("SELECT nome, email, foto FROM usuarios WHERE id=?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result()->fetch_assoc();
$stmt->close();
$conn->close();

$fotoPerfil = $result['foto'] ?? "imagem/padrao.png";
if (!file_exists($fotoPerfil) || empty($fotoPerfil)) {
    $fotoPerfil = "imagem/padrao.png";
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<title>Minha Conta</title>
<style>
  body {
    font-family: Arial, sans-serif;
    background: #f4f6f9;
    padding: 20px;
  }
  .container {
    max-width: 500px;
    margin: auto;
    background: #fff;
    padding: 25px;
    border-radius: 10px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
  }
  h1 {
    color: #003366;
    text-align: center;
  }
  form {
    margin-top: 20px;
  }
  label {
    font-weight: bold;
  }
  input {
    width: 100%;
    padding: 8px;
    margin: 8px 0 16px;
    border: 1px solid #ccc;
    border-radius: 6px;
  }
  button {
    width: 100%;
    padding: 12px;
    background: #003366;
    color: #fff;
    border: none;
    border-radius: 6px;
    font-size: 16px;
    cursor: pointer;
  }
  button:hover {
    background: #0055aa;
  }
  .mensagem {
    text-align: center;
    margin-bottom: 15px;
    font-weight: bold;
    color: green;
  }
  .foto-perfil {
    display: block;
    margin: 0 auto 15px;
    border-radius: 50%;
    width: 100px;
    height: 100px;
    object-fit: cover;
  }
  .btn-voltar {
    display: block;
    margin: 15px auto 0;
    width: 200px;
    text-align: center;
    padding: 10px;
    background: #007bff;
    color: white;
    text-decoration: none;
    border-radius: 6px;
    transition: background 0.3s;
  }
  .btn-voltar:hover {
    background: #0056b3;
  }
</style>
</head>
<body>
  <div class="container">
    <h1>Minha Conta</h1>
    <?php if ($mensagem) echo "<p class='mensagem'>$mensagem</p>"; ?>

    <form action="" method="post" enctype="multipart/form-data">
      <img src="<?= htmlspecialchars($fotoPerfil) ?>" alt="Foto de Perfil" class="foto-perfil">

      <label>Nome:</label>
      <input type="text" name="nome" value="<?= htmlspecialchars($result['nome']); ?>">

      <label>Email:</label>
      <input type="email" name="email" value="<?= htmlspecialchars($result['email']); ?>">

      <label>Nova Senha (opcional):</label>
      <input type="password" name="senha">

      <label>Foto de Perfil:</label>
      <input type="file" name="foto">

      <button type="submit">Salvar Alterações</button>
    </form>

    <!-- Botão Voltar -->
    <a href="javascript:history.back()" class="btn-voltar">⬅ Voltar</a>
  </div>
</body>
</html>
