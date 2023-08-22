<?php
	require_once('../model/ClienteDAO.php');
	require_once('../model/ClienteDTO.php');

	include('Menu.php');

	$dao = new ClienteDAO();

	if(!isset($_GET['nome'])){
		$clientes = $dao->obter_todos();	
	}
	else{
		$clientes = $dao->obter_por_nome($_GET['nome']);
	}
	
?>
	<h2><center>Clientes Cadastrados</center></h2>
	<table class="table">
		<thead>
			<tr>
				<th scope="col">Código</th>
				<th scope="col">Nome</th>
				<th scope="col">Idade</th>
				<th scope="col"></th>
				<th scope="col"></th>
			</tr>
		</thead>
		<tbody>
<?php
	foreach ($clientes as $c) {
		echo "<tr>";
		echo "<td>" . $c->get_codigo() . "</td>";
		echo "<td>" . $c->get_nome() . "</td>";
		echo "<td>" . $c->get_idade() . "</td>";
		echo "<td><a href = '../controller/ExcluirCliente.php?codigo=" . $c->get_codigo() . "'>Excluir</a></td>";
		echo "<td><a href = '../view/FormAlterarCliente.php?codigo=" . $c->get_codigo() . "'>Alterar</a></td>";
	}
?>
			
		</tbody>
	</table>'