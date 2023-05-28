<?php
$hidden_inputs = "";
if(isset($_POST['pagina_anterior'])){
    $pagina_anterior=$_POST['pagina_anterior'];//input hidden
    $hidden_inputs = "<input type='hidden' name='pagina_anterior' value='".$pagina_anterior."'>";
}

if(isset($_POST['cad'])){
    $cad=$_POST['cad'];
    session_start();
    if(!isset($_SESSION["senha"])){
        $options = ['cost' => 12,];
        $_SESSION["senha"]=password_hash($_POST['senha'],   PASSWORD_BCRYPT, $options);
    }
    if($cad=="fis"){
      $hidden_inputs .= "<input type='hidden' name='cad' value='".$cad."'>";
      $hidden_inputs .= "<input type='hidden' name='cpf' value='".$_POST['cpf']."'>";
    }else{
      $hidden_inputs .= "<input type='hidden' name='cad' value='".$cad."'>";
      $hidden_inputs .= "<input type='hidden' name='cnpj' value='".$_POST['cnpj']."'>";
      $hidden_inputs .= "<input type='hidden' name='nome_fant' value='".$_POST['nome_fant'].  "'>";
      $hidden_inputs .= "<input type='hidden' name='raz_soc' value='".$_POST['raz_soc']."'>";
      $hidden_inputs .= "<input type='hidden' name='tributo' value='".$_POST['tributo']."'>";
      if(isset($_POST['tel'])){
        $hidden_inputs .= "<input type='hidden' name='tel' value='".$_POST['tel']."'>";
      }
    }
    $hidden_inputs .= "<input type='hidden' name='nome' value='".$_POST['nome']."'>";
    $hidden_inputs .= "<input type='hidden' name='email' value='".$_POST['email']."'>";
    $celular=str_replace("-","", $_POST['celular']);
    $celular=str_replace(" ","", $_POST['celular']);
    $celular=str_replace("(","", $_POST['celular']);
    $celular_limpo=str_replace(")","", $_POST['celular']);
    $hidden_inputs .= "<input type='hidden' name='celular' value='".$celular_limpo."'>";
    $hidden_inputs .= "<input type='hidden' name='data_nasc' value='".$_POST['data_nasc']."'>";
}
/*if(isset($_POST['numero'])){
    $numero_form=$_POST['numero'];
    $complemento_form=$_POST['complemento'];
    $logradouro_form=$_POST['logradouro'];
    $bairro_form=$_POST['bairro'];
    $cep_form=$_POST['cep'];
    $cidade_form=$_POST['cidade'];
    $referencia_form=$_POST['referencia'];

    $query = "INSERT INTO usuarios (cep, logradouro, data, numero, bairro, complemento, cidade, referencia, nome, cpf, email, senha, celular) VALUES ($cep_form, $logradouro_form, $data_form, $numero_form, $bairro_form, $complemento_form)";
    $result = mysqli_query($con, $query);
}*/
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link rel="stylesheet" type="text/css" href="css/cadastro.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dados de endereço</title>
    <script defer src="js/cadastro_final.js"></script>
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
  font-family: Arial, sans-serif;
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

label {
  display: block;
  margin-bottom: 5px;
  font-weight: bold;
}

input[type="text"],
input[type="email"],
input[type="password"],
input[type="number"] {
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
  width: 100%;;
  background-color: #222;
  color: #fff;
  border: none;
  border-radius: 3px;
  padding: 10px 20px;
  font-size: 16px;
  cursor: pointer;
  transition: background-color 0.3s ease;
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
  margin-top: 10px ;
  color:#fff;
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
    <form method="POST" action="confirmar_email.php">
        <div class="cadastre-se">
            <div class="cadastro">
                <h1>Cadastro</h1>
                <div class="entrar-items">
                  <label for="cep">CEP:*</label>
                    <input type="number" onKeyPress="if(this.value.length==8) return false;" id="cep" name="cep" required>
                    <p id="mens_cep" class="mens"></p>
                </div>
                <div class="entrar-items">
                  <label for="logradouro">Logradouro:*</label>
                    <input type="text" id="l" name="logradouro" required >
                    <p id="mens_logradouro" class="mens"></p>
                </div>
                <div class="entrar-items">
                  <label for="numero">Numero:*</label>
                    <input type="number" id="numero" name="numero" required >
                    <p id="mens_numero" class="mens"></p>
                </div>
                <div class="entrar-items">
                  <label for="complemento">Complemento:</label>
                    <input type="text" id="complemento" name="complemento">
                    <p id="mens_complemento" class="mens"></p>
                </div>
                <div class="entrar-items">
                  <label for="bairro">Bairro:*</label>
                    <input type="text" id="bairro" name="bairro" required>
                    <p id="mens_bairro" class="mens"></p>
                </div>
                <div class="entrar-items">
                  <label for="cidade">Cidade:*</label>
                    <input type="text" id="cidade" name="cidade" required>
                    <p id="mens_cidade" class="mens"></p>
                </div>
                <div class="entrar-items">
                  <label for="referencia">Referência:</label>
                    <input type="text" id="referencia" name="referencia">
                    <p id="mens_referência" class="mens"></p>
                </div>
                <p style="font-size:12px; color:#a6a6a6;">(*) - Campos obrigatórios</p><br>
                <?php echo $hidden_inputs; ?>
                <div class="btn-cad justify"><input type="submit" onclick="return verificarEnd()" value="Cadastrar"></div>
                
            </div>
        </div>
    </form>
</body>
<footer>
        <strong><p>Copyright © 2023 StockPC Inc. Todos os direitos reservados.</p></strong>
</footer>
</html>

