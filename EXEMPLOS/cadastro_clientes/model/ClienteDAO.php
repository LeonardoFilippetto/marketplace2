<?php
require_once('..\bd\gerenciador_de_conexoes.php');
require_once('ClienteDTO.php');

class ClienteDAO
{
	private $con;

	function __construct()
	{
		$this->con = GerenciadoraDeConexoes::obter_conexao();
	}

	function inserir($cliente){
		$meu_comando = $this->con->query("INSERT INTO cliente (nome, idade) VALUES ('" . $cliente->get_nome() . "', " . $cliente->get_idade() . ")");
   		
   		if ($meu_comando->rowCount() > 0){
   			return true;
   		}
   		else{
   			return false;
   		}
	}

	function alterar($cliente){
		$meu_comando = $this->con->query("UPDATE cliente SET nome = '" . $cliente->get_nome() . "', idade = " . $cliente->get_idade() . " WHERE (codigo = " . $cliente->get_codigo(). ")");

		if ($meu_comando->rowCount() > 0){
   			return true;
   		}
   		else{
   			return false;
   		}
	}

	function excluir($codigo){
		$meu_comando = $this->con->query("DELETE FROM cliente WHERE (codigo = '" . $codigo . "')");

		if ($meu_comando->rowCount() > 0){
   			return true;
   		}
   		else{
   			return false;
   		}
	}

	function obter($codigo){
		$meu_comando =$this->con->query("SELECT codigo, nome, idade FROM cliente WHERE (codigo = " . $codigo . ");");
		$linha = $meu_comando->fetch(PDO::FETCH_ASSOC);

		$c = new Cliente();
		$c->set_codigo($linha['codigo']);
		$c->set_nome($linha['nome']);
		$c->set_idade($linha['idade']);

		return $c;
	}

	function obter_por_nome($nome){
		$lista = [];
		$meu_comando = $this->con->query("SELECT codigo, nome, idade FROM cliente WHERE (nome like '%" . $nome . "%');");
 
		while ($linha = $meu_comando->fetch(PDO::FETCH_ASSOC)) {
			$c = new Cliente();
			$c->set_codigo($linha['codigo']);
			$c->set_nome($linha['nome']);
			$c->set_idade($linha['idade']);
			array_push($lista, $c);
		}

		return $lista;
	}

	function obter_todos(){
		$lista = [];
		$meu_comando = $this->con->query("SELECT codigo, nome, idade FROM cliente;");
 
		while ($linha = $meu_comando->fetch(PDO::FETCH_ASSOC)) {
			$c = new Cliente();
			$c->set_codigo($linha['codigo']);
			$c->set_nome($linha['nome']);
			$c->set_idade($linha['idade']);
			array_push($lista, $c);
		}

		return $lista;
	}
}

?>