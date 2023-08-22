<?php
class Anuncio 
{
	private $id_anuncio;
	private $id_produto;
	private $id_vendedor;
	private $titulo_anuncio;
	private $categoria_produto;
	private $preco;
	private $estoque;
	private $img_princ;
	private $imgs_sec;
	private $descricao;
	private $informacoes_adicionais;
	private $ativo;
	private $vendas_registradas;

	// Métodos para atributo id_anuncio
	function set_id_anuncio($id_anuncio){
		$this->id_anuncio = $id_anuncio;
	}

	function get_id_anuncio(){
		return $this->id_anuncio;
	}

	// Métodos para atributo id_produto
	function set_id_produto($id_produto){
		$this->id_produto = $id_produto;
	}

	function get_id_produto(){
		return $this->id_produto;
	}

	// Métodos para atributo id_vendedor
	function set_id_vendedor($id_vendedor){
		$this->id_vendedor = $id_vendedor;
	}

	function get_id_vendedor(){
		return $this->id_vendedor;
	}

	// Métodos para atributo titulo_anuncio
	function set_titulo_anuncio($titulo_anuncio){
		$this->titulo_anuncio = $titulo_anuncio;
	}

	function get_titulo_anuncio(){
		return $this->titulo_anuncio;
	}

	// Métodos para atributo categoria_produto
	function set_categoria_produto($categoria_produto){
		$this->categoria_produto = $categoria_produto;
	}

	function get_categoria_produto(){
		return $this->categoria_produto;
	}

	// Métodos para atributo preco
	function set_preco($preco){
		$this->preco = $preco;
	}

	function get_preco(){
		return $this->preco;
	}

	// Métodos para atributo estoque
	function set_estoque($estoque){
		$this->estoque = $estoque;
	}

	function get_estoque(){
		return $this->estoque;
	}

	// Métodos para atributo img_princ
	function set_img_princ($img_princ){
		$this->img_princ = $img_princ;
	}

	function get_img_princ(){
		return $this->img_princ;
	}

	// Métodos para atributo imgs_sec
	function set_imgs_sec($imgs_sec){
		$this->imgs_sec = $imgs_sec;
	}

	function get_imgs_sec(){
		return $this->imgs_sec;
	}

	// Métodos para atributo descricao
	function set_descricao($descricao){
		$this->descricao = $descricao;
	}

	function get_descricao(){
		return $this->descricao;
	}

	// Métodos para atributo informacoes_adicionais
	function set_informacoes_adicionais($informacoes_adicionais){
		$this->informacoes_adicionais = $informacoes_adicionais;
	}

	function get_informacoes_adicionais(){
		return $this->informacoes_adicionais;
	}

	// Métodos para atributo ativo
	function set_ativo($ativo){
		$this->ativo = $ativo;
	}

	function get_ativo(){
		return $this->ativo;
	}

	// Métodos para atributo vendas_registradas
	function set_vendas_registradas($vendas_registradas){
		$this->vendas_registradas = $vendas_registradas;
	}

	function get_vendas_registradas(){
		return $this->vendas_registradas;
	}
}

?>