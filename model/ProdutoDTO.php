<?php
class Produto
{
	private $id_produto;
	private $id_anuncio;
	private $id_vendedor;
	private $altura;
	private $barramento_encaixe_armazenamento;
	private $barramento_encaixe_video;
	private $barramentos_ram;
	private $barramentos_video;
	private $comprimento;
	private $condicao;
	private $consumo_energia;
	private $ean;
	private $fabricante;
	private $fab_comp;
	private $fator_forma;
	private $formato_gabinete;
	private $frequencia;
	private $largura;
	private $linha;
	private $litografia;
	private $modelo;
	private $max_ram;
	private $nucleos;
	private $potencia;
	private $quantidade_armazenamento;
	private $quantidade_pentes;
	private $ram_pente_individual;
	private $ram_placa_video;
	private $ram_total;
	private $resfriamento;
	private $soquete;
	private $selo_80_plus;
	private $suporta_sata;
	private $suporta_nvme;
	private $tempo_uso;
	private $threads;
	private $tipo_armazenamento;
	private $tipo_ram;
	private $video_integrado;

	function set_id_produto($id_produto){
		$this->id_produto = $id_produto;
	}

	function get_id_produto(){
		return $this->id_produto;
	}

	function set_id_anuncio($id_anuncio){
		$this->id_anuncio = $id_anuncio;
	}

	function get_id_anuncio(){
		return $this->id_anuncio;
	}

	function set_id_vendedor($id_vendedor){
		$this->id_vendedor = $id_vendedor;
	}

	function get_id_vendedor(){
		return $this->id_vendedor;
	}

	function set_altura($altura){
		$this->altura = $altura;
	}

	function get_altura(){
		return $this->altura;
	}

	// Métodos para atributo barramento_encaixe_armazenamento
	function set_barramento_encaixe_armazenamento($barramento_encaixe_armazenamento){
		$this->barramento_encaixe_armazenamento = $barramento_encaixe_armazenamento;
	}

	function get_barramento_encaixe_armazenamento(){
		return $this->barramento_encaixe_armazenamento;
	}

	// Métodos para atributo barramento_encaixe_video
	function set_barramento_encaixe_video($barramento_encaixe_video){
		$this->barramento_encaixe_video = $barramento_encaixe_video;
	}

	function get_barramento_encaixe_video(){
		return $this->barramento_encaixe_video;
	}

	// Métodos para atributo barramentos_ram
	function set_barramentos_ram($barramentos_ram){
		$this->barramentos_ram = $barramentos_ram;
	}

	function get_barramentos_ram(){
		return $this->barramentos_ram;
	}

	// Métodos para atributo barramentos_video
	function set_barramentos_video($barramentos_video){
		$this->barramentos_video = $barramentos_video;
	}

	function get_barramentos_video(){
		return $this->barramentos_video;
	}

	// Métodos para atributo comprimento
	function set_comprimento($comprimento){
		$this->comprimento = $comprimento;
	}

	function get_comprimento(){
		return $this->comprimento;
	}

	// Métodos para atributo condicao
	function set_condicao($condicao){
		$this->condicao = $condicao;
	}

	function get_condicao(){
		return $this->condicao;
	}

	// Métodos para atributo consumo_energia
	function set_consumo_energia($consumo_energia){
		$this->consumo_energia = $consumo_energia;
	}

	function get_consumo_energia(){
		return $this->consumo_energia;
	}

	// Métodos para atributo ean
	function set_ean($ean){
		$this->ean = $ean;
	}

	function get_ean(){
		return $this->ean;
	}

	// Métodos para atributo fabricante
	function set_fabricante($fabricante){
		$this->fabricante = $fabricante;
	}

	function get_fabricante(){
		return $this->fabricante;
	}

	// Métodos para atributo fab_comp
	function set_fab_comp($fab_comp){
		$this->fab_comp = $fab_comp;
	}

	function get_fab_comp(){
		return $this->fab_comp;
	}

	// Métodos para atributo fator_forma
	function set_fator_forma($fator_forma){
		$this->fator_forma = $fator_forma;
	}

	function get_fator_forma(){
		return $this->fator_forma;
	}

	// Métodos para atributo formato_gabinete
	function set_formato_gabinete($formato_gabinete){
		$this->formato_gabinete = $formato_gabinete;
	}

	function get_formato_gabinete(){
		return $this->formato_gabinete;
	}

	// Métodos para atributo frequencia
	function set_frequencia($frequencia){
		$this->frequencia = $frequencia;
	}

	function get_frequencia(){
		return $this->frequencia;
	}

