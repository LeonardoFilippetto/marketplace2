<?php
function random_string($length) {
    $str = random_bytes($length);
    $str = base64_encode($str);
    $str = str_replace(["+", "/", "="], "", $str);
    $str = substr($str, 0, $length);
    return $str;
}

if(isset($_POST['descricao'])){
    require("retorna_query.php");
    require("conexao.php");
    session_start();
    $_SESSION['post']['anuncio']['descricao']=$_POST['descricao'];
    $_SESSION['post']['anuncio']['info_adic']=$_POST['info_adic'];

    //upload imagens
    $array_type = explode('/', $_FILES['img_princ']['type']);
    $extension = end($array_type);

    $nome_imgs=time().random_string(24);

    $nome_img_princ=$nome_imgs.".".$extension;

    $_FILES['img_princ']['name'] = $nome_img_princ;
    $uploaddir = 'D:/xampp/htdocs/marketplace/marketplace/img/';
    $uploadfile = $uploaddir.$_FILES['img_princ']['name'];
    move_uploaded_file($_FILES['img_princ']['tmp_name'], $uploadfile);

    echo "<pre>";
    print_r($_FILES['imgs_sec']['name']);
    echo "</pre>";

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

    $_SESSION['post']['anuncio']['img_princ']=$nome_img_princ;
    $_SESSION['post']['anuncio']['imgs_sec']=$nome_imgs_sec;

    //**adicionar info vendedor**
    $query_anuncio=retorna_query_anuncio($_SESSION['post']['anuncio'], $_SESSION['id_usuario']);
    $result = mysqli_query($con, $query_anuncio);


    $query_sel_anuncio = "SELECT id_anuncio FROM anuncios WHERE id_usuario='".$_SESSION['id_usuario']."' ORDER BY id_anuncio DESC LIMIT 1";
    $result = mysqli_query($con, $query_sel_anuncio);
    //verificar funcionamento
    $row = mysqli_fetch_array($result);
    $id_anuncio=$row['id_anuncio'];



    

    $query_produto=retorna_query_produto($_SESSION['post']['produto'], $_SESSION['id_usuario'], $id_anuncio);

    $result = mysqli_query($con, $query_produto);

    echo("<script>alert('dados cadastrados')</script>");
    unset($_SESSION['post']);

}else{
    header("Location:index.php");
}
/*
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
  if (is_uploaded_file($_FILES['my_upload']['tmp_name'])) 
  { 
  	//First, Validate the file name
  	if(empty($_FILES['my_upload']['name']))
  	{
  		echo " File name is empty! ";
  		exit;
  	}

  	$upload_file_name = $_FILES['my_upload']['name'];
  	//Too long file name?
  	if(strlen ($upload_file_name)>100)
  	{
  		echo " too long file name ";
  		exit;
  	}

  	//replace any non-alpha-numeric cracters in th file name
  	$upload_file_name = preg_replace("/[^A-Za-z0-9 \.\-_]/", '', $upload_file_name);

  	//set a limit to the file upload size
  	if ($_FILES['my_upload']['size'] > 1000000) 
  	{
		echo " too big file ";
  		exit;        
    }

    //Save the file
    $dest=__DIR__.'/uploads/'.$upload_file_name;
    if (move_uploaded_file($_FILES['my_upload']['tmp_name'], $dest)) 
    {
    	echo 'File Has Been Uploaded !';
    }
  }
}*/
?>