<?php
session_start();
require("req_tipos_produtos.php");

if(isset($_POST['titulo_anuncio'])){
    $_SESSION['post']['anuncio']=$_POST;
    if($_POST['tipo_produto']=='placa_mae'){
        $form_produto = $form_placa_mae;
    }
    elseif($_POST['tipo_produto']=='processador'){
        $form_produto = $form_processador;
    }
    elseif($_POST['tipo_produto']=='ram'){
        $form_produto = $form_ram;
    }
    elseif($_POST['tipo_produto']=='placa_video'){
        $form_produto = $form_placa_video;
    }
    elseif($_POST['tipo_produto']=='armazenamento'){
        $form_produto = $form_armazenamento;
    }
    elseif($_POST['tipo_produto']=='gabinete'){
        $form_produto = $form_gabinete;
    }
    elseif($_POST['tipo_produto']=='fonte'){
        $form_produto = $form_fonte;
    }
    elseif($_POST['tipo_produto']=='cooler'){
        $form_produto = $form_cooler;
    }
    //$celular=str_replace("-","", $_POST['celular']);
}else{
  header("Location:index.php");
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-... (hash)" crossorigin="anonymous" referrerpolicy="no-referrer">
    <title>Dados do produto</title>
    <!-- <script defer src="js/cadastro_final.js"></script> -->
    <style>
        form{
            width: 900px;
        }
    </style>
</head>
<body>
<header>
    <a class="btn-voltar" href="meus_anuncios.php"> <h1><i class="fa-solid fa-arrow-left fa-lx" style="color: #ffffff;"></i> Voltar</h1></a>
</header>
    <form method="POST" action="cadastro_anuncio_info_adic.php">
        <div class="cadastre-se">
                <div class="entrar-items">
                  <label for="ean">EAN (código de barras):*</label>
                    <input type="number" onKeyPress="if(this.value.length==13) return false;" placeholder="1234567891234" id="ean" name="ean" required>
                    <p id="mens_ean" class="mens"></p>
                </div>
                <?php echo $form_produto; ?>
                <p style="font-size:12px; color:#a6a6a6;">(*) - Campos obrigatórios</p><br>
                <div class="btn-cad justify"><input type="submit" value="Prosseguir"></div>
            </div>
        </div>
    </form>
    <footer>
        <strong><p>Copyright © 2023 StockPC Inc. Todos os direitos reservados.</p></strong>
    </footer>  
    <script src="https://kit.fontawesome.com/9e879c63ad.js" crossorigin="anonymous"></script>
</body>
</html>


