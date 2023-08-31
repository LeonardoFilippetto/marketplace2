<?php
session_start();
if(!isset($_SESSION['hidden_inputs']))
    header("Location:../view/index.php");

$hidden_inputs=$_SESSION['hidden_inputs'];
unset($_SESSION['hidden_inputs']);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link rel="stylesheet" type="text/css" href="../css/cadastro.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-... (hash)" crossorigin="anonymous" referrerpolicy="no-referrer">
    <title>Cadastro de Usuário</title>
    <script defer src="../js/cadastro_final.js"></script>
    <style>
        form{
          width: 900px;
        }
    </style>
</head>
<body>
<header>
    <a class="btn-voltar" href="cadastro_inicio.php"> <h1><i class="fa-solid fa-arrow-left fa-lx" style="color: #ffffff;"></i> Voltar</h1></a>
</header>
    <form method="POST" action="../controller/cadastro_usuario.php">
        <div class="cadastre-se">
            <div class="cadastro">
                <h1>Cadastro</h1>
                <div class="entrar-items">
                  <label for="cep">CEP:*</label>
                    <input type="number" onKeyPress="if(this.value.length==8) return false;" id="cep" name="cep" required>
                    <p id="mens_cep" class="mens"></p>
                </div>
                <div class="entrar-items">
                  <label for="logradouro">Logradouro:*</label>
                    <input type="text" id="l" name="logradouro" required >
                    <p id="mens_logradouro" class="mens"></p>
                </div>
                <div class="entrar-items">
                  <label for="numero">Numero:*</label>
                    <input type="number" id="numero" name="numero" required >
                    <p id="mens_numero" class="mens"></p>
                </div>
                <div class="entrar-items">
                  <label for="complemento">Complemento:</label>
                    <input type="text" id="complemento" name="complemento">
                    <p id="mens_complemento" class="mens"></p>
                </div>
                <div class="entrar-items">
                  <label for="bairro">Bairro:*</label>
                    <input type="text" id="bairro" name="bairro" required>
                    <p id="mens_bairro" class="mens"></p>
                </div>
                <div class="entrar-items">
                  <label for="cidade">Cidade:*</label>
                    <input type="text" id="cidade" name="cidade" required>
                    <p id="mens_cidade" class="mens"></p>
                </div>
                <div class="entrar-items">
                  <label for="referencia">Referência:</label>
                    <input type="text" id="referencia" name="referencia">
                    <p id="mens_referência" class="mens"></p>
                </div>
                <p style="font-size:12px; color:#a6a6a6;">(*) - Campos obrigatórios</p><br>
                <?php echo $hidden_inputs; ?>
                <div class="btn-cad justify"><input type="submit" onclick="return verificarEnd()" value="Cadastrar"></div>
                
            </div>
        </div>
    </form>
    <script src="https://kit.fontawesome.com/9e879c63ad.js" crossorigin="anonymous"></script>
</body>
<footer>
        <strong><p>Copyright © 2023 StockPC Inc. Todos os direitos reservados.</p></strong>
</footer>
</html>

