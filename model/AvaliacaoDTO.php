<?php
class Avaliacao
{
	private $id_avaliacao;
	private $id_usuarios;
	private $id_anuncio;
	private $nota;
	private $opiniao;
	private $data;

	// Métodos para atributo id_avaliacao
	function set_id_avaliacao($id_avaliacao){
		$this->id_avaliacao = $id_avaliacao;
	}

	function get_id_avaliacao(){
		return $this->id_avaliacao;
	}

	// Métodos para atributo id_usuarios
	function set_id_usuarios($id_usuarios){
		$this->id_usuarios = $id_usuarios;
	}

	function get_id_usuarios(){
		return $this->id_usuarios;
	}

	// Métodos para atributo id_anuncio
	function set_id_anuncio($id_anuncio){
		$this->id_anuncio = $id_anuncio;
	}

	function get_id_anuncio(){
		return $this->id_anuncio;
	}

	// Métodos para atributo nota
	function set_nota($nota){
		$this->nota = $nota;
	}

	function get_nota(){
		return $this->nota;
	}

	// Métodos para atributo opiniao
	function set_opiniao($opiniao){
		$this->opiniao = $opiniao;
	}

	function get_opiniao(){
		return $this->opiniao;
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