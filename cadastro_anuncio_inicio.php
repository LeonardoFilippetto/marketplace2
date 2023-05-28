<?php
session_start();
unset($_SESSION['post']);
if(!isset($_SESSION['id_usuario'])){
  header("Location:login.php");
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
input[type="email"],
input[type="password"],
input[type="date"],
input[type="tel"],
select {
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
    <form method="POST" action="cadastro_anuncio_produto.php" id="form_cad">
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
                    <input type="number" id="preco_anunc" name="preco_anunc" placeholder="500,00" required >
                    <p id="mens_preco_anunc" class="mens"></p>
                </div>
                <div class="entrar-items">
                  <label for="tipo_produto">Tipo de produto:*</label>
                    <select name="tipo_produto" id="tipo_produto" required>
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
                        <input type="radio" id="novo" name="cond" value="novo" onclick="mostrarUso(evento)" > <label for="novo" style="margin:0; width:30%; padding:0.2rem;">Novo</label>
                    </div>
                    <div class="radio">
                        <input type="radio" id="usado" name="cond" value="usado" onclick="mostrarUso(evento)"> <label for="usado" style="margin:0; width:30%; padding:0.2rem;">Usado</label>
                    </div><br>
                </div>
                
                <div class="entrar-items">
                    <label for="tempo_uso">Tempo de uso:*</label>
                    <select name="tempo_uso" id="tempo_uso" >
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
                      <option value="12">1 ano</option>
                      <option value="24">2 anos</option>
                      <option value="36">3 anos</option>
                      <option value="37">Mais de três anos</option>
                    </select>
                    <p id="mens_tempo_uso" class="mens"></p>
                </div>
                <div class="entrar-items">
                    <label for="estoque">Unidades do produto em estoque:*</label>
                    <input type="number" id="estoque" name="estoque" placeholder="20" required >
                    <p id="mens_estoque" class="mens"></p>
                </div>
                <p style="font-size:10px; color:#a6a6a6;" name="camp_obr">(*) - Campos obrigatórios</p><br>
                <div class="btn-cad justify"><input type="submit" value="Prosseguir"></div>
            </div>
        </div>
    </form>
   
</body>
    <footer>
        <strong><p>Copyright © 2023 StockPC Inc. Todos os direitos reservados.</p></strong>
    </footer>
</html>