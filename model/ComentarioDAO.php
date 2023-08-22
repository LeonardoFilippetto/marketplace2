<?php
require_once('..\bd\gerenciador_de_conexoes.php');
require_once('ComentarioDTO.php');

class ComentarioDAO{
	private $con;

	function __construct()
	{
		$this->con = GerenciadorDeConexoes::obter_conexao();
	}

	function inserir($comentario){
		$result = $this->con->query("INSERT INTO comentarios (id_usuario, id_anuncio, id_resposta, mensagem, data ) VALUES ('" . $comentario->get_id_usuario() . "', '" . $comentario->get_id_anuncio() . "', '" . $comentario->get_id_resposta() . "', '" . $comentario->get_mensagem() . "', '" . $comentario->get_data() . "')");
   		 
   		if ($result->rowCount() > 0){
   			return true;1
   		}
   		else{
   			return false;
   		}
	}

	function alterar($comentario){
		$result = $this->con->query("UPDATE comentarios SET id_usuario = '" . $comentario->get_id_usuario() . "', id_anuncio = '" . $comentario->get_id_anuncio() ."', id_resposta = '" . $comentario->get_id_resposta() ."', mensagem = '" . $comentario->get_mensagem() . "', data = '" . $comentario->get_data() ."' WHERE (id_comentario = " . $comentario->get_id_comentario(). ")");

		if ($result->rowCount() > 0){
   			return true;
   		}
   		else{
   			return false;
   		}
	}

	function excluir($id){  
		$result = $this->con->query("DELETE FROM comentario WHERE (id_comentario = '" . $id . "')");

		if ($result->rowCount() > 0){
   			return true;
   		}
   		else{
   			return false;
   		}
	}

	function obter($id){
		$result =$this->con->query("SELECT * FROM comentario WHERE (id_comentario = " . $id . ");");
		$row = $result->fetch(PDO::FETCH_ASSOC);

		$c= new Comentario();
		$c->id_comentario($row['id_comentario']);
		$c->set_id_usuario($row['id_usuario']);
		$c->id_anuncio($row['id_anuncio']);
		$c->id_resposta($row['id_resposta']);
		$c->mensagem($row['mensagem']);
		$c->data($row['data']);
	

		return $c;
	}

	function obter_todos(){
		$lista = [];
		$result =$this->con->query("SELECT * FROM comentraios;");
 
		while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
			$c= new Comentario();
			$c->id_comentario($row['id_comentario']);
			$c->set_id_usuario($row['id_usuario']);
			$c->id_anuncio($row['id_anuncio']);
			$c->id_resposta($row['id_resposta']);
			$c->mensagem($row['mensagem']);
			$c->data($row['data']);
			array_push($lista, $c);
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