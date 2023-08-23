<?php
require_once('..\bd\gerenciador_de_conexoes.php');
require_once('AnuncioDTO.php');

class AnuncioDAO{
	private $con;

	function __construct()
	{
		$this->con = GerenciadorDeConexoes::obter_conexao();
	}

	function inserir($anuncio){
		$result = $this->con->query("INSERT INTO anuncios (id_produto, id_vendedor, titulo_anuncio, categoria_produto, preco, estoque, img_princ, imgs_sec, descricao, informacoes_adicionais, ativo, vendas_registradas) VALUES ('" . $anuncio->get_id_produto() . "', '" . $anuncio->get_id_vendedor() . "', '" . $anuncio->get_titulo_anuncio() . "', '" . $anuncio->get_categoria_produto() . "', '" . $anuncio->get_preco() . "', '" . $anuncio->get_estoque() . "', '" . $anuncio->get_img_princ() . "', '" . $anuncio->get_imgs_sec() . "', '" . $anuncio->get_descricao() . "', '" . $anuncio->get_informacoes_adicionais() . "', '" . $anuncio->get_ativo() . "', '" . $anuncio->get_vendas_registradas() . "')");
   		
   		if ($result->rowCount() > 0){
   			return true;
   		}
   		else{
   			return false;
   		}
	}

	function alterar($anuncio){
		$result = $this->con->query("UPDATE anuncios SET id_produto = '" . $anuncio->get_id_produto() . "', id_vendedor = '" . $anuncio->get_id_vendedor() . "', titulo_anuncio = '" . $anuncio->get_titulo_anuncio() . "', categoria_produto = '" . $anuncio->get_categoria_anuncio() . "', preco = '" . $anuncio->get_preco() . "', estoque = '" . $anuncio->get_estoque() . "', img_princ = '" . $anuncio->get_img_princ() . "', imgs_sec = '" . $anuncio->get_imgs_sec() . "', descricao = '" . $anuncio->get_descicao() . "', informacoes_adicionais = '" . $anuncio->get_informacoes_adicionais() . "', ativo = '" . $anuncio->get_ativo() . "', vendas_registradas = '" . $anuncio->get_vendas_registradas() . "' WHERE (id_anuncio = " . $anuncio->get_id_anuncio(). ")");

		if ($result->rowCount() > 0){
   			return true;
   		}
   		else{
   			return false;
   		}
	}

	function excluir($id){  
		$result = $this->con->query("DELETE FROM anuncios WHERE (id_anuncio = '" . $id . "')");

		if ($result->rowCount() > 0){
   			return true;
   		}
   		else{
   			return false;
   		}
	}

	function obter($id){
		$result =$this->con->query("SELECT * FROM anuncios WHERE (id_anuncio = " . $id . ");");
		$row = $result->fetch(PDO::FETCH_ASSOC);

		$a = new Anuncio();
		$a ->set_id_anuncio($row['id_anuncio']);
		$a ->set_id_produto($row['id_produto']);
		$a ->set_id_vendedor($row['id_vendedor']);
		$a ->set_titulo_anuncio($row['titulo_anuncio']);
		$a ->set_categoria_produto($row['categoria_produto']);
		$a ->set_preco($row['preco']);
		$a ->set_estoque($row['estoque']);
		$a ->set_img_princ($row['img_princ']);
		$a ->set_imgs_sec(explode(",", $row['imgs_sec']));
		$a ->set_descricao($row['descricao']);
		$a ->set_informacoes_adicionais($row['informacoes_adicionais']);
		$a ->set_ativo($row['ativo']);
		$a ->set_vendas_registradas($row['vendas_registradas']);
		
		return $a;
	}

	function obter_todos(){
		$lista = [];
		$result =$this->con->query("SELECT * FROM anuncios;");
 
		while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
			$a = new anuncio();
		    $a ->set_id_anuncio($row['id_anuncio']);
			$a ->set_id_produto($row['id_produto']);
			$a ->set_id_vendedor($row['id_vendedor']);
			$a ->set_titulo_anuncio($row['titulo_anuncio']);
			$a ->set_categoria_produto($row['categoria_produto']);
			$a ->set_preco($row['preco']);
			$a ->set_estoque($row['estoque']);
			$a ->set_img_princ($row['img_princ']);
			$a ->set_imgs_sec($row['imgs_sec']);
			$a ->set_descricao($row['descricao']);
			$a ->set_informacoes_adicionais($row['informacoes_adicionais']);
			$a ->set_ativo($row['ativo']);
			$a ->set_vendas_registradas($row['vendas_registradas']);
			array_push($lista, $a);
		}

		return $lista;
	}






	function obter_por_titulo($busca){
		$lista = [];
		$busca=strtolower($busca);

		$result =$this->con->query("SELECT * FROM anuncios WHERE (LOWER(titulo_anuncio) LIKE'%" . $busca . "%');");
		if ($result->rowCount() == 0){
			$palavras_busca=explode(' ', $busca);
            $query="SELECT * FROM anuncios WHERE ";
            foreach($palavras_busca as $palavra){
                $query.="LOWER(titulo_anuncio) LIKE'%" . $palavra . "%' OR ";
            }
            $query= rtrim($query, ' OR ');
			$result =$this->con->query($query);
			if ($result->rowCount() == 0)
				return $lista;
		}
		while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
			$a = new anuncio();
			$a ->set_id_anuncio($row['id_anuncio']);
			$a ->set_id_produto($row['id_produto']);
			$a ->set_id_vendedor($row['id_vendedor']);
			$a ->set_titulo_anuncio($row['titulo_anuncio']);
			$a ->set_categoria_produto($row['categoria_produto']);
			$a ->set_preco($row['preco']);
			$a ->set_estoque($row['estoque']);
			$a ->set_img_princ($row['img_princ']);
			$a ->set_imgs_sec($row['imgs_sec']);
			$a ->set_descricao($row['descricao']);
			$a ->set_informacoes_adicionais($row['informacoes_adicionais']);
			$a ->set_ativo($row['ativo']);
			$a ->set_vendas_registradas($row['vendas_registradas']);
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