	function set_largura($largura){
		$this->largura = $largura;
	}

	function get_largura(){
		return $this->largura;
	}

	// Métodos para atributo linha
	function set_linha($linha){
		$this->linha = $linha;
	}

	function get_linha(){
		return $this->linha;
	}

	// Métodos para atributo litografia
	function set_litografia($litografia){
		$this->litografia = $litografia;
	}

	function get_litografia(){
		return $this->litografia;
	}

	// Métodos para atributo modelo
	function set_modelo($modelo){
		$this->modelo = $modelo;
	}

	function get_modelo(){
		return $this->modelo;
	}

	// Métodos para atributo max_ram
	function set_max_ram($max_ram){
		$this->max_ram = $max_ram;
	}

	function get_max_ram(){
		return $this->max_ram;
	}

	// Métodos para atributo nucleos
	function set_nucleos($nucleos){
		$this->nucleos = $nucleos;
	}

	function get_nucleos(){
		return $this->nucleos;
	}

	// Métodos para atributo potencia
	function set_potencia($potencia){
		$this->potencia = $potencia;
	}

	function get_potencia(){
		return $this->potencia;
	}

	// Métodos para atributo quantidade_armazenamento
	function set_quantidade_armazenamento($quantidade_armazenamento){
		$this->quantidade_armazenamento = $quantidade_armazenamento;
	}

	function get_quantidade_armazenamento(){
		return $this->quantidade_armazenamento;
	}

	// Métodos para atributo quantidade_pentes
	function set_quantidade_pentes($quantidade_pentes){
		$this->quantidade_pentes = $quantidade_pentes;
	}

	function get_quantidade_pentes(){
		return $this->quantidade_pentes;
	}

	// Métodos para atributo ram_pente_individual
	function set_ram_pente_individual($ram_pente_individual){
		$this->ram_pente_individual = $ram_pente_individual;
	}

	function get_ram_pente_individual(){
		return $this->ram_pente_individual;
	}

	// Métodos para atributo ram_placa_video
	function set_ram_placa_video($ram_placa_video){
		$this->ram_placa_video = $ram_placa_video;
	}

	function get_ram_placa_video(){
		return $this->ram_placa_video;
	}

	// Métodos para atributo ram_total
	function set_ram_total($ram_total){
		$this->ram_total = $ram_total;
	}

	function get_ram_total(){
		return $this->ram_total;
	}

	// Métodos para atributo resfriamento
	function set_resfriamento($resfriamento){
		$this->resfriamento = $resfriamento;
	}

	function get_resfriamento(){
		return $this->resfriamento;
	}

	// Métodos para atributo soquete
	function set_soquete($soquete){
		$this->soquete = $soquete;
	}

	function get_soquete(){
		return $this->soquete;
	}

	// Métodos para atributo selo_80_plus
	function set_selo_80_plus($selo_80_plus){
		$this->selo_80_plus = $selo_80_plus;
	}

	function get_selo_80_plus(){
		return $this->selo_80_plus;
	}

	// Métodos para atributo suporta_sata
	function set_suporta_sata($suporta_sata){
		$this->suporta_sata = $suporta_sata;
	}

	function get_suporta_sata(){
		return $this->suporta_sata;
	}

	// Métodos para atributo suporta_nvme
	function set_suporta_nvme($suporta_nvme){
		$this->suporta_nvme = $suporta_nvme;
	}

	function get_suporta_nvme(){
		return $this->suporta_nvme;
	}

	// Métodos para atributo tempo_uso
	function set_tempo_uso($tempo_uso){
		$this->tempo_uso = $tempo_uso;
	}

	function get_tempo_uso(){
		return $this->tempo_uso;
	}

	// Métodos para atributo threads
	function set_threads($threads){
		$this->threads = $threads;
	}

	function get_threads(){
		return $this->threads;
	}

	// Métodos para atributo tipo_armazenamento
	function set_tipo_armazenamento($tipo_armazenamento){
		$this->tipo_armazenamento = $tipo_armazenamento;
	}

	function get_tipo_armazenamento(){
		return $this->tipo_armazenamento;
	}

	// Métodos para atributo tipo_ram
	function set_tipo_ram($tipo_ram){
		$this->tipo_ram = $tipo_ram;
	}

	function get_tipo_ram(){
		return $this->tipo_ram;
	}

	// Métodos para atributo video_integrado
	function set_video_integrado($video_integrado){
		$this->video_integrado = $video_integrado;
	}

	function get_video_integrado(){
		return $this->video_integrado;
	}

	public function obter_vetor_atributos() {
        return get_object_vars($this);
    }

}
?>