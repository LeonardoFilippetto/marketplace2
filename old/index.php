<?php
session_start();
if(isset($_GET['des'])){
    session_destroy();
    session_start();
}
require("conexao.php");
if(isset($_POST['search'])){
    $termo_busca=strtolower($_POST['search']);

    $query="SELECT * FROM anuncios WHERE LOWER(titulo_anuncio) LIKE'%$termo_busca%'";
    $result = mysqli_query($con, $query);
    if(mysqli_num_rows($result)==0){
        $query = "SELECT * FROM anuncios WHERE LEVENSHTEIN_CONTAINS('$termo_busca', titulo_anuncio, ".strlen($termo_busca)/7 .")";
        $result = mysqli_query($con, $query);
        if(mysqli_num_rows($result)==0){
            $palavras_busca=explode(' ', $termo_busca);
            $query="SELECT * FROM anuncios WHERE ";
            foreach($palavras_busca as $palavra){
                $query.="LOWER(titulo_anuncio) LIKE'%$palavra%' OR ";
            }
            $query= rtrim($query, ' OR ');
            $result = mysqli_query($con, $query);
        
            if(mysqli_num_rows($result)==0){
                $query = "SELECT * FROM anuncios WHERE ";
                foreach ($palavras_busca as $palavra) {
                $query .= "LEVENSHTEIN_CONTAINS('$palavra', titulo_anuncio, ".strlen($palavra)/3 .") OR ";
                }
                $query = rtrim($query, "OR "); 
                $result = mysqli_query($con, $query);
            }
        }
    } 

}   
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>StockPC  </title>
        <link rel="stylesheet" href="css/default.css">
        <link rel="stylesheet" href="css/index.css">
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
        require "req_navbar.php" 
    ?>

    <div id="progressbar"></div>
 
    <div class="carousel-container">
        <div class="carousel-slide">
            <img src="img/1.png" alt="" class="banner_img">
        </div>
        <div class="carousel-slide">
            <img src="img/2.png" alt="" class="banner_img">
        </div>
        
        <a href="#" class="carousel-prev"><i class="fa-solid fa-chevron-right fa-rotate-180 fa-lg" style="color: #ffffff;"></i></a>
        <a href="#" class="carousel-next"><i class="fa-solid fa-chevron-right fa-lg" style="color: #ffffff;"></i></a>
    </div>


    <!-- <section class='banner'>
        <img src="img/banner.png" alt="" class="banner_img">
    </section> -->

    <?php
    /*$palavras_chave = explode(' ', $termo_busca);
    $palavras_chave_norm = array_map(function($palavra) {
    return iconv('UTF-8', 'ASCII//TRANSLIT', $palavra);
    }, $palavras_chave);
    $palavras_chave_norm = array_map('strtolower', $palavras_chave_norm);

    $query = "SELECT * FROM tabela WHERE ";
    foreach ($palavras_chave_norm as $palavra) {
    $query .= "LEVENSHTEIN('$palavra', coluna) <= 2 OR ";
    }
    $query = rtrim($query, "OR "); */
    if(!isset($query)){ 
        $query = "SELECT * FROM anuncios";
        $result = mysqli_query($con, $query);
    }

    echo "<div id='grid'>";
    if(mysqli_num_rows($result)!=0){
        while ($row = mysqli_fetch_array($result)) {
            $id_anunc=($row['id_anuncio']);
            $id_vend=($row['id_vendedor']);
            $nome_prod=($row['titulo_anuncio']);
            //$tipo=($row['tipo_prod']);
            $preco=($row['preco']);
            $img_princ=($row['img_princ']);
            /*echo $id_anunc."<br>";
            echo $id_vend."<br>";
            echo $nome_prod."<br>";
            echo $tipo."<br>";
            echo $preco."<br>";
            echo "<img src='img/".$img_princ."' width='200px'><br><br>";*/

            echo"<div class='anuncio' id='".$id_anunc."' onclick='pagAnunc(event)'>
                <div class='img_anunc'>
                    <img src='img/".$img_princ."' >
                </div>
                <span class='titulo_anunc'>$nome_prod</span>
                <span class='preco'>R$ ".number_format($preco, 2, ',', '.')."</span>
                <form id='form_carrinho' method='post' action='precarrinho.php'>
                    <input type='hidden' value='".$id_anunc."' name='id_anunc'>
                    <button class='btn_anunc'>COMPRAR</button>
                </form>
            </div>";
        }
    }
    echo"</div>";
            
    ?>
    <footer>
        <span>Copyright © 2023 StockPC Inc. Todos os direitos reservados.</span>
    </footer>

    <script src="js/carrossel.js"></script>


    </body>
</html> 
