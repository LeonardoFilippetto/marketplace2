<?php
session_start();
if(isset($_GET['des'])){
    session_destroy();
    session_start();
}
require_once('../model/AnuncioDAO.php');

$dao = new AnuncioDAO();

if(isset($_POST['search'])){
    $anuncios = $dao->obter_por_titulo($_POST['search']);
}else{
    $anuncios = $dao->obter_todos();
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>StockPC</title>
        <link rel="stylesheet" href="../css/default.css">
        <link rel="stylesheet" href="../css/index.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" 
        rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <script defer src="https://kit.fontawesome.com/0e01c81990.js" crossorigin="anonymous"></script>
        <script async src="../js/index.js"></script>

      
    </head>
    <body>
  
    <?php
        require "req_navbar.php" 
    ?>
 
 <div class="carousel-container">
        <div class="carousel-slide">
            <img src="../img/1.png" alt="" class="banner_img">
        </div>
        <div class="carousel-slide">
            <img src="../img/2.png" alt="" class="banner_img">
        </div>
        
        <a href="#" class="carousel-prev"><i class="fa-solid fa-chevron-right fa-rotate-180 fa-lg" style="color: #ffffff;"></i></a>
        <a href="#" class="carousel-next"><i class="fa-solid fa-chevron-right fa-lg" style="color: #ffffff;"></i></a>
    </div>
    <div id='grid'>

<?php
    foreach($anuncios as $anuncio){

            echo"<div class='anuncio' id='".$anuncio->get_id_anuncio()."' onclick='pagAnunc(event)'>
                <div class='img_anunc'>
                    <img src='../img/".$anuncio->get_img_princ()."' >
                </div>
                <span class='titulo_anunc'>".$anuncio->get_titulo_anuncio()."</span>
                <span class='preco'>R$ ".number_format($anuncio->get_preco(), 2, ',', '.')."</span>
                <form id='form_carrinho' method='post' action='precarrinho.php'>
                    <input type='hidden' value='".$anuncio->get_id_anuncio()."' name='id_anunc'>
                    <button class='btn_anunc'>COMPRAR</button>
                </form>
            </div>";
    }
?>
    </div>
    <footer>
        <span>Copyright © 2023 StockPC Inc. Todos os direitos reservados.</span>
    </footer>

    <script src="../js/carrossel.js"></script>


    </body>
</html> 