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
		$result = $this->con->query("UPDATE anuncios SET id_vendedor = '" . $anuncio->get_id_vendedor() . "', titulo_anuncio = '" . $anuncio->get_titulo_anuncio() . "', categoria_produto = '" . $anuncio->get_categoria_produto() . "', preco = '" . $anuncio->get_preco() . "', estoque = '" . $anuncio->get_estoque() . "', img_princ = '" . $anuncio->get_img_princ() . "', imgs_sec = '" . $anuncio->get_imgs_sec() . "', descricao = '" . $anuncio->get_descricao() . "', informacoes_adicionais = '" . $anuncio->get_informacoes_adicionais() . "', ativo = '" . $anuncio->get_ativo() . "', vendas_registradas = '" . $anuncio->get_vendas_registradas() . "' WHERE (id_anuncio = " . $anuncio->get_id_anuncio(). ")");

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
			array_push($lista, $a);
		}

		return $lista;
	}


	function obter_por_vendedor($id_vendedor){
		$lista = [];
		$result =$this->con->query("SELECT * FROM anuncios WHERE (id_vendedor = '" . $id_vendedor . "') ORDER BY id_anuncio DESC;");
 
		while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
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
			array_push($lista, $a);
		}

		return $lista;
	}

	function obter_ultimo_por_vendedor($id_vendedor){
		$lista = [];
		$result =$this->con->query("SELECT * FROM anuncios WHERE (id_vendedor = '" . $id_vendedor . "') ORDER BY id_anuncio DESC LIMIT 1;");
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
			array_push($lista, $a);
		}

		return $lista;
	}

	function obter_processador_configuracao($busca=''){
		$lista = [];
		$query_peca= "SELECT anuncios.*, produtos.* FROM anuncios INNER JOIN produtos ON produtos.id_produto=anuncios.id_produto WHERE (anuncios.categoria_produto='processador')";

		if($busca!=''){
			$busca=strtolower($busca);

			$result =$this->con->query($query_peca . " AND (LOWER(titulo_anuncio) LIKE'%" . $busca . "%'));");
			if ($result->rowCount() == 0){
				$palavras_busca=explode(' ', $busca);
				$query_busca=" AND (";
				foreach($palavras_busca as $palavra){
					$query_busca.="LOWER(titulo_anuncio) LIKE'%" . $palavra . "%' OR ";
				}
				$query_busca= rtrim($query_busca, ' OR ');
				$query_busca.=")";
				$result =$this->con->query($query_peca.$query_busca);
				if ($result->rowCount() == 0)
					return $lista;
			}
		}else{
			$result = $this->con->query($query_peca);
		}
		
		while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
			$a = new Anuncio();
			$p = new Produto();

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

			$p->set_id_produto($row['id_produto']);
			$p->set_id_anuncio($row['id_anuncio']);
			$p->set_id_vendedor($row['id_vendedor']);
			$p->set_altura($row['altura']);
			$p->set_barramento_encaixe_armazenamento($row['barramento_encaixe_armazenamento']);
			$p->set_barramento_encaixe_video($row['barramento_encaixe_video']);
			$p->set_barramentos_ram($row['barramentos_ram']);
			$p->set_barramentos_video($row['barramentos_video']);
			$p->set_comprimento($row['comprimento']);
			$p->set_condicao($row['condicao']);
			$p->set_consumo_energia($row['consumo_energia']);
			$p->set_ean($row['ean']);
			$p->set_fabricante($row['fabricante']);
			$p->set_fab_comp($row['fab_comp']);
			$p->set_fator_forma($row['fator_forma']);
			$p->set_formato_gabinete($row['formato_gabinete']);
			$p->set_frequencia($row['frequencia']);
			$p->set_largura($row['largura']);
			$p->set_linha($row['linha']);
			$p->set_litografia($row['litografia']);
			$p->set_modelo($row['modelo']);
			$p->set_max_ram($row['max_ram']);
			$p->set_nucleos($row['nucleos']);
			$p->set_potencia($row['potencia']);
			$p->set_quantidade_armazenamento($row['quantidade_armazenamento']);
			$p->set_quantidade_pentes($row['quantidade_pentes']);
			$p->set_ram_pente_individual($row['ram_pente_individual']);
			$p->set_ram_placa_video($row['ram_placa_video']);
			$p->set_ram_total($row['ram_total']);
			$p->set_resfriamento($row['resfriamento']);
			$p->set_soquete($row['soquete']);
			$p->set_selo_80_plus($row['selo_80_plus']);
			$p->set_suporta_sata($row['suporta_sata']);
			$p->set_suporta_nvme($row['suporta_nvme']);
			$p->set_tempo_uso($row['tempo_uso']);
			$p->set_threads($row['threads']);
			$p->set_tipo_armazenamento($row['tipo_armazenamento']);
			$p->set_tipo_ram($row['tipo_ram']);
			$p->set_video_integrado($row['video_integrado']);

			$vetor=[$a, $p];
			array_push($lista, $vetor);
		}

		return $lista;
	}

	function obter_placa_mae_configuracao($processador, $busca=''){
		$lista = [];
		$query_peca= "SELECT anuncios.*, produtos.* FROM anuncios INNER JOIN produtos ON produtos.id_produto=anuncios.id_produto WHERE (anuncios.categoria_produto='placa_mae' AND LOWER(produtos.fab_comp)=LOWER('".$processador->get_fabricante()."') AND LOWER(produtos.soquete)=LOWER('".$processador->get_soquete()."'))";

		if($busca!=''){
			$busca=strtolower($busca);

			$result =$this->con->query($query_peca . " AND (LOWER(titulo_anuncio) LIKE'%" . $busca . "%'));");
			if ($result->rowCount() == 0){
				$palavras_busca=explode(' ', $busca);
				$query_busca=" AND (";
				foreach($palavras_busca as $palavra){
					$query_busca.="LOWER(titulo_anuncio) LIKE'%" . $palavra . "%' OR ";
				}
				$query_busca= rtrim($query_busca, ' OR ');
				$query_busca.=")";
				$result =$this->con->query($query_peca.$query_busca);
				if ($result->rowCount() == 0)
					return $lista;
			}
		}else{
			$result = $this->con->query($query_peca);
		}
		
		while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
			$a = new Anuncio();
			$p = new Produto();

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

			$p->set_id_produto($row['id_produto']);
			$p->set_id_anuncio($row['id_anuncio']);
			$p->set_id_vendedor($row['id_vendedor']);
			$p->set_altura($row['altura']);
			$p->set_barramento_encaixe_armazenamento($row['barramento_encaixe_armazenamento']);
			$p->set_barramento_encaixe_video($row['barramento_encaixe_video']);
			$p->set_barramentos_ram($row['barramentos_ram']);
			$p->set_barramentos_video($row['barramentos_video']);
			$p->set_comprimento($row['comprimento']);
			$p->set_condicao($row['condicao']);
			$p->set_consumo_energia($row['consumo_energia']);
			$p->set_ean($row['ean']);
			$p->set_fabricante($row['fabricante']);
			$p->set_fab_comp($row['fab_comp']);
			$p->set_fator_forma($row['fator_forma']);
			$p->set_formato_gabinete($row['formato_gabinete']);
			$p->set_frequencia($row['frequencia']);
			$p->set_largura($row['largura']);
			$p->set_linha($row['linha']);
			$p->set_litografia($row['litografia']);
			$p->set_modelo($row['modelo']);
			$p->set_max_ram($row['max_ram']);
			$p->set_nucleos($row['nucleos']);
			$p->set_potencia($row['potencia']);
			$p->set_quantidade_armazenamento($row['quantidade_armazenamento']);
			$p->set_quantidade_pentes($row['quantidade_pentes']);
			$p->set_ram_pente_individual($row['ram_pente_individual']);
			$p->set_ram_placa_video($row['ram_placa_video']);
			$p->set_ram_total($row['ram_total']);
			$p->set_resfriamento($row['resfriamento']);
			$p->set_soquete($row['soquete']);
			$p->set_selo_80_plus($row['selo_80_plus']);
			$p->set_suporta_sata($row['suporta_sata']);
			$p->set_suporta_nvme($row['suporta_nvme']);
			$p->set_tempo_uso($row['tempo_uso']);
			$p->set_threads($row['threads']);
			$p->set_tipo_armazenamento($row['tipo_armazenamento']);
			$p->set_tipo_ram($row['tipo_ram']);
			$p->set_video_integrado($row['video_integrado']);

			$vetor=[$a, $p];
			array_push($lista, $vetor);
		}

		return $lista;
	}

	function obter_ram_configuracao($placa_mae, $busca=''){
		$lista = [];
		$query_peca= "SELECT anuncios.*, produtos.* FROM anuncios INNER JOIN produtos ON produtos.id_produto=anuncios.id_produto WHERE (anuncios.categoria_produto='ram' AND produtos.quantidade_pentes<=".$placa_mae->get_barramentos_ram()." AND produtos.ram_total<=".$placa_mae->get_max_ram()." AND produtos.tipo_ram='".$placa_mae->get_tipo_ram()."')";

		if($busca!=''){
			$busca=strtolower($busca);

			$result =$this->con->query($query_peca . " AND (LOWER(titulo_anuncio) LIKE'%" . $busca . "%'));");
			if ($result->rowCount() == 0){
				$palavras_busca=explode(' ', $busca);
				$query_busca=" AND (";
				foreach($palavras_busca as $palavra){
					$query_busca.="LOWER(titulo_anuncio) LIKE'%" . $palavra . "%' OR ";
				}
				$query_busca= rtrim($query_busca, ' OR ');
				$query_busca.=")";
				$result =$this->con->query($query_peca.$query_busca);
				if ($result->rowCount() == 0)
					return $lista;
			}
		}else{
			$result = $this->con->query($query_peca);
		}
		
		while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
			$a = new Anuncio();
			$p = new Produto();

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

			$p->set_id_produto($row['id_produto']);
			$p->set_id_anuncio($row['id_anuncio']);
			$p->set_id_vendedor($row['id_vendedor']);
			$p->set_altura($row['altura']);
			$p->set_barramento_encaixe_armazenamento($row['barramento_encaixe_armazenamento']);
			$p->set_barramento_encaixe_video($row['barramento_encaixe_video']);
			$p->set_barramentos_ram($row['barramentos_ram']);
			$p->set_barramentos_video($row['barramentos_video']);
			$p->set_comprimento($row['comprimento']);
			$p->set_condicao($row['condicao']);
			$p->set_consumo_energia($row['consumo_energia']);
			$p->set_ean($row['ean']);
			$p->set_fabricante($row['fabricante']);
			$p->set_fab_comp($row['fab_comp']);
			$p->set_fator_forma($row['fator_forma']);
			$p->set_formato_gabinete($row['formato_gabinete']);
			$p->set_frequencia($row['frequencia']);
			$p->set_largura($row['largura']);
			$p->set_linha($row['linha']);
			$p->set_litografia($row['litografia']);
			$p->set_modelo($row['modelo']);
			$p->set_max_ram($row['max_ram']);
			$p->set_nucleos($row['nucleos']);
			$p->set_potencia($row['potencia']);
			$p->set_quantidade_armazenamento($row['quantidade_armazenamento']);
			$p->set_quantidade_pentes($row['quantidade_pentes']);
			$p->set_ram_pente_individual($row['ram_pente_individual']);
			$p->set_ram_placa_video($row['ram_placa_video']);
			$p->set_ram_total($row['ram_total']);
			$p->set_resfriamento($row['resfriamento']);
			$p->set_soquete($row['soquete']);
			$p->set_selo_80_plus($row['selo_80_plus']);
			$p->set_suporta_sata($row['suporta_sata']);
			$p->set_suporta_nvme($row['suporta_nvme']);
			$p->set_tempo_uso($row['tempo_uso']);
			$p->set_threads($row['threads']);
			$p->set_tipo_armazenamento($row['tipo_armazenamento']);
			$p->set_tipo_ram($row['tipo_ram']);
			$p->set_video_integrado($row['video_integrado']);

			$vetor=[$a, $p];
			array_push($lista, $vetor);
		}

		return $lista;
	}

	function obter_placa_video_configuracao($placa_mae, $busca=''){
		$lista = [];

		$vetor_barramentos=explode(',', $placa_mae->get_barramentos_video());
		$verificacao_barramentos="";
		foreach($vetor_barramentos as $barramento){
			$verificacao_barramentos.= "LOWER(produtos.barramento_encaixe_video) LIKE LOWER('%".$barramento."%') OR ";
		}
		$verificacao_barramentos=rtrim($verificacao_barramentos, " OR ");


		$query_peca= "SELECT anuncios.*, produtos.* FROM anuncios INNER JOIN produtos ON produtos.id_produto=anuncios.id_produto WHERE (anuncios.categoria_produto='placa_video' AND produtos.barramento_encaixe_video IS NOT NULL AND (".$verificacao_barramentos."))";

		if($busca!=''){
			$busca=strtolower($busca);

			$result =$this->con->query($query_peca . " AND (LOWER(titulo_anuncio) LIKE'%" . $busca . "%'));");
			if ($result->rowCount() == 0){
				$palavras_busca=explode(' ', $busca);
				$query_busca=" AND (";
				foreach($palavras_busca as $palavra){
					$query_busca.="LOWER(titulo_anuncio) LIKE'%" . $palavra . "%' OR ";
				}
				$query_busca= rtrim($query_busca, ' OR ');
				$query_busca.=")";
				$result =$this->con->query($query_peca.$query_busca);
				if ($result->rowCount() == 0)
					return $lista;
			}
		}else{
			$result = $this->con->query($query_peca);
		}
		
		while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
			$a = new Anuncio();
			$p = new Produto();

			$a->set_id_anuncio($row['id_anuncio']);
			$a->set_id_produto($row['id_produto']);
			$a->set_id_vendedor($row['id_vendedor']);
			$a->set_titulo_anuncio($row['titulo_anuncio']);
			$a->set_categoria_produto($row['categoria_produto']);
			$a->set_preco($row['preco']);
			$a->set_estoque($row['estoque']);
			$a->set_img_princ($row['img_princ']);
			$a->set_imgs_sec(explode(",", $row['imgs_sec']));
			$a->set_descricao($row['descricao']);
			$a->set_informacoes_adicionais($row['informacoes_adicionais']);
			$a->set_ativo($row['ativo']);
			$a->set_vendas_registradas($row['vendas_registradas']);

			$p->set_id_produto($row['id_produto']);
			$p->set_id_anuncio($row['id_anuncio']);
			$p->set_id_vendedor($row['id_vendedor']);
			$p->set_altura($row['altura']);
			$p->set_barramento_encaixe_armazenamento($row['barramento_encaixe_armazenamento']);
			$p->set_barramento_encaixe_video($row['barramento_encaixe_video']);
			$p->set_barramentos_ram($row['barramentos_ram']);
			$p->set_barramentos_video($row['barramentos_video']);
			$p->set_comprimento($row['comprimento']);
			$p->set_condicao($row['condicao']);
			$p->set_consumo_energia($row['consumo_energia']);
			$p->set_ean($row['ean']);
			$p->set_fabricante($row['fabricante']);
			$p->set_fab_comp($row['fab_comp']);
			$p->set_fator_forma($row['fator_forma']);
			$p->set_formato_gabinete($row['formato_gabinete']);
			$p->set_frequencia($row['frequencia']);
			$p->set_largura($row['largura']);
			$p->set_linha($row['linha']);
			$p->set_litografia($row['litografia']);
			$p->set_modelo($row['modelo']);
			$p->set_max_ram($row['max_ram']);
			$p->set_nucleos($row['nucleos']);
			$p->set_potencia($row['potencia']);
			$p->set_quantidade_armazenamento($row['quantidade_armazenamento']);
			$p->set_quantidade_pentes($row['quantidade_pentes']);
			$p->set_ram_pente_individual($row['ram_pente_individual']);
			$p->set_ram_placa_video($row['ram_placa_video']);
			$p->set_ram_total($row['ram_total']);
			$p->set_resfriamento($row['resfriamento']);
			$p->set_soquete($row['soquete']);
			$p->set_selo_80_plus($row['selo_80_plus']);
			$p->set_suporta_sata($row['suporta_sata']);
			$p->set_suporta_nvme($row['suporta_nvme']);
			$p->set_tempo_uso($row['tempo_uso']);
			$p->set_threads($row['threads']);
			$p->set_tipo_armazenamento($row['tipo_armazenamento']);
			$p->set_tipo_ram($row['tipo_ram']);
			$p->set_video_integrado($row['video_integrado']);

			$vetor=[$a, $p];
			array_push($lista, $vetor);
		}

		return $lista;
	}

	function obter_armazenamento_configuracao($placa_mae, $busca=''){
		$lista = [];

		$barramentos_armazenamento="";
		if ($placa_mae->get_suporta_sata()==1)
			$barramentos_armazenamento.="produtos.barramento_encaixe_armazenamento='sata' OR ";
		
		if ($placa_mae->get_suporta_nvme()==1)
			$barramentos_armazenamento.="produtos.barramento_encaixe_armazenamento='nvme' OR ";
		
		$barramentos_armazenamento=rtrim($barramentos_armazenamento, " OR ");

		$query_peca= "SELECT anuncios.*, produtos.* FROM anuncios INNER JOIN produtos ON produtos.id_produto=anuncios.id_produto WHERE (anuncios.categoria_produto='armazenamento' AND (".$barramentos_armazenamento."))";

		if($busca!=''){
			$busca=strtolower($busca);

			$result =$this->con->query($query_peca . " AND (LOWER(titulo_anuncio) LIKE'%" . $busca . "%'));");
			if ($result->rowCount() == 0){
				$palavras_busca=explode(' ', $busca);
				$query_busca=" AND (";
				foreach($palavras_busca as $palavra){
					$query_busca.="LOWER(titulo_anuncio) LIKE'%" . $palavra . "%' OR ";
				}
				$query_busca= rtrim($query_busca, ' OR ');
				$query_busca.=")";
				$result =$this->con->query($query_peca.$query_busca);
				if ($result->rowCount() == 0)
					return $lista;
			}
		}else{
			$result = $this->con->query($query_peca);
		}
		
		while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
			$a = new Anuncio();
			$p = new Produto();

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

			$p->set_id_produto($row['id_produto']);
			$p->set_id_anuncio($row['id_anuncio']);
			$p->set_id_vendedor($row['id_vendedor']);
			$p->set_altura($row['altura']);
			$p->set_barramento_encaixe_armazenamento($row['barramento_encaixe_armazenamento']);
			$p->set_barramento_encaixe_video($row['barramento_encaixe_video']);
			$p->set_barramentos_ram($row['barramentos_ram']);
			$p->set_barramentos_video($row['barramentos_video']);
			$p->set_comprimento($row['comprimento']);
			$p->set_condicao($row['condicao']);
			$p->set_consumo_energia($row['consumo_energia']);
			$p->set_ean($row['ean']);
			$p->set_fabricante($row['fabricante']);
			$p->set_fab_comp($row['fab_comp']);
			$p->set_fator_forma($row['fator_forma']);
			$p->set_formato_gabinete($row['formato_gabinete']);
			$p->set_frequencia($row['frequencia']);
			$p->set_largura($row['largura']);
			$p->set_linha($row['linha']);
			$p->set_litografia($row['litografia']);
			$p->set_modelo($row['modelo']);
			$p->set_max_ram($row['max_ram']);
			$p->set_nucleos($row['nucleos']);
			$p->set_potencia($row['potencia']);
			$p->set_quantidade_armazenamento($row['quantidade_armazenamento']);
			$p->set_quantidade_pentes($row['quantidade_pentes']);
			$p->set_ram_pente_individual($row['ram_pente_individual']);
			$p->set_ram_placa_video($row['ram_placa_video']);
			$p->set_ram_total($row['ram_total']);
			$p->set_resfriamento($row['resfriamento']);
			$p->set_soquete($row['soquete']);
			$p->set_selo_80_plus($row['selo_80_plus']);
			$p->set_suporta_sata($row['suporta_sata']);
			$p->set_suporta_nvme($row['suporta_nvme']);
			$p->set_tempo_uso($row['tempo_uso']);
			$p->set_threads($row['threads']);
			$p->set_tipo_armazenamento($row['tipo_armazenamento']);
			$p->set_tipo_ram($row['tipo_ram']);
			$p->set_video_integrado($row['video_integrado']);

			$vetor=[$a, $p];
			array_push($lista, $vetor);
		}

		return $lista;
	}

	function obter_fonte_configuracao($placa_mae, $busca=''){
		$lista = [];

		$query_peca= "SELECT anuncios.*, produtos.* FROM anuncios INNER JOIN produtos ON produtos.id_produto=anuncios.id_produto WHERE (anuncios.categoria_produto='fonte' AND produtos.fator_forma='".$placa_mae->get_fator_forma()."')";

		if($busca!=''){
			$busca=strtolower($busca);

			$result =$this->con->query($query_peca . " AND (LOWER(titulo_anuncio) LIKE'%" . $busca . "%'));");
			if ($result->rowCount() == 0){
				$palavras_busca=explode(' ', $busca);
				$query_busca=" AND (";
				foreach($palavras_busca as $palavra){
					$query_busca.="LOWER(titulo_anuncio) LIKE'%" . $palavra . "%' OR ";
				}
				$query_busca= rtrim($query_busca, ' OR ');
				$query_busca.=")";
				$result =$this->con->query($query_peca.$query_busca);
				if ($result->rowCount() == 0)
					return $lista;
			}
		}else{
			$result = $this->con->query($query_peca);
		}
		
		while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
			$a = new Anuncio();
			$p = new Produto();

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

			$p->set_id_produto($row['id_produto']);
			$p->set_id_anuncio($row['id_anuncio']);
			$p->set_id_vendedor($row['id_vendedor']);
			$p->set_altura($row['altura']);
			$p->set_barramento_encaixe_armazenamento($row['barramento_encaixe_armazenamento']);
			$p->set_barramento_encaixe_video($row['barramento_encaixe_video']);
			$p->set_barramentos_ram($row['barramentos_ram']);
			$p->set_barramentos_video($row['barramentos_video']);
			$p->set_comprimento($row['comprimento']);
			$p->set_condicao($row['condicao']);
			$p->set_consumo_energia($row['consumo_energia']);
			$p->set_ean($row['ean']);
			$p->set_fabricante($row['fabricante']);
			$p->set_fab_comp($row['fab_comp']);
			$p->set_fator_forma($row['fator_forma']);
			$p->set_formato_gabinete($row['formato_gabinete']);
			$p->set_frequencia($row['frequencia']);
			$p->set_largura($row['largura']);
			$p->set_linha($row['linha']);
			$p->set_litografia($row['litografia']);
			$p->set_modelo($row['modelo']);
			$p->set_max_ram($row['max_ram']);
			$p->set_nucleos($row['nucleos']);
			$p->set_potencia($row['potencia']);
			$p->set_quantidade_armazenamento($row['quantidade_armazenamento']);
			$p->set_quantidade_pentes($row['quantidade_pentes']);
			$p->set_ram_pente_individual($row['ram_pente_individual']);
			$p->set_ram_placa_video($row['ram_placa_video']);
			$p->set_ram_total($row['ram_total']);
			$p->set_resfriamento($row['resfriamento']);
			$p->set_soquete($row['soquete']);
			$p->set_selo_80_plus($row['selo_80_plus']);
			$p->set_suporta_sata($row['suporta_sata']);
			$p->set_suporta_nvme($row['suporta_nvme']);
			$p->set_tempo_uso($row['tempo_uso']);
			$p->set_threads($row['threads']);
			$p->set_tipo_armazenamento($row['tipo_armazenamento']);
			$p->set_tipo_ram($row['tipo_ram']);
			$p->set_video_integrado($row['video_integrado']);

			$vetor=[$a, $p];
			array_push($lista, $vetor);
		}

		return $lista;
	}

	function obter_gabinete_configuracao($placa_mae, $busca=''){
		$lista = [];

		if($placa_mae->get_fator_forma()=="eatx"){
			$fator_forma="AND  produtos.fator_forma='eatx'";
		}else if($placa_mae->get_fator_forma()=="atx"){
			$fator_forma="AND ( produtos.fator_forma='eatx' OR  produtos.fator_forma='atx')";
		}else if($placa_mae->get_fator_forma()=="mini"){
			$fator_forma="AND ( produtos.fator_forma='eatx' OR  produtos.fator_forma='atx' OR  produtos.fator_forma='mini')";
		}else if($placa_mae->get_fator_forma()=="atx"){
			$fator_forma="AND ( produtos.fator_forma='eatx' OR  produtos.fator_forma='atx' OR  produtos.fator_forma='mini' OR  produtos.fator_forma='micro')";
		}

		$query_peca= "SELECT anuncios.*, produtos.* FROM anuncios INNER JOIN produtos ON produtos.id_produto=anuncios.id_produto WHERE (anuncios.categoria_produto='gabinete' ".$fator_forma.")";

		if($busca!=''){
			$busca=strtolower($busca);

			$result =$this->con->query($query_peca . " AND (LOWER(titulo_anuncio) LIKE'%" . $busca . "%'));");
			if ($result->rowCount() == 0){
				$palavras_busca=explode(' ', $busca);
				$query_busca=" AND (";
				foreach($palavras_busca as $palavra){
					$query_busca.="LOWER(titulo_anuncio) LIKE'%" . $palavra . "%' OR ";
				}
				$query_busca= rtrim($query_busca, ' OR ');
				$query_busca.=")";
				$result =$this->con->query($query_peca.$query_busca);
				if ($result->rowCount() == 0)
					return $lista;
			}
		}else{
			$result = $this->con->query($query_peca);
		}
		
		while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
			$a = new Anuncio();
			$p = new Produto();

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

			$p->set_id_produto($row['id_produto']);
			$p->set_id_anuncio($row['id_anuncio']);
			$p->set_id_vendedor($row['id_vendedor']);
			$p->set_altura($row['altura']);
			$p->set_barramento_encaixe_armazenamento($row['barramento_encaixe_armazenamento']);
			$p->set_barramento_encaixe_video($row['barramento_encaixe_video']);
			$p->set_barramentos_ram($row['barramentos_ram']);
			$p->set_barramentos_video($row['barramentos_video']);
			$p->set_comprimento($row['comprimento']);
			$p->set_condicao($row['condicao']);
			$p->set_consumo_energia($row['consumo_energia']);
			$p->set_ean($row['ean']);
			$p->set_fabricante($row['fabricante']);
			$p->set_fab_comp($row['fab_comp']);
			$p->set_fator_forma($row['fator_forma']);
			$p->set_formato_gabinete($row['formato_gabinete']);
			$p->set_frequencia($row['frequencia']);
			$p->set_largura($row['largura']);
			$p->set_linha($row['linha']);
			$p->set_litografia($row['litografia']);
			$p->set_modelo($row['modelo']);
			$p->set_max_ram($row['max_ram']);
			$p->set_nucleos($row['nucleos']);
			$p->set_potencia($row['potencia']);
			$p->set_quantidade_armazenamento($row['quantidade_armazenamento']);
			$p->set_quantidade_pentes($row['quantidade_pentes']);
			$p->set_ram_pente_individual($row['ram_pente_individual']);
			$p->set_ram_placa_video($row['ram_placa_video']);
			$p->set_ram_total($row['ram_total']);
			$p->set_resfriamento($row['resfriamento']);
			$p->set_soquete($row['soquete']);
			$p->set_selo_80_plus($row['selo_80_plus']);
			$p->set_suporta_sata($row['suporta_sata']);
			$p->set_suporta_nvme($row['suporta_nvme']);
			$p->set_tempo_uso($row['tempo_uso']);
			$p->set_threads($row['threads']);
			$p->set_tipo_armazenamento($row['tipo_armazenamento']);
			$p->set_tipo_ram($row['tipo_ram']);
			$p->set_video_integrado($row['video_integrado']);

			$vetor=[$a, $p];
			array_push($lista, $vetor);
		}

		return $lista;
	}

	function obter_cooler_configuracao($busca=''){
		$lista = [];

		$query_peca= "SELECT anuncios.*, produtos.* FROM anuncios INNER JOIN produtos ON produtos.id_produto=anuncios.id_produto WHERE (anuncios.categoria_produto='cooler')";

		if($busca!=''){
			$busca=strtolower($busca);

			$result =$this->con->query($query_peca . " AND (LOWER(titulo_anuncio) LIKE'%" . $busca . "%'));");
			if ($result->rowCount() == 0){
				$palavras_busca=explode(' ', $busca);
				$query_busca=" AND (";
				foreach($palavras_busca as $palavra){
					$query_busca.="LOWER(titulo_anuncio) LIKE'%" . $palavra . "%' OR ";
				}
				$query_busca= rtrim($query_busca, ' OR ');
				$query_busca.=")";
				$result =$this->con->query($query_peca.$query_busca);
				if ($result->rowCount() == 0)
					return $lista;
			}
		}else{
			$result = $this->con->query($query_peca);
		}
		
		while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
			$a = new Anuncio();
			$p = new Produto();

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

			$p->set_id_produto($row['id_produto']);
			$p->set_id_anuncio($row['id_anuncio']);
			$p->set_id_vendedor($row['id_vendedor']);
			$p->set_altura($row['altura']);
			$p->set_barramento_encaixe_armazenamento($row['barramento_encaixe_armazenamento']);
			$p->set_barramento_encaixe_video($row['barramento_encaixe_video']);
			$p->set_barramentos_ram($row['barramentos_ram']);
			$p->set_barramentos_video($row['barramentos_video']);
			$p->set_comprimento($row['comprimento']);
			$p->set_condicao($row['condicao']);
			$p->set_consumo_energia($row['consumo_energia']);
			$p->set_ean($row['ean']);
			$p->set_fabricante($row['fabricante']);
			$p->set_fab_comp($row['fab_comp']);
			$p->set_fator_forma($row['fator_forma']);
			$p->set_formato_gabinete($row['formato_gabinete']);
			$p->set_frequencia($row['frequencia']);
			$p->set_largura($row['largura']);
			$p->set_linha($row['linha']);
			$p->set_litografia($row['litografia']);
			$p->set_modelo($row['modelo']);
			$p->set_max_ram($row['max_ram']);
			$p->set_nucleos($row['nucleos']);
			$p->set_potencia($row['potencia']);
			$p->set_quantidade_armazenamento($row['quantidade_armazenamento']);
			$p->set_quantidade_pentes($row['quantidade_pentes']);
			$p->set_ram_pente_individual($row['ram_pente_individual']);
			$p->set_ram_placa_video($row['ram_placa_video']);
			$p->set_ram_total($row['ram_total']);
			$p->set_resfriamento($row['resfriamento']);
			$p->set_soquete($row['soquete']);
			$p->set_selo_80_plus($row['selo_80_plus']);
			$p->set_suporta_sata($row['suporta_sata']);
			$p->set_suporta_nvme($row['suporta_nvme']);
			$p->set_tempo_uso($row['tempo_uso']);
			$p->set_threads($row['threads']);
			$p->set_tipo_armazenamento($row['tipo_armazenamento']);
			$p->set_tipo_ram($row['tipo_ram']);
			$p->set_video_integrado($row['video_integrado']);

			$vetor=[$a, $p];
			array_push($lista, $vetor);
		}

		return $lista;
	}
}
