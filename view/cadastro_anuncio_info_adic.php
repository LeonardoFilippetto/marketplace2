<?php
session_start();
if(!isset($_SESSION['hidden_inputs']))
    header("Location:index.php");

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
    <title>Cadastro de Anúncio</title>
    <!-- <script defer src="js/cadastro_final.js"></script> -->
</head>
<body>
<header>
    <a class="btn-voltar" href="meus_anuncios.php"> <h1><i class="fa-solid fa-arrow-left fa-lx" style="color: #ffffff;"></i> Voltar</h1></a>
</header>
    <form enctype="multipart/form-data" method="POST" action="../controller/cadastro_anuncio.php">
        <div class="cadastre-se">
            <div class="cadastro">
                <h1>Informações adicionais</h1>
                <div class="entrar-items">
                    <label for="img_princ">Imagem principal do produto:*</label>
                    <input type="file" id="img_princ" name="img_princ" accept="image/*" required>
                    <p id="mens_img_princ" class="mens"></p>
                </div>
                <div class="entrar-items">
                    <label for="imgs_sec">Demais imagens:*</label>
                    <input multiple type="file" id="imgs_sec" name="imgs_sec[]" accept="image/*" required>
                    <p id="mens_imgs_sec" class="mens"></p>
                </div>
                <div class="entrar-items">
                    <label for="descricao">Descrição do anúncio:*</label>
                    <textarea id="descricao" name="descricao" rows="5" cols="33" required></textarea>
                    <p id="mens_descricao" class="mens"></p>
                </div>
                <div class="entrar-items">
                    <label for="info_adic">Informações adicionais do produto:*</label>
                    <textarea id="info_adic" name="informacoes_adicionais" rows="5" cols="33" required></textarea>
                    <p id="mens_info_adic" class="mens"></p>
                    <?php echo $hidden_inputs; ?>
                </div>
                <p style="font-size:12px; color:#a6a6a6;">(*) - Campos obrigatórios</p><br>
                <div class="btn-cad justify"><input type="submit" value="Cadastrar"></div>
            </div>
        </div>
    </form>
    <footer>
        <strong><p>Copyright © 2023 StockPC Inc. Todos os direitos reservados.</p></strong>
    </footer>
    <script src="https://kit.fontawesome.com/9e879c63ad.js" crossorigin="anonymous"></script>  
</body>
</html>