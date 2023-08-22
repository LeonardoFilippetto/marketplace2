<?php
require_once('..\bd\gerenciador_de_conexoes.php');
require_once('VendaDTO.php');

class VendaDAO {
	private $con;

	function __construct()
	{
		$this->con = GerenciadorDeConexoes::obter_conexao();
	}

	function inserir($venda){
		$result = $this->con->query("INSERT INTO vendas (id_comprador, id_anuncios, quantidades, preco_total, data, transportadora, valor_frete, status) VALUES ('" . $venda->get_id_comprador() . "', '" . $venda->get_id_anuncios() . "', '" . $venda->get_quantidades() . "','" . $venda->get_preco_total() . "','" . $venda->get_data() . "','" . $venda->get_transportadora() . "','" . $venda->get_valor_frete() . "','" . $venda->get_status() . "')");
   		
   		if ($result->rowCount() > 0){
   			return true;1
   		}
   		else{
   			return false;
   		}
	}

	function alterar($venda){
		$result = $this->con->query("UPDATE vendas SET id_comprador = '" . $venda->get_id_comprador() . "', id_anuncios = '" . $venda->get_id_anuncios() ."' , quantidades = '" . $venda->get_quantidades() . "', preco_total = '" . $venda->get_preco_total() ."' , data = '" . $venda->get_data() ."' , transportadora = '" . $venda->get_transportadora() ."' , valor_frete = '" . $venda->get_valor_frete() ."' , status = '" . $venda->get_status() ."' WHERE (id_vendas = " . $venda->get_id(). ")");

		if ($result->rowCount() > 0){
   			return true;
   		}
   		else{
   			return false;
   		}
	}

	function excluir($id){  
		$result = $this->con->query("DELETE FROM vendas WHERE (id_vendas = '" . $id . "')");

		if ($result->rowCount() > 0){
   			return true;
   		}
   		else{
   			return false;
   		}
	}

	function obter($id){
		$result =$this->con->query("SELECT * FROM vendas WHERE (id_vendas = " . $id . ");");
		$row = $result->fetch(PDO::FETCH_ASSOC);

		$v = new Venda();
		$v->set_id_vendas($row['id_vendas']);
		$v->set_id_comprador($row['id_comprador']);
		$v->set_id_anuncios($row['id_anuncios']);
        $v->set_quantidades($row['quantidades']);
        $v->set_preco_total($row['preco_total']);
        $v->set_data($row['data']);
        $v->set_transportadora($row['transportadora']);
        $v->set_valor_frete($row['valor_frete']);
        $v->set_status($row['status']);
        return $v;
	}

	function obter_todos(){
		$lista = [];
		$result =$this->con->query("SELECT * FROM vendas;");
 
		while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
			$v = new Venda();
			$v->set_id_vendas($row['id_vendas']);
			$v->set_id_comprador($row['id_comprador']);
			$v->set_id_anuncios($row['id_anuncios']);
        	$v->set_quantidades($row['quantidades']);
        	$v->set_preco_total($row['preco_total']);
        	$v->set_data($row['data']);
        	$v->set_transportadora($row['transportadora']);
        	$v->set_valor_frete($row['valor_frete']);
        	$v->set_status($row['status']);
			array_push($lista, $v);
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