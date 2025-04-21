<?php
require 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    
    $stmt = $pdo->prepare("SELECT id, nome, senha FROM usuarios WHERE email = ?");
    $stmt->execute([$email]);
    $usuario = $stmt->fetch();
    
    if ($usuario && password_verify($senha, $usuario['senha'])) {
        session_start();
        $_SESSION['id_usuario'] = $usuario['id'];
        $_SESSION['nome_usuario'] = $usuario['nome'];
        
        header("Location: area_membros.php");
        exit();
    } else {
        $erro = "Email ou senha incorretos!";
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
      <h1>Acesso a conta</h1>
      <p>Preencha os campos para acessar sua conta</p>
      <BR>
      

      <h2>Acesso a conta</h2>
    

      <?php if (isset($erro)) echo "<p>$erro</p>"; ?>

    <form method="post">
        <label>Email:</label>
        <input type="email" name="email" required><br>
        
        <label>Senha:</label>
        <input type="password" name="senha" required><br>
        
        <button type="submit">Acessar</button>
    </form>
    <p>Não tem conta? <a href="cadastro.php">Abra sua conta</a></p>


   




    </div>
  </section>

  

  <footer>
    <div class="container">
      <p>&copy; 2025 Neoncode - Todos os direitos reservados.</p>
      
    </div>
  </footer>
</body>
</html>