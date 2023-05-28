<?php

session_start();
$string='texto';
$_SESSION['post'][$string]=$_POST[$string];
echo $_SESSION['post']['nome'];
echo "<br><br>".$_SESSION['post']['texto']."<br>";
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
    <form action="enviar_form.php">
        <input type="file" name="foto" id="foto">
        <input type="submit" value="enviar">
    </form>
</body>
</html>