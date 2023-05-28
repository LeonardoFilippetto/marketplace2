

<nav class="navbar fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand ms-3" href="index.php" id="logo_nav">STOCKPC</a>
            <form action="index.php" method="post" id="frm_busca" autocomplete="off" class="d-none d-md-block">
                    <div class="search-container">
                        <input type="text" placeholder="Buscar" name="search" id="busca">
                        <img src="img/procurar.svg" alt="" style="height:1rem; margin:0.2rem;" id="lupa">
                    </div>
                </form>
               
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
                  <a class="nav-link" href="login.php"> <img src="img/do-utilizador.svg" alt="login" width="30px">Login</a>
                </li>
               
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Peças
                    </a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="#">Coolers</a></li>
                      <li><a class="dropdown-item" href="#">Fontes</a></li>
                      <li><a class="dropdown-item" href="#">Gabinetes</a></li>
                      <li><a class="dropdown-item" href="#">Memórias Ram</a></li>
                      <li><a class="dropdown-item" href="#">Placas de Vídeo</a></li>
                      <li><a class="dropdown-item" href="#">Placas-Mãe</a></li>
                      <li><a class="dropdown-item" href="#">Processadores</a></li>
                      
                      <li>
                          <hr class="dropdown-divider">
                      </li>
                      <li><a class="dropdown-item" href="#">Something else here</a>
                      </li>
                    </ul>
                </li>
                </ul>
                <form action="" method="post" id="frm_busca">
            <div class="search-container">
            <input type="text" placeholder="Buscar" name="search" id="busca">
            <i class="fa-solid fa-magnifying-glass" id="lupa"></i>
            </form>
            </div>
            </div>
        </div>
        </nav>

<?php
    require "req_scripts.php"
?>