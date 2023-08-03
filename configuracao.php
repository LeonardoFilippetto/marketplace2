<?php
    require "req_funcoes_configuracao.php";
    require "conexao.php";
    session_start();
    $vetor_etapas=['processador', 'placa_mae', 'ram', 'placa_video', 'armazenamento', 'gabinete', 'fonte', 'perifericos', 'revisao'];
    $etapa="processador";

    if(isset($_POST['proxima_etapa'])){
        $etapa=$_POST['proxima_etapa'];
            
        if(!isset($_SESSION['config']))
            $_SESSION['config']=[];

        $_SESSION['config'][$vetor_etapas[(array_search($etapa, $vetor_etapas)-1)]]['id_anuncio']=[$_POST['id_anuncio']];
        
    }

    $titulo_etapa=retorna_titulo($etapa);
    
    if(isset($_POST['search'])){
        $termo_busca=strtolower($_POST['search']);
        $query="SELECT * FROM anuncios WHERE LOWER(titulo_anuncio) LIKE'%$termo_busca%'";
        $result = mysqli_query($con, $query);
        if(mysqli_num_rows($result)==0){
            $query = "SELECT * FROM anuncios WHERE LEVENSHTEIN_CONTAINS('$termo_busca', titulo_anuncio, ".strlen($termo_busca)/7 .")";
            $result = mysqli_query($con, $query);
            if(mysqli_num_rows($result)==0){
                $palavras_busca=explode(' ', $termo_busca);
                $query="SELECT * FROM anuncios WHERE ";
                foreach($palavras_busca as $palavra){
                    $query.="LOWER(titulo_anuncio) LIKE'%$palavra%' OR ";
                }
                $query= rtrim($query, ' OR ');
                $result = mysqli_query($con, $query);
            
                if(mysqli_num_rows($result)==0){
                    $query = "SELECT * FROM anuncios WHERE ";
                    foreach ($palavras_busca as $palavra) {
                    $query .= "LEVENSHTEIN_CONTAINS('$palavra', titulo_anuncio, ".strlen($palavra)/3 .") OR ";
                    }
                    $query = rtrim($query, "OR "); 
                    $result = mysqli_query($con, $query);
                }
            }
        } 
    }   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monte sua configuração</title>
    <link rel="stylesheet" href="css/default.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/configuracao.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" 
    rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script defer src="https://kit.fontawesome.com/0e01c81990.js" crossorigin="anonymous"></script>
    <script src="js/index.js" defer></script>
    <script src="js/busca.js" defer></script>
    <script src="js/configuracao.js" defer></script>
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
                    <a class="nav-link" href="login.php"> <img src="img/do-utilizador.svg" alt="login" width="20px">Login</a>
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
                        <?php echo $input_voltar; ?>
                        <button>Voltar</button>
                    </form>
                <?php } echo $titulo_etapa;?>

                <form action="index.php" method="post" id="frm_busca" autocomplete="off" class="d-none d-md-block">
                    <div class="search-container">
                        <input type="text" placeholder="Buscar" name="search" id="busca">
                        <input type="hidden" name="etapa" value="<?php echo $etapa; ?>">
                        <img src="img/procurar.svg" alt="" style="height:1rem; margin:0.2rem;" id="lupa">
                    </div>
                </form>

            </div>
<?php
    if(!isset($query)){ 
        $query = "SELECT * FROM anuncios WHERE categoria_produto='$etapa'";
        $result = mysqli_query($con, $query);
    }

    echo "<div id='grid'>";
    if(mysqli_num_rows($result)!=0){
        while ($row = mysqli_fetch_array($result)) {
            $id_anunc=($row['id_anuncio']);
            $id_vend=($row['id_vendedor']);
            $nome_prod=($row['titulo_anuncio']);
            //$tipo=($row['tipo_prod']);
            $preco=($row['preco']);
            $img_princ=($row['img_princ']);
            /*echo $id_anunc."<br>";
            echo $id_vend."<br>";
            echo $nome_prod."<br>";
            echo $tipo."<br>";
            echo $preco."<br>";
            echo "<img src='img/".$img_princ."' width='200px'><br><br>";*/

            echo"<div class='anuncio' id='".$id_anunc."' onclick='pagAnunc(event)'>
                <input type='checkbox' id='check_".$id_anunc."' onchange='selecionarPeca(this)'>
                <div class='img_anunc'>
                    <img src='img/".$img_princ."' >
                </div>
                <span class='titulo_anunc'>$nome_prod</span>
                <span class='preco'>R$ ".$preco."</span>
            </div>";
        }
    }
    echo"</div>";
?>
        </div>
        <div id="info">
            <form action="" method="post">
                <input type="hidden" name="proxima_etapa" id="input_proxima_etapa" value="<?php echo $vetor_etapas[(array_search($etapa, $vetor_etapas)+1)]; ?>">
                <input type="hidden" name="id_anuncio" id="input_id_anuncio" value="">
                <input type="submit" id="submit_avancar" value="SELECIONE UM PRODUTO" disabled>
            </form>
        </div>
    </div>

</body>
</html>