<?php
	require_once('../model/ClienteDAO.php');
	require_once('../utils/Messages.php');

	$codigo = $_GET['codigo'];
	$dao = new ClienteDAO();

	if($dao->excluir($codigo)){
		Messages::sucesso("Oba!");
	}
	else{
		Messages::erro("Epa..");
	}

