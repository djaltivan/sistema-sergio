<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>:: Login de Usuário ::</title>
  <link rel='stylesheet prefetch' href='http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css'>
  <link rel="stylesheet" href="css/login.css">
</head>
<?php
include('conectar.php'); 
   $result = mysql_query("SELECT * FROM textos");
   $num_rows = mysql_num_rows($result);
   $query = sprintf("SELECT * FROM textos WHERE idtextos = 1");
   $dados = mysql_query($query, $connect) or die(mysql_error());
   $linha = mysql_fetch_assoc($dados);
   $total = mysql_num_rows($dados);
?>
<body>
  <link href='http://fonts.googleapis.com/css?family=Ubuntu:500' rel='stylesheet' type='text/css'>
<div class="login">
  <div class="login-header">
    <h1><?=$linha['titulo']?></h1>
  </div>
  <div class="login-form">
	<form id="formulario" autocomplete="off" method="POST" action="entrar.php">
		<h3>Login:</h3>
		<input type="text" name="login" id="login">
		<h3>Senha:</h3>
		<input type="password" name="senha" id="senha">
		<h3>Local:</h3>
		<select name="local" type="text" id="local">
		  <option selected="" value="-">-</option>
		  <option value="Interno">Interno</option>
		  <option value="Externo">Externo</option>
		</select>
		<br>
		<br>
		<input type="submit" value="entrar" id="entrar" name="entrar" class="login-button>
		<br>
	</form>
  </div>
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js'></script>
    <script src="js/login.js"></script>
</body>
</html>
