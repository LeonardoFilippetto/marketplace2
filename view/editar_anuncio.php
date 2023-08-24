<?php
session_start();
if (!isset($_SESSION['id_usuario'])) 
    header("Location: login.php");
if(!isset($_POST['edit']))
    header("Location: index.php");

require_once('../model/AnuncioDAO.php');

$dao = new AnuncioDAO();
$anuncio = $dao->obter($_POST['edit']);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link rel="stylesheet" type="text/css" href="../css/cadastro.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-... (hash)" crossorigin="anonymous" referrerpolicy="no-referrer">

    <title>Informações do anúncio</title>
    <!-- <script defer src="js/cadastro_inicio.js"></script> -->
    <style>
   /* Reset default browser styles */

    </style>
</head>
<body>
<header>
    <a class="btn-voltar" href="meus_anuncios.php"> <h1><i class="fa-solid fa-arrow-left fa-lx" style="color: #ffffff;"></i> Voltar</h1></a>
</header>
    <form method="POST" action="../controller/editar_anuncio.php" id="form_cad">
        <div class="cadastre-se">
            <h1>Informações do Anúncio</h1>

            <div class="cadastro">
                <div class="entrar-items">
                    <label for="titulo_anuncio">Título do anúncio:*</label>
                    <input type="text" id="titulo_anuncio" name="titulo_anuncio" value="<?php echo $anuncio->get_titulo_anuncio(); ?>" required>
                    <p id="mens_titulo_anuncio" class="mens"></p>
                </div>
                <div class="entrar-items">
                    <label for="preco_anuncio">Preço do anúncio:*</label>
                    <input type="number" id="preco_anunc" name="preco_anunc" value="<?php echo $anuncio->get_preco(); ?>" required >
                    <p id="mens_preco_anunc" class="mens"></p>
                </div>
                <div class="entrar-items">
                    <label for="estoque">Unidades do produto em estoque:*</label>
                    <input type="number" id="estoque" name="estoque" value="<?php echo $anuncio->get_estoque(); ?>" required >
                    <p id="mens_estoque" class="mens"></p>
                </div>
                <div class="entrar-items">
                    <label for="descricao">Descrição do anúncio:*</label>
                    <textarea id="descricao" name="descricao" rows="5" cols="33" required><?php echo $anuncio->get_descricao(); ?></textarea>
                    <p id="mens_descricao" class="mens"></p>
                </div>
                <div class="entrar-items">
                    <label for="info_adic">Informações adicionais do produto:*</label>
                    <textarea id="info_adic" name="info_adic" rows="5" cols="33" required><?php echo $anuncio->get_informacoes_adicionais(); ?></textarea>
                    <p id="mens_info_adic" class="mens"></p>
                </div>
                <input type="hidden" name="id_anuncio" value="<?php echo $anuncio->get_id_anuncio(); ?>">
                <p style="font-size:10px; color:#a6a6a6;" name="camp_obr">(*) - Campos obrigatórios</p><br>
                <div class="btn-cad justify"><input type="submit" value="Confirmar edições"></div>
            </div>
        </div>
    </form>
   
</body>
<script src="https://kit.fontawesome.com/9e879c63ad.js" crossorigin="anonymous"></script>
    <footer>
        <strong><p>Copyright © 2023 StockPC Inc. Todos os direitos reservados.</p></strong>
    </footer>
</html>