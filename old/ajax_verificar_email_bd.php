<?php
require("conexao.php");
if(isset($_GET['email'])){

    $email=$_GET['email'];
    $query = "SELECT email FROM usuarios WHERE email='".$email."'";
    $result = mysqli_query($con, $query);
    while ($row = mysqli_fetch_array($result)) {
            $email=($row['email']);
            echo $email;
    }
}
?>