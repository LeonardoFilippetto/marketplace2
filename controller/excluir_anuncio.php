<?php
if(!isset($_POST['excl']))
    header("Location:view/index.php");
require_once('../model/AnuncioDAO.php');

$dao = new AnuncioDAO();
if($dao->excluir($_POST['excl'])){
	echo"<script>alert('Anúncio excluído com sucesso!')</script>";
        header("Location:../view/meus_anuncios.php");
    } else {
        echo"<script>alert('Erro ao excluir anúncio!')</script>";
        header("Location:../view/meus_anuncios.php");
    }
?>
