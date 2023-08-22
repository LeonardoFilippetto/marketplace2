<html>

<head>
<title>Novo Cliente</title>
<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
</head>

<body>
<?php
	include('Menu.php');
  require_once("../model/ClienteDAO.php");
  require_once("../model/ClienteDTO.php");

  $codigo = $_GET['codigo'];
  $dao = new ClienteDAO();
  $c = $dao->obter($codigo);
?>
<h2><center>Alterar Cliente</center></h2>
<form class = "container" action="../controller/AlterarCliente.php" method="POST">
  <div class="form-group">
    <label for="lbl_codigo" for="email">Código:</label>
    <input readonly type="text" class="form-control" id="lbl_codigo" name="lbl_codigo" value = "<?php echo $c->get_codigo();?>">
  </div>
  <div class="form-group">
    <label for="txt_nome" for="email">Nome do Cliente:</label>
    <input type="text" class="form-control" id="txt_nome" name="txt_nome" value = "<?php echo $c->get_nome();?>">
  </div>
  <div class="form-group">
    <label for="txt_idade" for="pwd">Idade:</label>
    <input type="number" class="form-control" id="txt_idade" name="txt_idade" value = "<?php echo $c->get_idade();?>">
  </div>
  <button type="submit" class="btn btn-default">Alterar</button>
</form>
</body>