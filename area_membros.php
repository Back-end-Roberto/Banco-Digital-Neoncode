<?php
session_start();

if (!isset($_SESSION['id_usuario'])) {
    header("Location: login.php");
    exit();
}

require 'conexao.php';

$id_usuario = $_SESSION['id_usuario'];
$stmt = $pdo->prepare("SELECT nome, email, data_cadastro FROM usuarios WHERE id = ?");
$stmt->execute([$id_usuario]);
$usuario = $stmt->fetch();
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
      
      <BR>
      

      <h1>Bem vindo cliente tal</h1>
    
      <h2>Bem-vindo, <?php echo htmlspecialchars($usuario['nome']); ?>!</h2>
    <p>Seu ID de usuário: <?php echo $id_usuario; ?></p>
    <p>Email: <?php echo htmlspecialchars($usuario['email']); ?></p>
    <p>Data de cadastro: <?php echo $usuario['data_cadastro']; ?></p>
    
    <a href="logout.php">Sair</a>

      


   




    </div>
  </section>

  

  <footer>
    <div class="container">
      <p>&copy; 2025 Neoncode - Todos os direitos reservados.</p>
      
    </div>
  </footer>
</body>
</html>