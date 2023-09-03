<?php
session_start();
if(!isset($_POST['numero']))
header("Location:../view/index.php");

require_once('../model/UsuarioDAO.php');
$dao = new UsuarioDAO();
$usuario = new Usuario();

$usuario->set_numero($_POST['numero']);
$usuario->set_complemento($_POST['complemento']);
$usuario->set_logradouro($_POST['logradouro']);
$usuario->set_bairro($_POST['bairro']);
$usuario->set_cep($_POST['cep']);
$usuario->set_cidade($_POST['cidade']);
$usuario->set_referencia($_POST['referencia']);

$usuario->set_nome($_POST['nome']);
$usuario->set_email($_POST['email']);
$celular=str_replace('-', '', $_POST['celular']);
$celular=str_replace('(', '', $celular);
$celular=str_replace(')', '', $celular);
$celular=str_replace(' ', '', $celular);
$usuario->set_celular($celular);
$usuario->set_data_nasc($_POST['data_nasc']);
$usuario->set_senha($_POST['senha']);


if($_POST['cad']=="fis"){
    $usuario->set_cpf($_POST['cpf']);
}else{
    $usuario->set_cnpj($_POST['cnpj']);
    $usuario->set_nome_fantasia($_POST['nome_fant']);
    $usuario->set_razao_social($_POST['raz_soc']);
    $usuario->set_tributo($_POST['tributo']);
    if(isset($_POST['tel']))
        $usuario->set_telefone_empresa($_POST['tel']);
}


if($dao->inserir($usuario)){
    echo'<script>alert("Cadastro realizado com sucesso!");</script>';
    $_SESSION["email_usuario"] = $usuario->get_email();
    $_SESSION["id_usuario"] = $usuario->get_id_usuario();
    header("Location:../view/index.php");
}else{
    echo'<script>alert("Erro ao realizar cadastro!");</script>';
    header("Location:../view/index.php");
}

?>