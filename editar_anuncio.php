<?php
session_start();
if(!isset($_SESSION['id_usuario'])){
  header("Location:login.php");
}
require("conexao.php");
if(isset($_POST['edit'])){
    $id_anuncio=$_POST['edit'];
    $query_sel_anuncio = "SELECT * FROM anuncios WHERE id_vendedor='".$_SESSION['id_usuario']."' AND id_anuncio='".$id_anuncio."' LIMIT 1";
    $result = mysqli_query($con, $query_sel_anuncio);
    $row = mysqli_fetch_array($result);
    $titulo=$row['titulo_anuncio'];
    $preco=$row['preco'];
    $estoque=$row['estoque'];
    $descricao=$row['descricao'];
    $info_adic=$row['informacoes_adicionais'];
}elseif(isset($_POST['titulo_anuncio'])){
    $id_anuncio=$_POST['id_anuncio'];
    $titulo=$_POST['titulo_anuncio'];
    $preco=$_POST['preco_anunc'];
    $estoque=$_POST['estoque'];
    $descricao=$_POST['descricao'];
    $info_adic=$_POST['info_adic'];
    $query="UPDATE anuncios SET titulo_anuncio='".$titulo."', preco='".$preco."', estoque='".$estoque."', descricao='".$descricao."', informacoes_adicionais='".$info_adic."' WHERE id_anuncio='".$id_anuncio."' AND id_vendedor='".$_SESSION['id_usuario']."'";
    $result=mysqli_query($con, $query);
    if($result){
        echo "<script>alert('Anúncio alterado com sucesso!')</script>";
        header("Location:meus_anuncios.php");
    }else{
        echo "<script>alert('Houve um erro ao alterar o anúncio!')</script>";
        header("Location:meus_anuncios.php");
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link rel="stylesheet" type="text/css" href="css/cadastro.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informações do anúncio</title>
    <!-- <script defer src="js/cadastro_inicio.js"></script> -->
    <style>
   /* Reset default browser styles */
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  
  color: #fff;
}

/* Body styles */
body {
  font-family: arial, sans-serif;
  font-size: 16px;
  background-color: #222;
}

/* Top bar styles */
#topo {
  background-color: #5f17ea;
  color: #fff;
  display: flex;
  align-items: center;
  padding: 10px;
  border-bottom: solid 5px #0123;
  height: 5rem;
}

#topo h1 {
  font-size: 24px;
}

#topo a {
  color: #fff;
  text-decoration: none;
}

.logo-stockpc{
  align-items: center;
  margin-left: 50%;
  transform: translate(-50%);
  margin-top: -25px;
  position:absolute;
}

/* Form styles */
form {
  color: #fff;
  background-color:#434343;
  box-shadow: 0px 0px 10px #222;
  padding: 20px;
  max-width: 500px;
  margin: 20px auto;
  border-radius: 0.8rem;

}

form h1 {
  font-size: 32px;
  margin-bottom: 20px;
  text-align: center;
}

.entrar-items {
  margin-bottom: 20px;
}

.radio{
  display:flex;
  flex-direction: row;
  align-items: left;
  justify-items: left;
  wrap:nowrap;
  margin: 0.25rem 0;
}

label {
  display: block;
  margin-bottom: 5px;
  font-weight: bold;
}

input[type="text"],
input[type="number"],
textarea{
  width: 100%;
  padding: 10px;
  border: none;
  border-radius: 3px;
  box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.1);
  font-size: 16px;
  background-color: #333;
}

input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

input[type="number"]{
  -moz-appearance: textfield;
}

input[type="submit"] {
  width: 100%;
  background-color: #222;
  color: #fff;
  border: none;
  border-radius: 3px;
  padding: 10px 20px;
  font-size: 16px;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

.mens{
  padding:0.2rem 0;
  color:#ff0000;
}

input[type="submit"]:hover {
  background-color: #555;
}

footer{
  height: 5rem;
  width: 100%;
  background-color: #5f17ea;
  text-align: center;
  font-size: 1rem;
  margin-top: 0.5rem ;
  color:#fff;
  margin-bottom: 0;
  display: block;
  border-top: solid 5px #0123;
}

footer p{
  padding: 1.8rem;
}

    </style>
</head>
<body>
    <div id="topo">
        <ul class="back-list">
            <li><a href="login.php"><h1>Voltar</h1></a></li>
            <img src="img/stockpc/stockpc_escrito.png" alt="" class="logo-stockpc">
        </ul>
    </div>
    <form method="POST" action="editar_anuncio.php" id="form_cad">
        <div class="cadastre-se">
            <h1>Informações do Anúncio</h1>

            <div class="cadastro">
                <div class="entrar-items">
                    <label for="titulo_anuncio">Título do anúncio:*</label>
                    <input type="text" id="titulo_anuncio" name="titulo_anuncio" value="<?php echo $titulo; ?>" required>
                    <p id="mens_titulo_anuncio" class="mens"></p>
                </div>
                <div class="entrar-items">
                    <label for="preco_anuncio">Preço do anúncio:*</label>
                    <input type="number" id="preco_anunc" name="preco_anunc" value="<?php echo $preco; ?>" required >
                    <p id="mens_preco_anunc" class="mens"></p>
                </div>
                <div class="entrar-items">
                    <label for="estoque">Unidades do produto em estoque:*</label>
                    <input type="number" id="estoque" name="estoque" value="<?php echo $estoque; ?>" required >
                    <p id="mens_estoque" class="mens"></p>
                </div>
                <div class="entrar-items">
                    <label for="descricao">Descrição do anúncio:*</label>
                    <textarea id="descricao" name="descricao" rows="5" cols="33" required><?php echo $descricao; ?></textarea>
                    <p id="mens_descricao" class="mens"></p>
                </div>
                <div class="entrar-items">
                    <label for="info_adic">Informações adicionais do produto:*</label>
                    <textarea id="info_adic" name="info_adic" rows="5" cols="33" required><?php echo $info_adic; ?></textarea>
                    <p id="mens_info_adic" class="mens"></p>
                </div>
                <input type="hidden" name="id_anuncio" value="<?php echo $id_anuncio; ?>">
                <p style="font-size:10px; color:#a6a6a6;" name="camp_obr">(*) - Campos obrigatórios</p><br>
                <div class="btn-cad justify"><input type="submit" value="Confirmar edições"></div>
            </div>
        </div>
    </form>
   
</body>
    <footer>
        <strong><p>Copyright © 2023 StockPC Inc. Todos os direitos reservados.</p></strong>
    </footer>
</html>