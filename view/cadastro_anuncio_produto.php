<?php
session_start();
if(!isset($_SESSION['form_produto']))
    header("Location:../view/index.php");

$form_produto=$_SESSION['form_produto'];
$hidden_inputs=$_SESSION['hidden_inputs'];

unset($_SESSION['form_produto']);
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
    <title>Cadastro de Anúncio</title>
    <!-- <script defer src="js/cadastro_final.js"></script> -->
    <style>
        form{
            width: 900px;
        }
    </style>
</head>
<body>
<header>
    <a class="btn-voltar" href="meus_anuncios.php"> <h1><i class="fa-solid fa-arrow-left fa-lx" style="color: #ffffff;"></i> Voltar</h1></a>
</header>
    <form method="POST" action="../controller/transicao_cadastro_anuncio_info_adic.php">
        <div class="cadastre-se">
                <div class="entrar-items">
                  <label for="ean">EAN (código de barras):*</label>
                    <input type="number" onKeyPress="if(this.value.length==13) return false;" placeholder="1234567891234" id="ean" name="ean" required>
                    <p id="mens_ean" class="mens"></p>
                </div>
                <?php echo $form_produto.$hidden_inputs; ?>
                <div class="entrar-items">
                  <label for="consumo_energia">Consumo de energia estimado (Watts):*</label>
                    <input type="number" placeholder="100" id="consumo_energia" name="consumo_energia" required>
                    <p id="mens_consumo_energia" class="mens"></p>
                </div>
                <p style="font-size:12px; color:#a6a6a6;">(*) - Campos obrigatórios</p><br>
                <div class="btn-cad justify"><input type="submit" value="Prosseguir"></div>
            </div>
        </div>
    </form>
    <footer>
        <strong><p>Copyright © 2023 StockPC Inc. Todos os direitos reservados.</p></strong>
    </footer>  
    <script src="https://kit.fontawesome.com/9e879c63ad.js" crossorigin="anonymous"></script>
</body>
</html>


