<?php
require_once('..\bd\gerenciador_de_conexoes.php');
require_once('***ExemploDTO***.php');

class ***ExemploDAO***{
	private $con;

	function __construct()
	{
		$this->con = GerenciadorDeConexoes::obter_conexao();
	}

	function inserir(***$exemplo***){
		$result = $this->con->query("INSERT INTO ***nome_da_tabela*** (***nome_do_campo***, ***nome_do_campo***) VALUES ('" . ***$exemplo->get_atributo_2()*** . "', " . ***$exemplo->get_atributo_3()*** . ")");
   		
   		if ($result->rowCount() > 0){
   			return true;
   		}
   		else{
   			return false;
   		}
	}

	function alterar(***$exemplo***){
		$result = $this->con->query("UPDATE ***nome_da_tabela*** SET ***nome_do_campo*** = '" . ***$exemplo->get_atributo_2()*** . "', ***nome_do_campo*** = " . ***$exemplo->get_atributo_3()*** . " WHERE (***campo_id*** = " . ***$exemplo->get_id()***. ")");

		if ($result->rowCount() > 0){
   			return true;
   		}
   		else{
   			return false;
   		}
	}

	function excluir($id){  
		$result = $this->con->query("DELETE FROM ***nome_da_tabela*** WHERE (***campo_id*** = '" . $id . "')");

		if ($result->rowCount() > 0){
   			return true;
   		}
   		else{
   			return false;
   		}
	}

	function obter($id){
		$result =$this->con->query("SELECT * FROM ***nome_da_tabela*** WHERE (***campo_id*** = " . $id . ");");
		$row = $result->fetch(PDO::FETCH_ASSOC);

		***$e*** = new ***Exemplo()***;
		***$e***->set_atributo_1($row['***nome_do_campo***']);
		***$e***->set_atributo_2($row['***nome_do_campo***']);
		***$e***->set_atributo_3($row['***nome_do_campo***']);

		return ***$e***;
	}

	function obter_todos(){
		$lista = [];
		$result =$this->con->query("SELECT * FROM ***nome_da_tabela***;");
 
		while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
			***$e*** = new ***Exemplo()***;
		    ***$e***->set_atributo_1($row['***nome_do_campo***']);
		    ***$e***->set_atributo_2($row['***nome_do_campo***']);
		    ***$e***->set_atributo_3($row['***nome_do_campo***']);
			array_push($lista, ***$e***);
		}

		return $lista;
	}

    /*function obter_por_nome($nome){
		$lista = [];
		$result = $this->con->query("SELECT codigo, nome, idade FROM cliente WHERE (nome like '%" . $nome . "%');");
 
		while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
			$c = new Exemplo();
			$c->set_codigo($row['codigo']);
			$c->set_nome($row['nome']);
			$c->set_idade($row['idade']);
			array_push($lista, $c);
		}

		return $lista;
	}*/

}

?>