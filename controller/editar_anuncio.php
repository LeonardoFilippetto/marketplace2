<?php
if (isset($_POST['titulo_anuncio'])) {

    require_once("../model/AnuncioDAO.php");
    $dao = new AnuncioDAO();
    $anuncio = $dao->obter($_POST['id_anuncio']);

    $anuncio->set_titulo_anuncio($_POST['titulo_anuncio']);
    $anuncio->set_preco($_POST['preco_anunc']);
    $anuncio->set_estoque($_POST['estoque']);
    $anuncio->set_descricao($_POST['descricao']);
    $anuncio->set_informacoes_adicionais($_POST['info_adic']);
    if ($dao->alterar($anuncio)) {
        echo"<script>alert('Anúncio atualizado com sucesso!')</script>";
        header("Location:../view/meus_anuncios.php");
    } else {
        echo"<script>alert('Erro ao atualizar anúncio!')</script>";
        header("Location:../view/meus_anuncios.php");
    }
}
?>