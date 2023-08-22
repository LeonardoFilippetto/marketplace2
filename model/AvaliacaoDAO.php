<?php
require_once('..\bd\gerenciador_de_conexoes.php');
require_once('AvaliacaoDTO.php');

class AvaliacaoDAO{
	private $con;

	function __construct()
	{
		$this->con = GerenciadorDeConexoes::obter_conexao();
	}

	function inserir($avaliacao){
		$result = $this->con->query("INSERT INTO avaliacoes (id_usuarios,id_anuncio,nota,opiniao,data) VALUES ('" . $avaliacao->get_id_usuario() . "', '" . $avaliacao->get_id_anuncio() . "', '" . $avaliacao->get_nota() . "', '" . $avaliacao->get_opiniao() . "', '" . $avaliacao->get_data() . "')");
   		
   		if ($result->rowCount() > 0){
   			return true;
   		}
   		else{
   			return false;
   		}
	}

	function alterar($avaliacao){
		$result = $this->con->query("UPDATE avaliacoes SET id_usuario = '" . $avaliacao->get_id_usuario() . "', id_anuncio = " . $avaliacao->get_id_anuncio() . "', nota = '" . $avaliacao->get_nota() . "', opiniao = '" . $avaliacao->get_opiniao() . "', data = '" . $avaliacao->get_data() . "' WHERE (id_avaliacao = " . $avaliacao->get_id_avaliacao(). ")");

		if ($result->rowCount() > 0){
   			return true;
   		}
   		else{
   			return false;
   		}
	}

	function excluir($id){  
		$result = $this->con->query("DELETE FROM avaliacoes WHERE (id_avaliacao = '" . $id . "')");

		if ($result->rowCount() > 0){
   			return true;
   		}
   		else{
   			return false;
   		}
	}

	function obter($id){
		$result =$this->con->query("SELECT * FROM avaliacoes WHERE (id_avaliacao = " . $id . ");");
		$row = $result->fetch(PDO::FETCH_ASSOC);

		$a = new avaliacao();
		$a->set_id_avaliacao($row['id_avaliacao']);
		$a->set_id_usuarios($row['id_usuarios']);
		$a->set_id_anuncio($row['id_anuncio']);
		$a->set_nota($row['nota']);
		$a->set_opiniao($row['opiniao']);
		$a->set_data($row['data']);

		return $a;
	}

	function obter_todos(){
		$lista = [];
		$result =$this->con->query("SELECT * FROM avaliacoes;");
 
		while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
			$a = new avaliacao();
			$a->set_id_avaliacao($row['id_avaliacao']);
			$a->set_id_usuarios($row['id_usuarios']);
			$a->set_id_anuncio($row['id_anuncio']);
			$a->set_nota($row['nota']);
			$a->set_opiniao($row['opiniao']);
			$a->set_data($row['data']);
			array_push($lista, $a);
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