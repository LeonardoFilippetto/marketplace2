<?php
/**
* 
*/
class Cliente 
{
	
	private $codigo;
	private $nome; 
	private $idade;

	function set_codigo($codigo){
		$this->codigo = $codigo;
	}

	function get_codigo(){
		return $this->codigo;
	}

	function set_nome($nome){
		$this->nome = $nome;
	}

	function get_nome(){
		return $this->nome;
	}

	function set_idade($idade){
		$this->idade = $idade;
	}

	function get_idade(){
		return $this->idade;
	}
}

?>