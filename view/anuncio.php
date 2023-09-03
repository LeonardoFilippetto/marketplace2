<?php
session_start();
if(!isset($_GET['id_anunc']))
    header("Location:index.php");

require_once('../model/AnuncioDAO.php');
require_once('../model/ProdutoDAO.php');
require_once('../model/UsuarioDAO.php');
require_once('../utils/Especificacoes.php');

$dao_a = new AnuncioDAO();
$anuncio = $dao_a->obter($_GET['id_anunc']);

if($anuncio->get_ativo()==0)
header("Location:index.php");

$dao_p = new ProdutoDAO();
$produto = $dao_p->obter($anuncio->get_id_produto());

$dao_u = new UsuarioDAO();
$usuario = $dao_u->obter($anuncio->get_id_vendedor());

?>    
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo $anuncio->get_titulo_anuncio(); ?></title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" 
        rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <script defer src="https://kit.fontawesome.com/0e01c81990.js" crossorigin="anonymous"></script>

        <link rel="stylesheet" href="../css/default.css">
        <link rel="stylesheet" href="../css/index.css">
        <link rel="stylesheet" href="../css/anuncio.css">
        <script src="../js/busca.js"></script>
        <script src="../js/accordion.js"></script>
    
    </head>
    <body>
        <header>

        
        <?php
            require("req_navbar.php") ;
        ?>

        </header>

        <div id="main" class="secao">
            <h1><b><?php echo $anuncio->get_titulo_anuncio(); ?></b></h1>
            <div id="imagens" class="secao_main">
                <div id="imgs_secundarias">
                <div class='img_sec'><img src='../img/<?php echo $anuncio->get_img_princ(); ?>' class='img_sec'></div>
                    <?php
                        foreach($anuncio->get_imgs_sec() as $imagem){
                            echo"<div class='img_sec'><img src='../img/$imagem' ></div>";
                        }
                    ?>
                </div>
                <div id="img_principal">
                    <img src="../img/<?php echo $anuncio->get_img_princ(); ?>">
                </div>
            </div>

            <div id="info_principal"  class="secao_main">
                <div id="info_geral">
                    <p>**avaliação** **condição** <?php echo $produto->get_fabricante(); ?></p>
                </div>
                <div id="frete">
                    <?php if(!isset($_SESSION['id_usuario'])){?>
                        <label for="cep"><strong>Insira o CEP para calcular frete e prazo de entrega:</strong></label><br>
                        <input type="number" onKeyPress="if(this.value.length==8) return false;" id="cep" name="cep" placeholder="Inserir CEP" > <button id="btn_frete">OK</button> 
                    <?php } else{?>
                        <p>**frete** **endereço** **alterar endereço**</p>
                    <?php } ?>
                </div>
                <div id="compra">
                    <div id="preco"><b>R$<?php echo $anuncio->get_preco(); ?></b></div>
                    <form id='form_carrinho' action='precarrinho.php'>
                        <input type='hidden' value='<?php echo $anuncio->get_id_anuncio();?>' name='id_anunc'>
                        <button class='btn_anunc'>COMPRAR</button>
                    </form>
                </div>
                
            </div>
        </div>

        <div id="info_secundaria">
            <div id="descricao" class="secao">
                <h3 class='titulo_secao'><img src="../img/icons/documento-de-texto.png" alt="">Descrição do produto</h3>
                <p class='p_secao'><?php echo $anuncio->get_descricao(); ?></p>
            </div>
            <div id="especific_tec" class="secao">
                <h3 class='titulo_secao'><img src="../img/icons/info.png" alt="">Especificações técnicas</h3>
                <p class='p_secao'><?php echo Especificacoes::monta_especificacoes($produto) ?></p>
            </div>
            <div id="info_adic" class="secao">
                <h3 class='titulo_secao'><img src="../img/icons/adicionar-ficheiro.png" alt="">Informações adicionais</h3>
                <p class='p_secao'><?php echo $anuncio->get_informacoes_adicionais() ?></p>
            </div>
        </div>


        <footer>
            <span>Copyright © 2023 StockPC Inc. Todos os direitos reservados.</span>
        </footer>
                    
                        
    </body>
</html>