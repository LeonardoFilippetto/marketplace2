<?php
require("conexao.php");
session_start();
if(isset($_POST["pagina_anterior"])){
    $pag_ant=$_POST["pagina_anterior"];
}
if(isset($_POST['numero'])){
    $numero_form=$_POST['numero'];
    $complemento_form=$_POST['complemento'];
    $logradouro_form=$_POST['logradouro'];
    $bairro_form=$_POST['bairro'];
    $cep_form=$_POST['cep'];
    $cidade_form=$_POST['cidade'];
    $referencia_form=$_POST['referencia'];

    $nome_form=$_POST['nome'];
    $email_form=$_POST['email'];
    $cel_form=$_POST['celular'];
    $data_form=$_POST['data_nasc'];

    $senha = $_SESSION["senha"];

    if($_POST['cad']=="fis"){
        $cpf_form=$_POST['cpf'];

        $query = "INSERT INTO usuarios (cep, logradouro, data_nasc, numero, bairro, complemento, cidade, referencia, nome, cpf, email, senha, celular) VALUES ('$cep_form', '$logradouro_form', '$data_form', '$numero_form', '$bairro_form', '$complemento_form', '$cidade_form', '$referencia_form', '$nome_form', '$cpf_form', '$email_form', '$senha', '$cel_form')";

        echo "Sucesso 😊";
        header("Location:meus_anuncios.php");
    }else{
        $cnpj_form=$_POST['cnpj'];
        $nome_fant_form=$_POST['nome_fant'];
        $raz_soc_form=$_POST['raz_soc'];
        $tributo_form=$_POST['tributo'];
        if(isset($_POST['tel'])){
            $tel_form=$_POST['tel'];
            $query = "INSERT INTO usuarios (cep, logradouro, data_nasc, numero, bairro, complemento, cidade, referencia, nome, cnpj, email, senha, celular, razao_social, tributo, nome_fantasia, telefone_empresa) VALUES ('$cep_form', '$logradouro_form', '$data_form', '$numero_form', '$bairro_form', '$complemento_form', '$cidade_form', '$referencia_form', '$nome_form', '$cnpj_form', '$email_form', '$senha', '$cel_form', '$raz_soc_form', '$tributo_form', '$nome_fant_form', '$tel_form')";
        }else{
            $query = "INSERT INTO usuarios (cep, logradouro, data_nasc, numero, bairro, complemento, cidade, referencia, nome, cnpj, email, senha, celular, razao_social, tributo, nome_fantasia) VALUES ('$cep_form', '$logradouro_form', '$data_form', '$numero_form', '$bairro_form', '$complemento_form', '$cidade_form', '$referencia_form', '$nome_form', '$cnpj_form', '$email_form', '$senha', '$cel_form', '$raz_soc_form', '$tributo_form', '$nome_fant_form')";
        }

        

    }
    $result = mysqli_query($con, $query);
    if($result){
        echo'<script>alert("dados cadastrados com sucesso!");</script>';
        if(isset($pag_ant)){
            header("Location:$pag_ant");
        }
    }else{
        echo'<script>alert("houve um erro!");</script>';
    }
}
?>