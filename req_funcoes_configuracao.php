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
?>