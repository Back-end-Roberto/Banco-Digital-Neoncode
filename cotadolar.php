<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Banco Neoncode</title>
  <link rel="stylesheet" href="style.css">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
</head>
<body>
  <header>
    <div class="container">
      <img src="imagens/logo.jpg" alt="Banco Neonconde" class="logo">
      <nav>
        <ul>
          <li><a href="">Acesse a sua Conta</a></li>
          <li><a href="index.html">Voltar ao Inicio</a></li>
        </ul>
      </nav>
    </div>
  </header>

  <section class="hero2">
    <div class="container">
      <h1>Cotação do Dolar</h1>
      <h2>Cotação atual extraida do Banco Central.</h2>
      <BR>
      

    <p><h3>
        <?php
            date_default_timezone_set("America/Sao_Paulo");
            echo "Hoje é dia: ".date("d/m/Y");
            echo "<BR><BR>";
    
            // URL da API do Banco Central do Brasil
            $url = "https://api.bcb.gov.br/dados/serie/bcdata.sgs.1/dados/ultimos/1?formato=json";
    
            // Inicializa o cURL
            $ch = curl_init($url);
    
            // Configurações do cURL
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Desabilita a verificação SSL (use com cautela)
    
            // Executa a requisição e captura a resposta
            $response = curl_exec($ch);
    
            // Verifica erros na requisição
            if (curl_errno($ch)) {
                echo 'Erro: ' . curl_error($ch);
                curl_close($ch);
                exit;
            }
    
            // Fecha a conexão cURL
            curl_close($ch);
    
            // Decodifica a resposta JSON
            $data = json_decode($response, true);
    
            // Exibe a cotação de compra do dólar
            if (isset($data[0]['valor'])) {
                echo "1 Dolar equivale a R$ " . $data[0]['valor'];
    
            } else {
                echo "Não foi possível obter a cotação.";
            }
        ?>
    </h3></p>



   




    </div>
  </section>

  

  

  

  

  <footer>
    <div class="container">
      <p>&copy; 2025 Neoncode - Todos os direitos reservados.</p>
      
    </div>
  </footer>
</body>
</html>