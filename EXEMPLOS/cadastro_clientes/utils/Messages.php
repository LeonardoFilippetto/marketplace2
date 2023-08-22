<?php

class Messages
{	
	
	public static function sucesso($msg){
		include('../view/Menu.php');
		echo "<link href='../bootstrap/css/bootstrap.min.css' rel='stylesheet'/><script src='../bootstrap/js/bootstrap.min.js'></script><div class='alert alert-success'><strong>Sucesso!</strong> " . $msg ."</div>";
	}

	public static function erro($msg){
		include('../view/Menu.php');
		echo "<link href='../bootstrap/css/bootstrap.min.css' rel='stylesheet'/><script src='../bootstrap/js/bootstrap.min.js'></script><div class='alert alert-danger'><strong>Erro!</strong> " . $msg . "</div>";
	}
}


?>