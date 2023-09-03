<?php
    function retorna_titulo($etapa){
        if($etapa=="processador"||$etapa=="gabinete"||$etapa=="armazenamento")
            return ucfirst($etapa);

        if($etapa=="fonte")
            return "Fonte de alimentação";

        if($etapa=="ram")
            return "Memória RAM";
        
        if($etapa=="placa_mae")
            return "Placa-mãe";
        
        if($etapa=="placa_video")
            return "Placa de vídeo";

        if($etapa=="perifericos")
            return "Periféricos";
    }

    function retorna_query($etapa, $vetor_config){

        if($etapa=="processador"){
            return "SELECT * FROM anuncios WHERE categoria_produto='$etapa'";
        }

        if($etapa=="armazenamento"){
            $barramentos_armazenamento="";
            if ($vetor_config['placa_mae'][0]['produto']['suporta_sata']==1)
                $barramentos_armazenamento.="produtos.barramento_encaixe_armazenamento='sata' OR ";
            
            if ($vetor_config['placa_mae'][0]['produto']['suporta_nvme']==1)
                $barramentos_armazenamento.="produtos.barramento_encaixe_armazenamento='nvme' OR ";
            
            $barramentos_armazenamento=rtrim($barramentos_armazenamento, " OR ");

            return "SELECT anuncios.*, produtos.barramento_encaixe_armazenamento AS barramento_encaixe_armazenamento FROM anuncios INNER JOIN produtos ON produtos.id_produto=anuncios.id_produto WHERE anuncios.categoria_produto='$etapa' AND (".$barramentos_armazenamento.")";
        }

        if($etapa=="gabinete"){
            if($vetor_config['placa_mae'][0]['produto']['fator_forma']=="eatx"){
                $fator_forma="AND  produtos.fator_forma='eatx'";
            }else if($vetor_config['placa_mae'][0]['produto']['fator_forma']=="atx"){
                $fator_forma="AND ( produtos.fator_forma='eatx' OR  produtos.fator_forma='atx')";
            }else if($vetor_config['placa_mae'][0]['produto']['fator_forma']=="mini"){
                $fator_forma="AND ( produtos.fator_forma='eatx' OR  produtos.fator_forma='atx' OR  produtos.fator_forma='mini')";
            }else if($vetor_config['placa_mae'][0]['produto']['fator_forma']=="atx"){
                $fator_forma="AND ( produtos.fator_forma='eatx' OR  produtos.fator_forma='atx' OR  produtos.fator_forma='mini' OR  produtos.fator_forma='micro')";
            }
            return "SELECT anuncios.*, produtos.fator_forma AS fator_forma FROM anuncios INNER JOIN produtos ON produtos.id_produto=anuncios.id_produto WHERE anuncios.categoria_produto='$etapa' ".$fator_forma;
        }

        if($etapa=="fonte"){
            return "SELECT anuncios.*, produtos.fator_forma AS fator_forma FROM anuncios INNER JOIN produtos ON produtos.id_produto=anuncios.id_produto WHERE anuncios.categoria_produto='$etapa' AND produtos.fator_forma='".$vetor_config['placa_mae'][0]['produto']['fator_forma']."'";
        }

        if($etapa=="ram"){
            return "SELECT anuncios.*, produtos.quantidade_pentes AS quantidade_pentes, produtos.ram_total AS ram_total, produtos.tipo_ram AS tipo_ram FROM anuncios INNER JOIN produtos ON produtos.id_produto=anuncios.id_produto WHERE anuncios.categoria_produto='$etapa' AND produtos.quantidade_pentes<=".$vetor_config['placa_mae'][0]['produto']['barramentos_ram']." AND produtos.ram_total<=".$vetor_config['placa_mae'][0]['produto']['max_ram']." AND produtos.tipo_ram='".$vetor_config['placa_mae'][0]['produto']['tipo_ram']."'";
        }

        if($etapa=="placa_mae"){
            return "SELECT anuncios.*, produtos.fab_comp AS fab_comp, produtos.soquete AS soquete FROM anuncios INNER JOIN produtos ON produtos.id_produto=anuncios.id_produto WHERE anuncios.categoria_produto='$etapa' AND LOWER(produtos.fab_comp)=LOWER('".$vetor_config['processador'][0]['produto']['fabricante']."') AND LOWER(produtos.soquete)=LOWER('".$vetor_config['processador'][0]['produto']['soquete']."')";
        }

        if($etapa=="placa_video"){
            $vetor_barramentos=explode(',', $vetor_config['placa_mae'][0]['produto']['barramentos_video']);
            $verificacao_barramentos="";
            foreach($vetor_barramentos as $barramento){
                $verificacao_barramentos.= "LOWER(produtos.barramento_encaixe_video) LIKE LOWER('%".$barramento."%') OR ";
            }
            $verificacao_barramentos=rtrim($verificacao_barramentos, " OR ");

            return "SELECT anuncios.*, produtos.barramento_encaixe_video AS barramento_encaixe_video FROM anuncios INNER JOIN produtos ON produtos.id_produto=anuncios.id_produto WHERE anuncios.categoria_produto='$etapa' AND produtos.barramento_encaixe_video IS NOT NULL AND (".$verificacao_barramentos.")";
        }
    }


    function restricoes_ram($vetor_placa_mae){

        $slots = $vetor_placa_mae['barramentos_ram'];
        $max_ram = $vetor_placa_mae['max_ram'];

        return "<p id='limite_slots'><span id='label_slots'>Slots usados:</span><span id='slots_usados'>0</span><span id='slots_totais'>/".$slots."</span></p>
        <p id='limite_ram'><span id='label_ram'>Limite de memória:</span><span id='ram_usada'>0GB</span><span id='capacidade_ram'>/".$max_ram."GB</span></p>";
    }
    //EXEMPLO INNER JOIN
    // $query="SELECT usuarios.nome AS nome, usuarios.nome_fantasia AS nome_fantasia, usuarios.razao_social AS razao_social, produtos.* FROM usuarios INNER JOIN produtos ON usuarios.id_usuario=produtos.id_vendedor WHERE produtos.id_anuncio='$id_anunc'";
    // $result = mysqli_query($con, $query);
    // $row_vend_prod = mysqli_fetch_array($result);

    // $razao_social=$row_vend_prod['razao_social'];
    // $nome_fantasia=$row_vend_prod['nome_fantasia'];
    // $nome=$row_vend_prod['nome'];

    // $fabricante=$row_vend_prod['fabricante'];
?>