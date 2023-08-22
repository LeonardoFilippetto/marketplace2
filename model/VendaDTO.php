<?php
class Venda 
{
	private $id_vendas;
	private $id_comprador;
	private $ids_anuncios;
	private $quantidades;
	private $preco_total;
	private $data;
	private $transportadora;
	private $valor_frete;
	private $status;

	// Métodos para atributo id_vendas
	function set_id_vendas($id_vendas){
		$this->id_vendas = $id_vendas;
	}

	function get_id_vendas(){
		return $this->id_vendas;
	}

	// Métodos para atributo id_comprador
	function set_id_comprador($id_comprador){
		$this->id_comprador = $id_comprador;
	}

	function get_id_comprador(){
		return $this->id_comprador;
	}

	// Métodos para atributo ids_anuncios
	function set_ids_anuncios($ids_anuncios){
		$this->ids_anuncios = $ids_anuncios;
	}

	function get_ids_anuncios(){
		return $this->ids_anuncios;
	}

	// Métodos para atributo quantidades
	function set_quantidades($quantidades){
		$this->quantidades = $quantidades;
	}

	function get_quantidades(){
		return $this->quantidades;
	}

	// Métodos para atributo preco_total
	function set_preco_total($preco_total){
		$this->preco_total = $preco_total;
	}

	function get_preco_total(){
		return $this->preco_total;
	}

	// Métodos para atributo data
	function set_data($data){
		$this->data = $data;
	}

	function get_data(){
		return $this->data;
	}

	// Métodos para atributo transportadora
	function set_transportadora($transportadora){
		$this->transportadora = $transportadora;
	}

	function get_transportadora(){
		return $this->transportadora;
	}

	// Métodos para atributo valor_frete
	function set_valor_frete($valor_frete){
		$this->valor_frete = $valor_frete;
	}

	function get_valor_frete(){
		return $this->valor_frete;
	}

	// Métodos para atributo status
	function set_status($status){
		$this->status = $status;
	}

	function get_status(){
		return $this->status;
	}
}

?>