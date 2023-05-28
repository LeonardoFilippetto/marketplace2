<?php
$array = explode('/', $_FILES['foto']['type']);
$extension = end($array);

$nome=time().".".$extension;
$_FILES['foto']['name'] = $nome;
$uploaddir = 'D:/xampp/htdocs/marketplace/marketplace/img/';
$uploadfile = $uploaddir .$_FILES['foto']['name'];

move_uploaded_file($_FILES['foto']['tmp_name'], $uploadfile);


session_start();
$_SESSION['post']=$_POST;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post" action="pegar_imagem.php">
        <input type="text" name="texto" id="texto">
        <input type="submit" value="enviar">
    </form>
</body>
</html>