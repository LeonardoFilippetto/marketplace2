<?php
if(!isset($_POST['ean']))
    header("Location:../view/index.php");

session_start();
require_once("../utils/FormularioProduto.php");

$_SESSION['hidden_inputs']="";
foreach($_POST as $chave=>$valor){
    $_SESSION['hidden_inputs'].="<input type='hidden' name='".$chave."' value='".$valor."'>";
}

header("Location:../view/cadastro_anuncio_info_adic.php")
?>