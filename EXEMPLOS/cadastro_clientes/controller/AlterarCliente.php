<?php
	require_once('../model/ClienteDAO.php');
	require_once('../model/ClienteDTO.php');
	require_once('../utils/Messages.php');

	$codigo = $_POST['lbl_codigo'];
	$nome = $_POST['txt_nome'];
	$idade = $_POST['txt_idade'];

	$dao = new ClienteDAO();
	$cliente = new Cliente();

	$cliente->set_codigo($codigo);
	$cliente->set_nome($nome);
	$cliente->set_idade($idade);

	if($dao->alterar($cliente)){
		Messages::sucesso("Cliente salvo com sucesso!");
	}
	else{
		Messages::erro("Ops.. Algo deu errado");
	}





?>