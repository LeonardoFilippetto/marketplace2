<html>

<head>
<title>Novo Cliente</title>
<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
</head>

<body>
<?php
	include('Menu.php');
?>
<h2><center>Inserir Novo Cliente</center></h2>
<form class = "container" action="../controller/NovoCliente.php" method="POST">
  <div class="form-group">
    <label for="txt_nome" for="email">Nome do Cliente:</label>
    <input type="text" class="form-control" id="txt_nome" name="txt_nome">
  </div>
  <div class="form-group">
    <label for="txt_idade" for="pwd">Idade:</label>
    <input type="number" class="form-control" id="txt_idade" name="txt_idade">
  </div>
  <button type="submit" class="btn btn-default">Inserir</button>
</form>
</body>