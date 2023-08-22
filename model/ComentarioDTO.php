<?php
class Comentario
{
	private $id_comentario;
	private $id_usuario;
	private $id_anuncio;
	private $id_resposta;
	private $mensagem;
	private $data;

	// Métodos para atributo id_comentario
	function set_id_comentario($id_comentario){
		$this->id_comentario = $id_comentario;
	}

	function get_id_comentario(){
		return $this->id_comentario;
	}

	// Métodos para atributo id_usuario
	function set_id_usuario($id_usuario){
		$this->id_usuario = $id_usuario;
	}

	function get_id_usuario(){
		return $this->id_usuario;
	}

	// Métodos para atributo id_anuncio
	function set_id_anuncio($id_anuncio){
		$this->id_anuncio = $id_anuncio;
	}

	function get_id_anuncio(){
		return $this->id_anuncio;
	}

	// Métodos para atributo id_resposta
	function set_id_resposta($id_resposta){
		$this->id_resposta = $id_resposta;
	}

	function get_id_resposta(){
		return $this->id_resposta;
	}

	// Métodos para atributo mensagem
	function set_mensagem($mensagem){
		$this->mensagem = $mensagem;
	}

	function get_mensagem(){
		return $this->mensagem;
	}

	// Métodos para atributo data
	function set_data($data){
		$this->data = $data;
	}

	function get_data(){
		return $this->data;
	}
}

?>