<?php
session_start();
if(!isset($_SESSION['id_usuario']))
  header("Location:../view/login.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link rel="stylesheet" type="text/css" href="../css/cadastro.css">
    <script src="js/cadastro_anuncio_inicio.js" defer></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-... (hash)" crossorigin="anonymous" referrerpolicy="no-referrer">
    <script src="../js/cadastro_anuncio_inicio.js" defer></script>
    <title>Cadastro de Anúncio</title>
    <!-- <script defer src="js/cadastro_inicio.js"></script> -->
    <style>
   /* Reset default browser styles */

    </style>
</head>
<body>

<header>
    <a class="btn-voltar" href="meus_anuncios.php"> <h1><i class="fa-solid fa-arrow-left fa-lx" style="color: #ffffff;"></i> Voltar</h1></a>
</header>

    <form method="POST" action="../controller/transicao_cadastro_anuncio_inicio.php" id="form_cad">
        <div class="cadastre-se">
            <h1>Informações do Anúncio</h1>

            <div class="cadastro">
                <div class="entrar-items">
                    <label for="titulo_anuncio">Título do anúncio:*</label>
                    <input type="text" id="titulo_anuncio" name="titulo_anuncio" placeholder="Placa de vídeo NVIDIA RTX 3090" required>
                    <p id="mens_titulo_anuncio" class="mens"></p>
                </div>
                <div class="entrar-items">
                    <label for="preco_anuncio">Preço do anúncio:*</label>
                    <input type="number" id="preco_anunc" name="preco" placeholder="500,00" required >
                    <p id="mens_preco_anunc" class="mens"></p>
                </div>
                <div class="entrar-items">
                  <label for="tipo_produto">Tipo de produto:*</label>
                    <select name="categoria_produto" id="tipo_produto" required>
                      <option value="">Selecione uma opção</option>
                      <option value="placa_mae">Placa-mãe</option>
                      <option value="processador">Processador</option>
                      <option value="ram">Memória RAM</option>
                      <option value="placa_video">Placa de vídeo</option>
                      <option value="armazenamento">Armazenamento</option>
                      <option value="gabinete">Gabinete</option>
                      <option value="fonte">Fonte de alimentação</option>
                      <option value="cooler">Cooler/FAN</option>
                    </select>
                    <p id="mens_tipo_produto" class="mens"></p>
                </div>
                <div class="cond_prod">
                    <label>Condição do Produto:*</label>
                    <div class="radio">
                        <input type="radio" id="novo" name="condicao" value="novo" onclick="mostrarUso(event)" > <label for="novo" style="margin:0; width:30%; padding:0.2rem;">Novo</label>
                    </div>
                    <div class="radio">
                        <input type="radio" id="usado" name="condicao" value="usado" onclick="mostrarUso(event)"> <label for="usado" style="margin:0; width:30%; padding:0.2rem;">Usado</label>
                    </div><br>
                </div>
                
                <div class="entrar-items" id="div_tempo_uso" style="display:none;">
                    <label for="tempo_uso">Tempo de uso do produto:*</label>
                    <select name="tempo_uso" id="sel_tempo_uso" >
                      <option value="">Selecione uma opção</option>
                      <option value="0">Menos de um mês</option>
                      <option value="1">1 mês</option>
                      <option value="2">2 meses</option>
                      <option value="4">3 meses</option>
                      <option value="4">4 meses</option>
                      <option value="5">5 meses</option>
                      <option value="5">5 meses</option>
                      <option value="6">6 meses</option>
                      <option value="7">7 meses</option>
                      <option value="8">8 meses</option>
                      <option value="8">8 meses</option>
                      <option value="9">9 meses</option>
                      <option value="10">10 meses</option>
                      <option value="11">11 meses</option>
                      <option value="12">1 a 2 anos</option>
                      <option value="24">2 a 3 anos</option>
                      <option value="36">Mais de três anos</option>
                    </select>
                    <p id="mens_tempo_uso" class="mens"></p>
                </div>

                <div class="entrar-items">
                    <label for="estoque">Unidades do produto em estoque:*</label>
                    <input type="number" id="estoque" name="estoque" placeholder="20" required >
                    <p id="mens_estoque" class="mens"></p>
                </div>
                <p style="font-size:10px; color:#a6a6a6;" name="camp_obr">(*) - Campos obrigatórios</p><br>
                <input class="btn-cad justify" type="submit" value="Prosseguir">
            </div>
        </div>
    </form>
   <footer>
        <strong>Copyright © 2023 StockPC Inc. Todos os direitos reservados.</strong>
    </footer>
    <script src="https://kit.fontawesome.com/9e879c63ad.js" crossorigin="anonymous"></script>
</body>  
</html>