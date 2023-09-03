<?php

class Configuracao{	
	
	public static function monta_listagem($vetor_listagem){
        $string_listagem='';
        if($vetor_listagem!=[]){
            $string_listagem = (($vetor_listagem[0][0]->get_categoria_produto() != "ram" || $vetor_listagem[0][0]->get_categoria_produto() != "armazenamento") ? "<div id='grid'>" : "<div id='lista'>");
            foreach($vetor_listagem as $bloco) {
                $anuncio = $bloco[0];
                $produto = $bloco[1];
                $id_anunc=($anuncio->get_id_anuncio());
                $id_vend=($anuncio->get_id_vendedor());
                $nome_prod=($anuncio->get_titulo_anuncio());
                $preco=($anuncio->get_preco());
                $img_princ=($anuncio->get_img_princ());

                $string_propriedades='';
                foreach($produto->obter_vetor_atributos() as $propriedade=>$valor){
                    if($propriedade)
                        $string_propriedades.="<input type='hidden' id='".$propriedade."_".$anuncio->get_id_anuncio()."' value='".$valor."' >";
                }
                
                
                if($anuncio->get_categoria_produto()=='ram'||$anuncio->get_categoria_produto()=='armazenamento'){
                    //$pentes=$row['quantidade_pentes'];
                    //$ram_total=$row['ram_total'];
    
                    $string_listagem.="<div class='anuncio anuncio_lista' id='".$id_anunc."' onclick='pagAnunc(event)'>".$string_propriedades."
                    <div class='img_anunc img_anunc_lista'>
                        <img src='../img/".$img_princ."' >
                    </div>
                    <span class='titulo_anunc titulo_anunc_lista'>$nome_prod</span>
                    <span id='preco_".$id_anunc."' class='preco preco_lista'>R$ ".number_format($preco, 2, ',', '.')."</span>
                    <div class='container_botoes'><button disabled class='btn_selecionar btn_retirar disabled' id='retirar_".$id_anunc."' onclick='retirar_ram(this)'><img class='icone' src='../img/icons/menos.png'></button><button class='btn_selecionar btn_adicionar' id='adicionar_".$id_anunc."' onclick='adicionar_ram(this)'><img class='icone' src='../img/icons/mais.png'></button></div>
                    </div>";
                    
                }else{
                    $string_listagem.="<div class='anuncio' id='".$id_anunc."' onclick='pagAnunc(event)'>".$string_propriedades."
                    <input type='checkbox' id='check_".$id_anunc."' onchange='selecionarPeca(this)'>
                    <div class='img_anunc'>
                        <img src='../img/".$img_princ."' >
                    </div>
                    <span class='titulo_anunc'>$nome_prod</span>
                    <span id='preco_".$id_anunc."' class='preco'>R$ ".number_format($preco, 2, ',', '.')."</span>
                    </div>";
                }
    
                
            }
            $string_listagem.="</div>";  
        }
        return $string_listagem;
    }

    public static function monta_restricoes($etapa, $placa_mae){
        
        if($etapa=='ram'){
            $slots = $placa_mae->get_barramentos_ram();
            $max_ram = $placa_mae->get_max_ram();
    
            return "<p id='limite_slots'><span id='label_slots'>Slots usados:</span><span id='slots_usados'>0</span><span id='slots_totais'>/".$slots."</span></p>
            <p id='limite_ram'><span id='label_ram'>Limite de memória:</span><span id='ram_usada'>0GB</span><span id='capacidade_ram'>/".$max_ram."GB</span></p>";
        }

        return "";
    }

    public static function retorna_titulo($etapa){
        if($etapa=="processador"||$etapa=="gabinete"||$etapa=="armazenamento")
            return ucfirst($etapa);

        if($etapa=="fonte")
            return "Fonte de alimentação";

        if($etapa=="cooler")
            return "Cooling";

        if($etapa=="ram")
            return "Memória RAM";
        
        if($etapa=="placa_mae")
            return "Placa-mãe";
        
        if($etapa=="placa_video")
            return "Placa de vídeo";

        if($etapa=="perifericos")
            return "Periféricos";        
    }

}


?>