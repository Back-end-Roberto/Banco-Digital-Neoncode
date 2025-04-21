<?php
$id_usuario = $_GET['id'] ?? 0;
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
    
      <h2>Cadastro realizado com sucesso!</h2>
    <p>Seu ID de usuário é: <?php echo $id_usuario; ?></p>
    <p>Agora você pode <a href="login.php">fazer login</a> para acessar sua conta.</p>




    </div>
  </section>

  

  <footer>
    <div class="container">
      <p>&copy; 2025 Neoncode - Todos os direitos reservados.</p>
      
    </div>
  </footer>
</body>
</html>