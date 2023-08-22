<?php
echo '
<html>
<head>
<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
<script src="../bootstrap/js/bootstrap.min.js"></script>
<script src="../bootstrap/jquery/jquery-213.js"></script>
<script src="../bootstrap/js/bootstrap.js"></script>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="/cadastro_clientes/view/index.php">Controle de Clientes</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/cadastro_clientes/view/FormNovoCliente.php">Novo Cliente</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="/cadastro_clientes/view/FormConsultarClientes.php">Consultar Clientes</a>
      </li>
    </ul>
    <form class="form-inline my-3 my-lg-0" action="/cadastro_clientes/view/FormConsultarClientes.php" Method = "GET">
      <input class="form-control mr-sm-3" type="search" name="nome" placeholder="Digite o nome do cliente" aria-label="Buscar">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
    </form>
  </div>
</nav>  


</body>


<html>
';
?>