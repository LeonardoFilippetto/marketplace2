<?php
    require_once("../model/AnuncioDAO.php");
    require_once('../model/ProdutoDAO.php');
    require_once('../utils/Configuracao.php');

    $dao_a = new AnuncioDAO();

    session_start();
    $etapa="processador";
    $max_quant_anunc=1;
    $restricoes='';
    $subtotal=0;
    $titulo_etapa='Processador';
    $max_quant_anunc=1;
    $proxima_etapa='placa_mae';

    if(!isset($_SESSION['config'])){
        $_SESSION['config']=[];
    }else{
        //implementar
    }

    if(isset($_SESSION['etapa'])){
        $etapa=$_SESSION['etapa'];
        $proxima_etapa=$_SESSION['proxima_etapa'];
        $restricoes=$_SESSION['restricoes'];
        $max_quant_anunc=$_SESSION['max_quant_anunc'];
        $string_listagem=$_SESSION['string_listagem'];
        $titulo_etapa=$_SESSION['titulo_etapa'];
        $subtotal=$_SESSION['subtotal'];

        unset($_SESSION['etapa']);
        unset($_SESSION['proxima_etapa']);
        unset($_SESSION['restricoes']);
        unset($_SESSION['max_quant_anunc']);
        unset($_SESSION['string_listagem']);
        unset($_SESSION['titulo_etapa']);
        unset($_SESSION['subtotal']);

    }else{
        unset($_SESSION['config']);
        $string_listagem=Configuracao::monta_listagem($dao_a->obter_processador_configuracao());
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monte sua configuração</title>
    <link rel="stylesheet" href="../css/default.css">
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/configuracao.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" 
    rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="../js/configuracao.js" async></script>
    <script async src="https://kit.fontawesome.com/0e01c81990.js" crossorigin="anonymous"></script>
    <script src="../js/index.js" async></script>
    <script src="../js/busca.js" async></script>
    <?php
        require "req_scripts.php";
    ?>
</head>
<body>
    <nav class="navbar fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand ms-3" href="index.php" id="logo_nav">STOCKPC</a>
                
            <h1>MONTE SUA CONFIGURAÇÃO</h1>

            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasNavbarLabel">STOCKPC</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">  
                    <li>
                    <?php
                        if(!isset($_SESSION)) {
                            session_start();
                        }
                            if(!isset($_SESSION['id_usuario'])){
                    ?>
                    <a class="nav-link" href="login.php"> <img src="../img/do-utilizador.svg" alt="login" width="20px">Login</a>
                    <?php
                            }else{
                                echo'<a class="nav-link" href="index.php?des">Sair</a>';

                            }
                    ?>
                    <a class="nav-link" href="meus_anuncios.php">Meus anúncios</a>
                    </li> 
                
                </ul>
                

            </div>
            </div>
        </div>
    </nav>
    <div id="etapas">
        <span class="etapa">Processador</span>
        <span class="etapa">Placa-Mãe</span>
        <span class="etapa">Memória RAM</span>
        <span class="etapa">Placa de Vídeo</span>
        <span class="etapa">Armazenamento</span>
        <span class="etapa">Gabinete</span>
        <span class="etapa">Fonte de Alimentação</span>
        <span class="etapa">Periféricos</span>
        <span class="etapa">Revisão</span>
    </div>

    <div id="main">
        <div id="pecas">
            <div id="cabecalho">
                <?php if($etapa!="processador"){ ?>
                    <form action="" method="post">
                        <?php // echo $input_voltar; ?>
                        <button>Voltar</button>
                    </form>
                <?php } echo $titulo_etapa;?>

                <form action="../controller/configuracao.php" method="post" id="frm_busca" autocomplete="off" class="d-none d-md-block">
                    <div class="search-container">
                        <input type="text" placeholder="Buscar" name="search" id="busca">
                        <input type="hidden" name="etapa" value="<?php echo $etapa; ?>">
                        <img src="../img/procurar.svg" alt="" style="height:1rem; margin:0.2rem;" id="lupa">
                    </div>
                </form>

            </div>
<?php echo $string_listagem; ?>
        </div>
        <div id="info">
            <form action="../controller/configuracao.php" method="post" id="prox_et">

                <input type="hidden" name="subtotal_inicial" id="subtotal_inicial" value="R$<?php echo number_format($subtotal, 2, ',', '.'); ?>">
                <input type="hidden" name="proxima_etapa" id="input_proxima_etapa" value="<?php echo $proxima_etapa; ?>">
                <input type="hidden" name="max_quant_anunc" id="max_quant_anunc" value="<?php echo $max_quant_anunc; ?>">
                <input type="hidden" name="quant_anunc" id="quant_anunc" value="0">

                <input type="hidden" class="id_anunc" name="id_anuncio_0" id="input_id_anuncio_0" value="">
                <input type="hidden" class="quant_anunc" name="quantidade_0" id="quantidade_0" value="1">
                <input type="hidden" class="preco_anunc" name="preco_anunc_0" id="preco_anunc_0" value="0">

                <?php echo $restricoes; ?>

                <input type="submit" id="submit_avancar" value="SELECIONE UM PRODUTO" disabled >
            </form>

            <div><br><br><p class="aux">Subtotal:</p><p id="subtotal">R$<?php echo number_format($subtotal, 2, ',', '.'); ?></p><p class="aux">(Frete não incluído)</p></div>
        </div>
    </div>

</body>
</html>