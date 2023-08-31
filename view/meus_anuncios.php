<?php
session_start();
if(!isset($_SESSION['id_usuario']))
    header("Location:login.php");

require_once('../model/AnuncioDAO.php');
$dao = new AnuncioDAO();
$anuncios = $dao->obter_por_vendedor($_SESSION['id_usuario']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anúncios</title>
    <link rel="stylesheet" href="../css/default.css">
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/meus.anuncios.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" 
    rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script defer src="https://kit.fontawesome.com/0e01c81990.js" crossorigin="anonymous"></script>

</head>
<body>
  
<?php
    require("req_navbar.php");
    if($anuncios!=[]){
        echo "<h1 style='margin-top:5rem;'>Meus Anúncios</h1><a class='link_criar_anuncio' href='cadastro_anuncio_inicio.php'><i class='fa-solid fa-plus fa-lg'></i>   Criar novo anúncio de venda</a><div id='grid'>";
        
           foreach($anuncios as $anuncio) {
                echo "<div class='anuncio'>
                    <div class='img_anunc'>
                        <img src='../img/".$anuncio->get_img_princ()."' >
                    </div>
                    <span class='titulo_anunc'>".$anuncio->get_titulo_anuncio()."</span>
                    <span class='preco'>R$ ".number_format($anuncio->get_preco(), 2, ',', '.')."</span>
                    <form method='post' id='excluir' action='../controller/excluir_anuncio.php'>
                        <input type='hidden' name='excl' value='".$anuncio->get_id_anuncio()."'>
                        <input type='submit' value='EXCLUIR' class='btn_excluir' onclick='return confirm("."Tem certeza que quer excluir o anúncio?".");'>
                    </form>
                    <form method='post' id='editar' action='editar_anuncio.php'>
                        <input type='hidden' name='edit' value='".$anuncio->get_id_anuncio()."'>
                        <input type='hidden' name='id_vend' value='".$_SESSION['id_usuario']."'>
                        <input type='submit' value='EDITAR' class='btn_editar'>
                    </form>
                </div>";
            }
            echo "</div>";
        }else{
            echo "<div><h3>Não há anúncios registrados.</h3></div>";
        }
?>
    <footer>
        <span>Copyright © 2023 StockPC Inc. Todos os direitos reservados.</span>
    </footer>
    <script src="https://kit.fontawesome.com/0e01c81990.js" crossorigin="anonymous"></script>
</body>
</html>