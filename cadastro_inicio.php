<?php 
session_start();
session_destroy();
$input_pag_ant="";
if(isset($_POST['pagina_anterior'])){
    $pagina_anterior=$_POST['pagina_anterior'];
    $input_pag_ant='<input type="hidden" name="pagina_anterior" value="'.$pagina_anterior.'">';
}

?>

        <!DOCTYPE html>
<html lang="pt-br">
<head>
    <link rel="stylesheet" type="text/css" href="css/cadastro.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dados do vendedor</title>
    <script defer src="js/cadastro_inicio.js"></script>
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
  background-color: #fff;
}

/* Top bar styles */
#topo {
  background-color: #434343;
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
  background-color: #434343;
  text-align: center;
  font-size: 1rem;
  margin-top: 0.5rem ;
  color:#434343;
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
            <a href="index.php"><img src="img/stockpc/stockpc_escrito.png" alt="" class="logo-stockpc"></a>
        </ul>
    </div>
    <form method="POST" action="cadastro_final.php" id="form_cpf" style="display:block">
        <div class="cadastre-se">
            <h1>Informações pessoais</h1>
            <div class="tipo_usuario">
              <div class="radio">
                <input type="radio" id="cad_fis" name="cad" value="fis" onclick="cadastroFisica(event)" checked="checked"> <label for="cad_fis" style="margin:0; width:30%; padding:0.2rem;">Pessoa Física</label>
              </div><br>
              <div class="radio">
                <input type="radio" id="cad_jur" name="cad" value="jur" onclick="cadastroJuridica(event)" /> <label for="cad_jur" style="margin:0; width:30%; padding:0.2rem;">Pessoa Jurídica</label>
              </div><br><br>
            </div>

            <div class="cadastro">
                <div class="entrar-items">
                  <label for="fis_nome">Nome Completo:*</label>
                    <input type="text" id="fis_nome" name="nome" placeholder="João Santos" required>
                    <p id="fis_mens_nome" class="mens"></p>
                </div>
                <div class="entrar-items">
                  <label for="fis_cpf">CPF:*</label>
                    <input type="number" onKeyPress="if(this.value.length==11) return false;" id="fis_cpf" name="cpf" placeholder="12345678901" required >
                    <p id="fis_mens_cpf" class="mens"></p>
                </div>
                <div class="entrar-items">
                  <label for="fis_email">Email:*</label>
                    <input type="email" id="fis_email" name="email" placeholder="email@email.com" required >
                    <p id="fis_mens_email" class="mens"></p>
                </div>
                <div class="entrar-items">
                  <label for="fis_senha">Senha:*</label>
                    <input type="password" id="fis_senha" name="senha" placeholder="*********" required>
                    <p id="fis_mens_senha" class="mens"></p>
                </div>
                <div class="entrar-items">
                  <label for="fis_conf_senha">Confirmar Senha:*</label>
                    <input type="password" id="fis_conf_senha" name="conf_senha" placeholder="*********" required>
                    <p id="fis_mens_conf_senha" class="mens"></p>
                </div>
                <div class="entrar-items">
                  <label for="fis_celular">Celular:*</label>
                    <input type="tel" oninput="handlePhone(event)" id="fis_celular" maxlength="15" name="celular" placeholder="(19) 99999-9999" required>
                    <p id="fis_mens_cel" class="mens"></p>
                </div>
                <div class="entrar-items">
                    <label for="fis_data_nasc">Data de nascimento:*</label>
                    <input type="date" id="fis_data_nasc" name="data_nasc" required>
                    <p id="fis_mens_data_nasc" class="mens"></p>
                </div>
                <p style="font-size:10px; color:#a6a6a6;" name="camp_obr">(*) - Campos obrigatórios</p><br>
                <?php echo $input_pag_ant ?>
                <div class="btn-cad justify"><input type="submit" id="submit_fis" value="Cadastrar"></div>
            </div>
        </div>
    </form>

    <form method="POST" action="cadastro_final.php" id="form_cnpj" style="display:none">
        <div class="cadastre-se">
            <h1>Informações institucionais</h1>
            <div class="tipo_usuario">
              <div class="radio">
                <input type="radio" id="cad_fis" name="cad" value="fis" onclick="cadastroFisica(event)" > <label for="cad_fis" style="margin:0; width:30%; padding:0.2rem;">Pessoa Física</label>
              </div><br>
              <div class="radio">
                <input type="radio" id="cad_jur" name="cad" value="jur" onclick="cadastroJuridica(event)" checked="checked"> <label for="cad_jur" style="margin:0; width:30%; padding:0.2rem;">Pessoa Jurídica</label>
              </div><br><br>
            </div>
            <div class="cadastro">
                <div class="entrar-items">
                  <label for="jur_nome">Nome Completo do Responsável:*</label>
                    <input type="text" id="jur_nome" name="nome" placeholder="João Santos" required>
                    <p id="jur_mens_nome" class="mens"></p>
                </div>
                <div class="entrar-items">
                  <label for="jur_cnpj">CNPJ:</label>
                    <input type="number" onKeyPress="if(this.value.length==14) return false;" id="jur_cnpj" name="cnpj" placeholder="12.345.678/0001-90" required >
                    <p id="jur_mens_cnpj" class="mens"></p>
                </div>
                <div class="entrar-items">
                  <label for="jur_nome_fant">Nome Fantasia:*</label>
                    <input type="text" id="jur_nome_fant" name="nome_fant" placeholder="Samsung" required>
                    <p id="jur_mens_nome_fant" class="mens"></p>
                </div>
                <div class="entrar-items">
                  <label for="jur_raz_soc">Razão Social:*</label>
                    <input type="text" id="jur_raz_soc" name="raz_soc" placeholder="Samsung Electronics Co., Ltd." required >
                    <p id="jur_mens_raz_soc" class="mens"></p>
                </div>
                <div class="entrar-items">
                  <label for="jur_tributo">Informações Tributárias:*</label>
                  <select name="tributo" id="jur_tributo" required>
                    <option value="">Selecione uma opção</option>
                    <option value="contribuinte">Contribuinte ICMS</option>
                    <option value="naocontribuinte">Não contribuinte ICMS</option>
                    <option value="isento">Isento de inscrição estadual</option>
                  </select>
                  <p id="jur_mens_tributo" class="mens"></p>
                </div>
                <div class="entrar-items">
                  <label for="jur_email">Email da Empresa:*</label>
                    <input type="email" id="jur_email" name="email" placeholder="email@email.com" required>
                    <p id="jur_mens_email" class="mens"></p>
                </div>
                <div class="entrar-items">
                  <label for="jur_senha">Senha:*</label>
                    <input type="password" id="jur_senha" name="senha" placeholder="*********" required>
                    <p id="jur_mens_senha" class="mens"></p>
                </div>
                <div class="entrar-items">
                  <label for="jur_conf_senha">Confirmar Senha:*</label>
                    <input type="password" id="jur_conf_senha" name="conf_senha" placeholder="*********" required>
                    <p id="jur_mens_conf_senha" class="mens"></p>
                </div>
                <div class="entrar-items">
                  <label for="jur_celular">Celular da Empresa:*</label>
                    <input type="tel" oninput="handlePhone(event)" id="jur_celular" maxlength="15" name="celular" placeholder="(19) 99999-9999" required>
                    <p id="jur_mens_cel" class="mens"></p>
                </div>
                <div class="entrar-items">
                    <label for="jur_tel">Telefone da Empresa:</label>
                    <input type="number" onKeyPress="if(this.value.length==10) return false;"  id="jur_tel" placeholder="(19) 9999-9999" name="tel" >
                    <p id="jur_mens_tel" class="mens"></p>
                </div>
                <div class="entrar-items">
                    <label for="jur_data_nasc">Data de Fundação:*</label>
                    <input type="date" id="jur_data_nasc" name="data_nasc" required>
                    <p id="jur_mens_data_nasc" class="mens"></p>
                </div>
                <p style="font-size:10px; color:#a6a6a6;" name="camp_obr">(*) - Campos obrigatórios</p><br>
                <?php echo $input_pag_ant ?>
                <div class="btn-cad justify"><input type="submit" id="submit_jur" value="Prosseguir"></div>
            </div> 
        </div>
    </form>
</body>
    <footer>
        <strong><p>Copyright © 2023 StockPC Inc. Todos os direitos reservados.</p></strong>
    </footer>
</html>
    
