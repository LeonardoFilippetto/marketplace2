<?php
session_start();
// if(isset($_POST['pagina_anterior'])){
//     $pagina_anterior=$_POST['pagina_anterior'];//input hidden
// }
require("conexao.php");
$mensagem="";
if(isset($_POST['email'])){
    $email_form=$_POST['email'];
    $senha_form=$_POST['senha'];

    /*$options = ['cost' => 12,];
    $senha_hash = password_hash($senha, PASSWORD_BCRYPT, $options);*/
    
    $query = "SELECT email, senha, id_usuario FROM usuarios WHERE email='".$email_form."'";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_array($result);

    if(is_array($row)) {

        $senha_bd=$row['senha'];
        $email_bd=$row['email'];
        $id_bd=$row['id_usuario'];

        if(password_verify($senha_form, $senha_bd)) {
            $_SESSION["email_usuario"] = $email_bd;
            $_SESSION["id_usuario"] = $id_bd;
            // if($pagina_anterior){
            //     header("Location:$pagina_anterior");
            // }else{
                header("Location:index.php");
            // }
        }else{
            $mensagem="Email ou senha inválidos!";
        }

    }else{
        $mensagem="Email ou senha inválidos!";
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-... (hash)" crossorigin="anonymous" referrerpolicy="no-referrer">

    
    <link rel="stylesheet" href="css/login.css">

    <header>
    <a class="btn-voltar" href="index.php"> <h1><i class="fa-solid fa-arrow-left fa-lx" style="color: #ffffff;"></i> Voltar</h1></a>
</header>
</head>
<body>
     


 <!-- <a href="index.php" class="logo-stockpc"><img src="img/stockpc/stockpc_escrito.png" alt=""></a> -->
<section class="area-login">
    <div class="login">
        <div>
            <img src="" alt="">
        </div>
        
        <form action="" method="post" autocomplete="off">
            <p class="entrar">Entrar na StockPC</p>
            <input type="email" name="email" autofocus style="color:white" required placeholder="Email"><br>
            <input type="password" name="senha" style="color:white" required placeholder="Senha"><br>
            <span class="mensagem"><?php echo $mensagem; ?></span>
           <button id="botao">Entrar</button>

        </form>
                <p><b>Novo na StockPC?<a href="cadastro_inicio.php">Crie uma nova conta.</a></b></p>
        </div>

        <div class="right-section">
           <img src="img/Tablet login-cuate.png" class="tablet-image" style="max-width:700px;"alt="Tablet Login Image"> 
        </div>

   

    <footer>
        <strong>Copyright © 2023 StockPC Inc. Todos os direitos reservados.</strong>
    </footer>

    <script src="https://kit.fontawesome.com/9e879c63ad.js" crossorigin="anonymous"></script>
</body>
</html>