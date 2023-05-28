<?php
function retorna_query_produto($array_prod, $id_vendedor, $id_anuncio){

    $ean = $array_prod['ean'];
    $fabricante = $array_prod['fabricante'];
    $modelo = $array_prod['modelo'];

    if($array_prod['tipo_produto']=='placa_mae'){
        $fab_comp_proc=$array_prod['fab_comp'];
        $soquete=$array_prod['soquete'];
        $frequencia=$array_prod['frequencia'];
        $barramentos_ram=$array_prod['slots_ram'];
        $max_ram=$array_prod['max_ram'];
        $tipo_ram=$array_prod['tipo_ram'];
        $barramentos_video="";
        if(isset($array_prod['x1'])){
            $barramentos_video.=$array_prod['x1'].",";
        }
        if(isset($array_prod['x2'])){
            $barramentos_video.=$array_prod['x2'].",";
        }
        if(isset($array_prod['x4'])){
            $barramentos_video.=$array_prod['x4'].",";
        }
        if(isset($array_prod['x8'])){
            $barramentos_video.=$array_prod['x8'].",";
        }
        if(isset($array_prod['x16'])){
            $barramentos_video.=$array_prod['x16'].",";
        }
        if(isset($array_prod['x32'])){
            $barramentos_video.=$array_prod['x32'].",";
        }
        if(isset($array_prod['pci'])){
            $barramentos_video.=$array_prod['pci'].",";
        }
        if(isset($array_prod['agp'])){
            $barramentos_video.=$array_prod['agp'].",";
        }
        if(isset($array_prod['thunderbolt'])){
            $barramentos_video.=$array_prod['thunderbolt'].",";
        }
        
        if($barramentos_video!=""){
            $barramentos_video = trim($barramentos_video, ',');
        }
        
        
        if(isset($array_prod['sata'])){
            $suporta_sata=1;
        }else{
            $suporta_sata=0;
        }
        if(isset($array_prod['nvme'])){
            $suporta_nvme=1;
        }else{
            $suporta_nvme=0;
        }

        $fator_forma=$array_prod['fator_forma'];

        $query="INSERT INTO produtos (id_anuncio, id_vendedor, ean, fabricante, modelo, fab_comp, soquete, frequencia, barramentos_ram, max_ram, tipo_ram, barramentos_video, suporta_sata, suporta_nvme, fator_forma) VALUES ('$id_anuncio', '$id_vendedor', '$ean', '$fabricante', '$modelo', '$fab_comp_proc', '$soquete', '$frequencia', '$barramentos_ram', '$max_ram', '$tipo_ram', '$barramentos_video', '$suporta_sata', '$suporta_nvme', '$fator_forma')";

        return $query;
    }

    if($array_prod['tipo_produto']=='processador'){
        $linha=$array_prod['linha'];
        $soquete=$array_prod['soquete'];
        $frequencia=$array_prod['frequencia'];
        $nucleos=$array_prod['nucleos'];

        if(isset($array_prod['gpu'])){
            $gpu_integrada=1;
        }else{
            $gpu_integrada=0;
        }

        $query="INSERT INTO produtos (id_anuncio, id_vendedor, ean, fabricante, modelo, soquete, frequencia, linha, nucleos, video_integrado) VALUES ('$id_anuncio', '$id_vendedor', '$ean', '$fabricante', '$modelo', '$soquete', '$frequencia', '$linha', '$nucleos', '$gpu_integrada')";

        return $query;
    }

    if($array_prod['tipo_produto']=='ram'){
        $frequencia=$array_prod['frequencia'];
        $ram_pente_individual=$array_prod['quant_ram'];
        $quant_pentes=$array_prod['pentes'];
        $tipo_ram=$array_prod['tipo_ram'];

        $ram_total=$ram_pente_individual*$quant_pentes;

        $query="INSERT INTO produtos (id_anuncio, id_vendedor, ean, fabricante, modelo, frequencia, ram_pente_individual, quantidade_pentes, tipo_ram, ram_total) VALUES ('$id_anuncio', '$id_vendedor', '$ean', '$fabricante', '$modelo', '$frequencia', '$ram_pente_individual', '$quant_pentes', '$tipo_ram', '$ram_total')";

        return $query;        
    }

    if($array_prod['tipo_produto']=='placa_video'){
        $frequencia=$array_prod['frequencia'];
        $ram_placa_video=$array_prod['quant_ram'];
        $barramento_encaixe_video=$array_prod['barramento'];

        $query="INSERT INTO produtos (id_anuncio, id_vendedor, ean, fabricante, modelo, frequencia, ram_placa_video, barramento_encaixe_video) VALUES ('$id_anuncio', '$id_vendedor', '$ean', '$fabricante', '$modelo', '$frequencia', '$ram_placa_video', '$barramento_encaixe_video')";

        return $query;
    }

    if($array_prod['tipo_produto']=='armazenamento'){
        $tipo_armazenamento=$array_prod['tipo_armazenamento'];
        $quant_memoria=$array_prod['memoria'];
        $barramento_encaixe_armazenamento=$array_prod['barramento'];

        $query="INSERT INTO produtos (id_anuncio, id_vendedor, ean, fabricante, modelo, tipo_armazenamento, quantidade_armazenamento, barramento_encaixe_armazenamento) VALUES ('$id_anuncio', '$id_vendedor', '$ean', '$fabricante', '$modelo', '$tipo_armazenamento', '$quant_memoria', '$barramento_encaixe_armazenamento')";

        return $query;
    }

    if($array_prod['tipo_produto']=='gabinete'){
        $comprimento=$array_prod['comprimento'];
        $largura=$array_prod['largura'];
        $altura=$array_prod['altura'];
        $formato=$array_prod['formato'];
        $fator_forma=$array_prod['fator_forma'];

        $query="INSERT INTO produtos (id_anuncio, id_vendedor, ean, fabricante, modelo, comprimento, largura, altura, formato_gabinete, fator_forma) VALUES ('$id_anuncio', '$id_vendedor', '$ean', '$fabricante', '$modelo', '$comprimento', '$largura', '$altura', '$formato', '$fator_forma')";

        return $query;
    }

    if($array_prod['tipo_produto']=='fonte'){
        $potencia=$array_prod['potencia'];
        $selo_80_plus=$array_prod['certificacao'];
        $fator_forma=$array_prod['fator_forma'];

        $query="INSERT INTO produtos (id_anuncio, id_vendedor, ean, fabricante, modelo, potencia, selo_80_plus, fator_forma) VALUES ('$id_anuncio', '$id_vendedor', '$ean', '$fabricante', '$modelo', '$potencia', '$selo_80_plus', '$fator_forma')";

        return $query;
    }

    if($array_prod['tipo_produto']=='cooler'){
        $comprimento=$array_prod['comprimento'];
        $largura=$array_prod['largura'];
        $altura=$array_prod['altura'];
        $resfriamento=$array_prod['resfriamento'];

        $query="INSERT INTO produtos (id_anuncio, id_vendedor, ean, fabricante, modelo, comprimento, largura, altura, resfriamento) VALUES ('$id_anuncio', '$id_vendedor', '$ean', '$fabricante', '$modelo', '$comprimento', '$largura', '$altura', '$resfriamento')";

        return $query;
    }
}

function retorna_query_anuncio($array_anunc, $id_vendedor){
    $titulo=$array_anunc['titulo_anuncio'];
    $preco=$array_anunc['preco_anunc'];
    $condicao_produto=$array_anunc['cond'];
    $tipo_produto=$array_anunc['tipo_produto'];
    $tempo_uso=$array_anunc['tempo_uso'];
    $estoque=$array_anunc['estoque'];
    $descricao=$array_anunc['descricao'];
    $info_adic=$array_anunc['info_adic'];
    $img_princ=$array_anunc['img_princ'];
    $imgs_sec=$array_anunc['imgs_sec'];

    $query="INSERT INTO anuncios (id_vendedor, titulo_anuncio, categoria_produto, preco, estoque, img_princ, imgs_sec, descricao, informacoes_adicionais) VALUES ('$id_vendedor', '$titulo', '$tipo_produto', '$preco', '$estoque', '$img_princ', '$imgs_sec', '$descricao', '$info_adic')";

    return $query;
}
?>