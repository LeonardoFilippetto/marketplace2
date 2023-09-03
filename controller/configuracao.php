<?php

require_once('../model/AnuncioDAO.php');
require_once('../model/ProdutoDAO.php');
require_once('../utils/Configuracao.php');
session_start();
if(!isset($_POST['proxima_etapa'])&&!isset($_POST['busca'])&&!isset($_SESSION['config']))
    header("Location:../view/index.php");




$dao_a = new AnuncioDAO();
$dao_p = new ProdutoDAO();

$p = new Produto();
$a = new Anuncio();

$busca='';
if(isset($_POST['busca']))
    $busca=$_POST['busca'];

$vetor_etapas=['processador', 'placa_mae', 'ram', 'placa_video', 'armazenamento', 'gabinete', 'fonte', 'perifericos', 'revisao'];


$max_quant_anunc=1;
$subtotal=0;


if(!isset($_SESSION['config']))
    $_SESSION['config']=[];

if(isset($_POST['proxima_etapa'])){
    $etapa=$_POST['proxima_etapa'];

    for($i=0;$i<$_POST['quant_anunc'];$i++){
        $indice_id="id_anuncio_".$i;
        $indice_quantidade="quantidade_".$i;
        $indice_preco="preco_anunc_".$i;

        $produto = $dao_p->obter_por_anuncio($_POST[$indice_id]);

        
        $_SESSION['config'][$vetor_etapas[(array_search($etapa, $vetor_etapas)-1)]][$i]['id_anuncio']=$_POST[$indice_id];
        $_SESSION['config'][$vetor_etapas[(array_search($etapa, $vetor_etapas)-1)]][$i]['quantidade']=$_POST[$indice_quantidade];
        $_SESSION['config'][$vetor_etapas[(array_search($etapa, $vetor_etapas)-1)]][$i]['preco']=$_POST[$indice_preco];
        $_SESSION['config'][$vetor_etapas[(array_search($etapa, $vetor_etapas)-1)]][$i]['produto']=$produto;
    }
    foreach($_SESSION['config'] as $etapa_config){
        foreach($etapa_config as $vetor_anuncio){
            $subtotal+=$vetor_anuncio['preco']*$vetor_anuncio['quantidade'];
        }
        
    }
}else{
    if(isset($_POST['busca'])){
        $etapa = $_POST['etapa'];
        $busca=$_POST['busca'];
    }
}

$proxima_etapa=$vetor_etapas[(array_search($etapa, $vetor_etapas)+1)];
echo"<script>console.log('".$etapa."')</script>";
$metodo = "obter_" . $etapa . "_configuracao"; 
if($etapa=='ram'||$etapa=='fonte'||$etapa=='placa_video'||$etapa=='armazenamento'||$etapa=='gabinete'){
    $vetor_listagem=$dao_a->$metodo($_SESSION['config']['placa_mae'][0]['produto'], $busca);
}elseif($etapa=='processador'||$etapa=='cooler'){
    $vetor_listagem=$dao_a->$metodo($busca);
}else{
    $vetor_listagem=$dao_a->$metodo($_SESSION['config']['processador'][0]['produto'], $busca);
}

$string_listagem=Configuracao::monta_listagem($vetor_listagem);


if($etapa=='ram')
    $max_quant_anunc=$_SESSION['config']['placa_mae'][0]['produto']->get_barramentos_ram();

    $restricoes="";
if($etapa!='placa_mae')
    $restricoes=Configuracao::monta_restricoes($etapa, $_SESSION['config']['placa_mae'][0]['produto']);

$titulo_etapa=Configuracao::retorna_titulo($etapa);

$_SESSION['string_listagem']=$string_listagem;
$_SESSION['etapa']=$etapa;
$_SESSION['proxima_etapa']=$proxima_etapa;
$_SESSION['titulo_etapa']=$titulo_etapa;
$_SESSION['restricoes']=$restricoes;
$_SESSION['max_quant_anunc']=$max_quant_anunc;
$_SESSION['subtotal']=$subtotal;

header("Location:../view/configuracao.php");
?>