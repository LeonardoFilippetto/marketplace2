<?php
	require_once("..\model\ClienteDTO.php");
	require_once("..\model\ClienteDAO.php");
	require_once("..\utils\Messages.php");

	$dao = new ClienteDAO();
	$cliente = new Cliente();

	$cliente->set_nome($_POST["txt_nome"]);
	$cliente->set_idade($_POST['txt_idade']);

	if($dao->inserir($cliente)){
		Messages::sucesso("Cliente incluido com sucesso!");
	}
	else{
		Messages::erro("Ops.. Algo deu errado");
	}



?>