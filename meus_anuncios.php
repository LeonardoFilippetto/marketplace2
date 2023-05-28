<?php
session_start();
if(!isset($_SESSION['id_usuario'])){
    header("Location:login.php");
}
require("conexao.php");
if(isset($_POST['excl'])){
    $id_anunc_excl=$_POST['excl'];
    $query="DELETE FROM anuncios WHERE id_vendedor='".$_SESSION['id_usuario']."' AND id_anuncio='".$id_anunc_excl."'";
    $result=mysqli_query($con, $query);
    if($result){
        echo"<script defer>alert('Anúncio excluído com sucesso!)</script>";
    }else{
        echo"<script defer>alert('Houve um erro ao excluir o anúncio!)</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anúncios</title>
    <link rel="stylesheet" href="css/default.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/meus.anuncios.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" 
    rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script defer src="https://kit.fontawesome.com/0e01c81990.js" crossorigin="anonymous"></script>

</head>
<body>
    <header>
        <?php
            require("req_navbar.php")
        ?>
    </header>
    
 
    <?php
    
        $display_anuncios="";
        $query = "SELECT * FROM anuncios WHERE id_vendedor='".$_SESSION['id_usuario']."'";
        $result = mysqli_query($con, $query);
        $display_anuncios.= "<h1 style='margin-top:1rem;'>Meus Anúncios</h1><a style='color:#000;' href='cadastro_anuncio_inicio.php'>Criar novo anúncio de venda</a><div id='grid'>";
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
                
                $display_anuncios.="<div class='anuncio'>
                    <div class='img_anunc'>
                        <img src='img/".$img_princ."' >
                    </div>
                    <span class='titulo_anunc'>$nome_prod</span>
                    <span class='preco'>R$ ".$preco."</span>
                    <form method='post' id='excluir' action='meus_anuncios.php'>
                        <input type='hidden' name='excl' value='".$id_anunc."'>
                        <input type='submit' value='EXCLUIR' onclick='return confirm("."Tem certeza que quer excluir o anúncio?".");'>
                    </form>
                    <form method='post' id='editar' action='editar_anuncio.php'>
                        <input type='hidden' name='edit' value='".$id_anunc."'>
                        <input type='hidden' name='id_vend' value='".$_SESSION['id_usuario']."'>
                        <input type='submit' value='EDITAR'>
                    </form>
                </div>";
            }
            $display_anuncios.="</div>";
        }else{
            $display_anuncios.= "<div><h3>Não há anúncios registrados.</h3><a style='color:#000;' href='cadastro_anuncio_inicio.php'>Criar novo anúncio de venda</a></div>";
        }
        echo $display_anuncios;
    ?>
    <footer>
        <span>Copyright © 2023 StockPC Inc. Todos os direitos reservados.</span>
    </footer>
    <script src="https://kit.fontawesome.com/0e01c81990.js" crossorigin="anonymous"></script>
</body>
</html>
