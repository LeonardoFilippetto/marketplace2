<?php
session_start();
$hidden_inputs = "";
if(!isset($_POST['cad']))
    header("Location:../view/index.php");

    $cad=$_POST['cad'];
    $options = ['cost' => 12,];
    $senha=password_hash($_POST['senha'],   PASSWORD_BCRYPT, $options);

    if($cad=="fis"){
      $hidden_inputs .= "<input type='hidden' name='cad' value='".$cad."'>";
      $hidden_inputs .= "<input type='hidden' name='cpf' value='".$_POST['cpf']."'>";
    }else{
      $hidden_inputs .= "<input type='hidden' name='cad' value='".$cad."'>";
      $hidden_inputs .= "<input type='hidden' name='cnpj' value='".$_POST['cnpj']."'>";
      $hidden_inputs .= "<input type='hidden' name='nome_fant' value='".$_POST['nome_fant'].  "'>";
      $hidden_inputs .= "<input type='hidden' name='raz_soc' value='".$_POST['raz_soc']."'>";
      $hidden_inputs .= "<input type='hidden' name='tributo' value='".$_POST['tributo']."'>";
      if(isset($_POST['tel'])){
        $hidden_inputs .= "<input type='hidden' name='tel' value='".$_POST['tel']."'>";
      }
    }
    $hidden_inputs .= "<input type='hidden' name='nome' value='".$_POST['nome']."'>";
    $hidden_inputs .= "<input type='hidden' name='senha' value='".$senha."'>";
    $hidden_inputs .= "<input type='hidden' name='email' value='".$_POST['email']."'>";
    $celular=str_replace("-","", $_POST['celular']);
    $celular=str_replace(" ","", $_POST['celular']);
    $celular=str_replace("(","", $_POST['celular']);
    $celular_limpo=str_replace(")","", $_POST['celular']);
    $hidden_inputs .= "<input type='hidden' name='celular' value='".$celular_limpo."'>";
    $hidden_inputs .= "<input type='hidden' name='data_nasc' value='".$_POST['data_nasc']."'>";

    $_SESSION['hidden_inputs']=$hidden_inputs;
    header("Location:../view/cadastro_final.php");
?>
