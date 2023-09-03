<?php
function monta_especificacoes($v){
    $string="<p><b>Fabricante: </b>".$v['fabricante']."<br>";
    $string.="<b>Modelo: </b>".$v['modelo']."<br>";
    $string.="<b>EAN: </b>".$v['ean']."<br>";

    if($v['comprimento']!="")
        $string.="<b>Comprimento: </b>".$v['comprimento']."mm<br>";

    if($v['largura']!="")
        $string.="<b>Largura: </b>".$v['largura']."mm<br>";

    if($v['altura']!="")
        $string.="<b>Altura: </b>".$v['altura']."mm<br>";

    if($v['barramento_encaixe_armazenamento']!="")
        $string.="<b>Barramento de encaixe: </b>".$v['barramento_encaixe_armazenamento']."<br>";

    if($v['barramento_encaixe_video']!="")
        $string.="<b>Barramento de encaixe: </b>".($v['barramento_encaixe_video'][0] == 'x' ? "PCIe ".(ucfirst($v['barramento_encaixe_video'])) : strtoupper($v['barramento_encaixe_video']))."<br>";

    if($v['barramentos_ram']!="")
        $string.="<b>Máximo de pentes RAM: </b>".$v['barramentos_ram']."<br>";

    if($v['fab_comp']!="")
    $string .= "<b>Processadores compatíveis: </b>". ($v['fab_comp'] == 'intel' ? "Intel<br>" : "AMD<br>");

    if($v['fator_forma']!="")
        $string.="<b>Fator de Forma: </b>".strtoupper($v['fator_forma'])."<br>";

    if($v['formato_gabinete']!="")
        $string.="<b>Formato do gabinete: </b>".ucfirst($v['formato_gabinete'])." Tower<br>";

    if($v['linha']!="")
        $string.="<b>Linha do processador: </b>".($v['linha'][0] == 'i' ? $v['linha'] : ucfirst($v['linha']))."<br>";

    if($v['frequencia']!="")
        $string.="<b>Frequência base: </b>".$v['frequencia']."MHz<br>";
        
    if($v['max_ram']!="")
    $string.="<b>Máximo de memória RAM suportado: </b>".$v['max_ram']."GB<br>";
    
    if($v['nucleos']!="")
        $string.="<b>Núcleos: </b>".$v['nucleos']."<br>";

    if($v['potencia']!="")
        $string.="<b>Potência: </b>".$v['potencia']."W<br>";

    if($v['quantidade_armazenamento']!="")
        $string.="<b>Capacidade de armazenamento: </b>".$v['quantidade_armazenamento']."GB<br>";

    if($v['quantidade_pentes']!="")
        $string.="<b>Quantidade de pentes RAM: </b>".$v['quantidade_pentes']."<br>";

    if($v['ram_pente_individual']!="")
        $string.="<b>Memória de cada pente: </b>".$v['ram_pente_individual']."GB<br>";

    if($v['ram_placa_video']!="")
        $string.="<b>Memória RAM: </b>".$v['ram_placa_video']."GB<br>";

    if($v['ram_total']!="")
        $string.="<b>Memória total (pentes somados): </b>".$v['ram_total']."GB<br>";
    
    if($v['resfriamento']!="")
        $string.="<b>Tipo de resfriamento: </b>".ucfirst($v['resfriamento'])."<br>";
    
    if($v['soquete']!="")
        $string.="<b>Soquete: </b>".$v['soquete']."<br>";
    
    if($v['selo_80_plus']!="")
        $string.="<b>Selo 80 Plus: </b>".ucfirst($v['selo_80_plus'])."<br>";

    if($v['suporta_sata']!="")
        $string.="<b>Suporta SATA: </b>".($v['suporta_sata'] == '1' ? "Sim" : "Não")."<br>";
    
    if($v['suporta_nvme']!="")
        $string.="<b>Suporta NVMe: </b>".($v['suporta_nvme'] == '1' ? "Sim" : "Não")."<br>";

    if($v['tipo_armazenamento']!="")
        $string.="<b>Tipo de dispositivo: </b>".$v['tipo_armazenamento']."<br>";

    if($v['tipo_ram']!="")
        $string.="<b>Geração de memória RAM: </b>".$v['tipo_ram']."<br>";
    
    if($v['video_integrado']!="")
        $string.="<b>GPU integrada: </b>".($v['video_integrado'] == '1' ? "Possui" : "Não possui")."<br>";

    return $string;
    
}
?>