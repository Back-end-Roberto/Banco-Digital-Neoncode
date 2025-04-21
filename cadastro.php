<?php
require 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
    
    try {
        $stmt = $pdo->prepare("INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)");
        $stmt->execute([$nome, $email, $senha]);
        
        $id_usuario = $pdo->lastInsertId();
        
        // Redireciona para página de sucesso
        header("Location: cadastro_sucesso.php?id=$id_usuario");
        exit();
    } catch (PDOException $e) {
        $erro = "Erro ao cadastrar: " . $e->getMessage();
    }
}
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cadastro Banco Neoncode</title>
  <link rel="stylesheet" href="style.css">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
</head>
<body>
  <header>
    <div class="container">
      <img src="imagens/logo.jpg" alt="Banco Neonconde" class="logo">
      <nav>
        <ul>
          
          <li><a href="index.html">Voltar ao Inicio</a></li>
        </ul>
      </nav>
    </div>
  </header>

  <section class="hero2">
    <div class="container">
      <h1>Abertura de Conta</h1>
      <p>Preencha os campos para abrir a sua conta no Banco Neoncode</p>
      <BR>
      

      <h2>Cadastro</h2>
    <?php if (isset($erro)) echo "<p>$erro</p>"; ?>
    <form method="post">
        <label>Nome:</label>
        <input type="text" name="nome" required><br>
        
        <label>Email:</label>
        <input type="email" name="email" required><br>
        
        <label>Senha:</label>
        <input type="password" name="senha" required><br>
        
        <button type="submit">Abrir conta</button>
    </form>
    <p>Já tem conta? <a href="login.php">Acesse sua conta</a></p>

   




    </div>
  </section>

  

  <footer>
    <div class="container">
      <p>&copy; 2025 Neoncode - Todos os direitos reservados.</p>
      
    </div>
  </footer>
</body>
</html>