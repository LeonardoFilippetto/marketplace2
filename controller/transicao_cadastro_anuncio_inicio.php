<?php
if(!isset($_POST['titulo_anuncio']))
    header("Location:../view/index.php");

session_start();
require_once("../utils/FormularioProduto.php");

$_SESSION['form_produto']=FormularioProduto::monta_formulario($_POST['categoria_produto']);

$_SESSION['hidden_inputs']="";
foreach($_POST as $chave=>$valor){
    $_SESSION['hidden_inputs'].="<input type='hidden' name='".$chave."' value='".$valor."'>";
}

header("Location:../view/cadastro_anuncio_produto.php")
?>