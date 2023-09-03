<?php

if(!isset($_POST['descricao']))
    header("Location:../index.php");

session_start();
function random_string($length) {
    $str = random_bytes($length);
    $str = base64_encode($str);
    $str = str_replace(["+", "/", "="], "", $str);
    $str = substr($str, 0, $length);
    return $str;
}

require_once("../model/AnuncioDAO.php");
require_once("../model/ProdutoDAO.php");

$dao_p = new ProdutoDAO();
$dao_a = new AnuncioDAO();

$produto = new Produto();
$anuncio = new Anuncio();

//upload imagens
$array_type = explode('/', $_FILES['img_princ']['type']);
$extension = end($array_type);

$nome_imgs=time().random_string(24);

$nome_img_princ=$nome_imgs.".".$extension;

$_FILES['img_princ']['name'] = $nome_img_princ;
$uploaddir = 'D:/xampp/htdocs/marketplace2/img/';
$uploadfile = $uploaddir.$_FILES['img_princ']['name'];
move_uploaded_file($_FILES['img_princ']['tmp_name'], $uploadfile);

// echo "<pre>";
// print_r($_FILES['imgs_sec']['name']);
// echo "</pre>";

$countfiles = count($_FILES['imgs_sec']['name']);
$nome_imgs_sec="";
for($i=0;$i<$countfiles;$i++){
        $nome_imgs_sec.=$nome_imgs."_".$i.".".$extension;
        $nome_imgs_sec.=",";
        $_FILES['imgs_sec']['name'][$i]=$nome_imgs."_".$i.".".$extension;

        $uploadfile = $uploaddir.$_FILES['imgs_sec']['name'][$i];
        move_uploaded_file($_FILES['imgs_sec']['tmp_name'][$i], $uploadfile);
}

$nome_imgs_sec = trim($nome_imgs_sec, ',');
//fim upload imagens

$anuncio->set_img_princ($nome_img_princ);
$anuncio->set_imgs_sec($nome_imgs_sec);

if($_POST['categoria_produto']=='placa_mae'){
    $barramentos_video="";
        if(isset($_POST['x1'])){
            $barramentos_video.=$_POST['x1'].",";
        }
        if(isset($_POST['x2'])){
            $barramentos_video.=$_POST['x2'].",";
        }
        if(isset($_POST['x4'])){
            $barramentos_video.=$_POST['x4'].",";
        }
        if(isset($_POST['x8'])){
            $barramentos_video.=$_POST['x8'].",";
        }
        if(isset($_POST['x16'])){
            $barramentos_video.=$_POST['x16'].",";
        }
        if(isset($_POST['x32'])){
            $barramentos_video.=$_POST['x32'].",";
        }
        if(isset($_POST['pci'])){
            $barramentos_video.=$_POST['pci'].",";
        }
        if(isset($_POST['agp'])){
            $barramentos_video.=$_POST['agp'].",";
        }
        if(isset($_POST['thunderbolt'])){
            $barramentos_video.=$_POST['thunderbolt'].",";
        }
        
        if($barramentos_video!=""){
            $barramentos_video = trim($barramentos_video, ',');
        }
        $produto->set_barramentos_video($barramentos_video);
}elseif($_POST['categoria_produto']=='ram'){
    $ram_total=($_POST['ram_pente_individual']*$_POST['quantidade_pentes']);
    $produto->set_ram_total($ram_total);
}


foreach ($_POST as $chave => $valor){
    $setter = 'set_' . $chave; 
    if (method_exists($produto, $setter)) {
        $produto->$setter($valor);
    }elseif(method_exists($anuncio, $setter)){
        $anuncio->$setter($valor);
    }else{
        echo'<script>alert("ERRO!!!!!!!!")</script>';
    }
}

$anuncio->set_id_vendedor($_SESSION['id_usuario']);

if($dao_a->inserir($anuncio)){

    $anuncio=$dao_a->obter_ultimo_por_vendedor($_SESSION['id_usuario']);

    $produto->set_id_anuncio($anuncio->get_id_anuncio());
    $produto->set_id_vendedor($_SESSION['id_usuario']);

    if($dao_p->inserir($produto)){

        $produto=$dao_p->obter_por_anuncio($anuncio->get_id_anuncio());

        $anuncio->set_id_produto($produto->get_id_produto());

        if($dao_a->alterar($anuncio)){
            echo "<script>alert('Anúncio cadastrado com sucesso!)</script>";
            header("Location:../view/meus_anuncios.php");
        }

    }
}

echo "<script>alert('Erro ao cadastrar anúncio!)</script>";
header("Location:../view/meus_anuncios.php");



?>