<?php

class Especificacoes
{	
	
	public static function monta_especificacoes($produto){
        $string="<p><b>Fabricante: </b>".$produto->get_fabricante()."<br>";
    $string.="<b>Modelo: </b>".$produto->get_modelo()."<br>";
    $string.="<b>EAN: </b>".$produto->get_ean()."<br>";

    if($produto->get_comprimento()!="")
        $string.="<b>Comprimento: </b>".$produto->get_comprimento()."mm<br>";

    if($produto->get_largura()!="")
        $string.="<b>Largura: </b>".$produto->get_largura()."mm<br>";

    if($produto->get_altura()!="")
        $string.="<b>Altura: </b>".$produto->get_altura()."mm<br>";

    if($produto->get_barramento_encaixe_armazenamento()!="")
        $string.="<b>Barramento de encaixe: </b>".$produto->get_barramento_encaixe_armazenamento()."<br>";

    if($produto->get_barramento_encaixe_video()!="")
        $string.="<b>Barramento de encaixe: </b>".($produto->get_barramento_encaixe_video()[0] == 'x' ? "PCIe ".(ucfirst($produto->get_barramento_encaixe_video())) : strtoupper($produto->get_barramento_encaixe_video()))."<br>";

    if($produto->get_barramentos_ram()!="")
        $string.="<b>Máximo de pentes RAM: </b>".$produto->get_barramentos_ram()."<br>";

    if($produto->get_fab_comp()!="")
    $string .= "<b>Processadores compatíveis: </b>". ($produto->get_fab_comp() == 'intel' ? "Intel<br>" : "AMD<br>");

    if($produto->get_fator_forma()!="")
        $string.="<b>Fator de Forma: </b>".strtoupper($produto->get_fator_forma())."<br>";

    if($produto->get_formato_gabinete()!="")
        $string.="<b>Formato do gabinete: </b>".ucfirst($produto->get_formato_gabinete())." Tower<br>";

    if($produto->get_linha()!="")
        $string.="<b>Linha do processador: </b>".($produto->get_linha()[0] == 'i' ? $produto->get_linha() : ucfirst($produto->get_linha()))."<br>";

    if($produto->get_frequencia()!="")
        $string.="<b>Frequência base: </b>".$produto->get_frequencia()."MHz<br>";
        
    if($produto->get_max_ram()!="")
    $string.="<b>Máximo de memória RAM suportado: </b>".$produto->get_max_ram()."GB<br>";
    
    if($produto->get_nucleos()!="")
        $string.="<b>Núcleos: </b>".$produto->get_nucleos()."<br>";

    if($produto->get_potencia()!="")
        $string.="<b>Potência: </b>".$produto->get_potencia()."W<br>";

    if($produto->get_quantidade_armazenamento()!="")
        $string.="<b>Capacidade de armazenamento: </b>".$produto->get_quantidade_armazenamento()."GB<br>";

    if($produto->get_quantidade_pentes()!="")
        $string.="<b>Quantidade de pentes RAM: </b>".$produto->get_quantidade_pentes()."<br>";

    if($produto->get_ram_pente_individual()!="")
        $string.="<b>Memória de cada pente: </b>".$produto->get_ram_pente_individual()."GB<br>";

    if($produto->get_ram_placa_video()!="")
        $string.="<b>Memória RAM: </b>".$produto->get_ram_placa_video()."GB<br>";

    if($produto->get_ram_total()!="")
        $string.="<b>Memória total (pentes somados): </b>".$produto->get_ram_total()."GB<br>";
    
    if($produto->get_resfriamento()!="")
        $string.="<b>Tipo de resfriamento: </b>".ucfirst($produto->get_resfriamento())."<br>";
    
    if($produto->get_soquete()!="")
        $string.="<b>Soquete: </b>".$produto->get_soquete()."<br>";
    
    if($produto->get_selo_80_plus()!="")
        $string.="<b>Selo 80 Plus: </b>".ucfirst($produto->get_selo_80_plus())."<br>";

    if($produto->get_suporta_sata()!="")
        $string.="<b>Suporta SATA: </b>".($produto->get_suporta_sata() == '1' ? "Sim" : "Não")."<br>";
    
    if($produto->get_suporta_nvme()!="")
        $string.="<b>Suporta NVMe: </b>".($produto->get_suporta_nvme() == '1' ? "Sim" : "Não")."<br>";

    if($produto->get_tipo_armazenamento()!="")
        $string.="<b>Tipo de dispositivo: </b>".$produto->get_tipo_armazenamento()."<br>";

    if($produto->get_tipo_ram()!="")
        $string.="<b>Geração de memória RAM: </b>".$produto->get_tipo_ram()."<br>";
    
    if($produto->get_video_integrado()!="")
        $string.="<b>GPU integrada: </b>".($produto->get_video_integrado() == '1' ? "Possui" : "Não possui")."<br>";

    return $string;
    }

}


?>