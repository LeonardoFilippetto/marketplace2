<?php 
require_once('..\bd\gerenciador_de_conexoes.php');
require_once('ProdutoDTO.php');

class ProdutoDAO{
    private $con;

    function __construct(){
        $this->con = GerenciadorDeConexoes::obter_conexao();
    }

    function inserir($produto){
        $result = $this->con->query("INSERT INTO produtos (id_anuncio, id_vendedor, altura, barramento_encaixe_armazenamento, barramento_encaixe_video, barramentos_ram, barramentos_video, comprimento, condicao, consumo_energia, ean, fabricante, fab_comp, fator_forma, formato_gabinete, frequencia, largura, linha, modelo, max_ram, nucleos, potencia, quantidade_armazenamento, quantidade_pentes, ram_pente_individual, ram_placa_video, ram_total, resfriamento, soquete, selo_80_plus, suporta_sata, suporta_nvme, tempo_uso, tipo_armazenamento, tipo_ram, video_integrado) VALUES ('" . $produto->get_id_anuncio() . "', '" . $produto->get_id_vendedor() . "', '" . $produto->get_altura() . "', '" . $produto->get_barramento_encaixe_armazenamento() . "', '" . $produto->get_barramento_encaixe_video() . "', '" . $produto->get_barramentos_ram() . "', '" . $produto->get_barramentos_video() . "', '" . $produto->get_comprimento() . "', '" . $produto->get_condicao() . "', '" . $produto->get_consumo_energia() . "', '" . $produto->get_ean() . "', '" . $produto->get_fabricante() . "', '" . $produto->get_fab_comp() . "', '" . $produto->get_fator_forma() . "', '" . $produto->get_formato_gabinete() . "', '" . $produto->get_frequencia() . "', '" . $produto->get_largura() . "', '" . $produto->get_linha() . "', '" . $produto->get_modelo() . "', '" . $produto->get_max_ram() . "', '" . $produto->get_nucleos() . "', '" . $produto->get_potencia() . "', '" . $produto->get_quantidade_armazenamento() . "', '" . $produto->get_quantidade_pentes() . "', '" . $produto->get_ram_pente_individual() . "', '" . $produto->get_ram_placa_video() . "', '" . $produto->get_ram_total() . "', '" . $produto->get_resfriamento() . "', '" . $produto->get_soquete() . "', '" . $produto->get_selo_80_plus() . "', '" . $produto->get_suporta_sata() . "', '" . $produto->get_suporta_nvme() . "', '" . $produto->get_tempo_uso() . "', '" . $produto->get_tipo_armazenamento() . "', '" . $produto->get_tipo_ram() . "', '" . $produto->get_video_integrado() . "')");

        if ($result->rowCount() > 0){
   			return true;
   		}
   		else{
   			return false;
   		}
    }

    function alterar($produto){
        $result = $this->con->query("UPDATE produtos SET id_anuncio = '" . $produto->get_id_anuncio() . "', id_vendedor = '" . $produto->get_id_vendedor() . "', altura = '" . $produto->get_altura() . "', barramento_encaixe_armazenamento = '" . $produto->get_barramento_encaixe_armazenamento() . "', barramento_encaixe_video = '" . $produto->get_barramento_encaixe_video() . "', barramentos_ram = '" . $produto->get_barramentos_ram() . "', barramentos_video = '" . $produto->get_barramentos_video() . "', comprimento = '" . $produto->get_comprimento() . "', condicao = '" . $produto->get_condicao() . "', consumo_energia = '" . $produto->get_consumo_energia() . "', ean = '" . $produto->get_ean() . "', fabricante = '" . $produto->get_fabricante() . "', fab_comp = '" . $produto->get_fab_comp() . "', fator_forma = '" . $produto->get_fator_forma() . "', formato_gabinete = '" . $produto->get_formato_gabinete() . "', frequencia = '" . $produto->get_frequencia() . "', largura = '" . $produto->get_largura() . "', linha = '" . $produto->get_linha() . "', modelo = '" . $produto->get_modelo() . "', max_ram = '" . $produto->get_max_ram() . "', nucleos = '" . $produto->get_nucleos() . "', potencia = '" . $produto->get_potencia() . "', quantidade_armazenamento = '" . $produto->get_quantidade_armazenamento() . "', quantidade_pentes = '" . $produto->get_quantidade_pentes() . "', ram_pente_individual = '" . $produto->get_ram_pente_individual() . "', ram_placa_video = '" . $produto->get_ram_placa_video() . "', ram_total = '" . $produto->get_ram_total() . "', resfriamento = '" . $produto->get_resfriamento() . "', soquete = '" . $produto->get_soquete() . "', selo_80_plus = '" . $produto->get_selo_80_plus() . "', suporta_sata = '" . $produto->get_suporta_sata() . "', suporta_nvme = '" . $produto->get_suporta_nvme() . "', tempo_uso = '" . $produto->get_tempo_uso() . "', tipo_armazenamento = '" . $produto->get_tipo_armazenamento() . "', tipo_ram = '" . $produto->get_tipo_ram() . "', video_integrado = '" . $produto->get_video_integrado() . "' WHERE (id_produto = " . $produto->get_id_produto() . ") ");

        if ($result->rowCount() > 0){
            return true;
        }
        else{
            return false;
        }
    }

    function excluir($id){
        $result = $this->con->query("DELETE FROM produtos WHERE (id_produto = '" . $id . "')");

        if ($result->rowCount() > 0){
            return true;
        }
        else{
            return false;
        }
    }

    function obter($id){
        $result = $this->con->query("SELECT * FROM produtos WHERE (id_produto = " . $id . ");");
        $row = $result->fetch(PDO::FETCH_ASSOC);

        $p = new Produto();
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

		return $p;
    }

    function obter_por_anuncio($id_anuncio){
        $result = $this->con->query("SELECT * FROM produtos WHERE (id_anuncio = " . $id_anuncio . ");");
        $row = $result->fetch(PDO::FETCH_ASSOC);

        $p = new Produto();
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

		return $p;
    }

    function obter_todos(){
        $lista = [];
        $result = $this->con->query("SELECT * FROM produtos;");
        
        while ($row = $result->fetch(PDO::FETCH_ASSOC)){
            $p = new Produto();
            $p->set_id_produto($row['id_produto']);
            $p->set_id_anuncio($row['id_anuncio']);
            $p->set_id_vendedor($row['id_vendedor']);
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
            array_push($lista, $p);
        }
        
        return $lista;  
    }

    
}
?>