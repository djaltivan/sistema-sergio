<?php
    $login_cookie = $_COOKIE['login'];
        if(isset($login_cookie)){
ini_set( 'display_errors', false );
error_reporting( 0 );
include('conectar.php');
?>
<!DOCTYPE html>
<html>
<head>
   <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="css/styles.css">
   <link rel="stylesheet" href="css/estilo.css"/>
   <style type="text/css">
   <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.0.min.js"></script>
   <script type="text/javascript" src="js/script.js"></script>
   body {
	background-color: #F9F9F9;
	margin-top: 0px;
   }
   </style>
   <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
   <script src="js/script.js"></script>
<title>:: Configurações ::</title>
</head>
<body>
<h2 align="left">Configurações</h2>
<div class="fundo">

<div class="linha4">
<?php $linha_config = mysql_fetch_assoc(mysql_query("SELECT * FROM usuarios WHERE login = '".$login_cookie."'", $connect));
if(empty($linha_config['config'])){ ?>
<?php }else{ ?>
	<a href="editar_grupos.php">
	<div class="tile4 prata4">
		<img src="icon/config_grupos.png"/><br />
		<h3>Editar Grupos</h3>
	</div>
	</a>
	<a href="editar_textos.php">
	<div class="tile4 prata4">
		<img src="icon/config.png"/><br />
		<h3>Editar Textos</h3>
	</div>
	</a>
	<a href="editar_aviso.php">
	<div class="tile4 prata4">
		<img src="icon/config.png"/><br />
		<h3>Editar Aviso</h3>
	</div>
	</a>
	<a href="texto.php">
	<div class="tile4 prata4">
		<img src="icon/config.png"/><br />
		<h3>Normalizar Textos</h3>
	</div>
	</a>
	<a href="backup/bk.php">
	<div class="tile4 prata4">
		<img src="icon/config.png"/><br />
		<h3>Gerar Backup do Banco</h3>
	</div>
	</a>
<?php } ?>
	<a href="editar_usuario.php">
	<div class="tile4 prata4">
		<img src="icon/usuario.png"/><br />
		<h3>Alterar Senha</h3>
	</div>
	</a>
<?php $linha_nivel = mysql_fetch_assoc(mysql_query("SELECT * FROM usuarios WHERE login = '".$login_cookie."'", $connect));
if(empty($linha_nivel['nivel'])){ ?>
<?php }else{ ?>
	<a href="editar_nivel.php?id=00009">
	<div class="tile4 prata4">
		<img src="icon/acesso.png"/><br />
		<h3>Editar Acesso</h3>
	</div>
	</a>
<?php } ?>
<?php $linha_log = mysql_fetch_assoc(mysql_query("SELECT * FROM usuarios WHERE login = '".$login_cookie."'", $connect));
if(empty($linha_log['log'])){ ?>
<?php }else{ ?>
	<a href="verlog.php" target="_blank">
	<div class="tile4 prata4">
		<img src="icon/relatorios.png"/><br />
		<h3>Log</h3>
	</div>
	</a>
	<a href="verlogtab.php" target="_blank">
	<div class="tile4 prata4">
		<img src="icon/relatorios.png"/><br />
		<h3>Log Tabela</h3>
	</div>
	</a>
<?php } ?>
</div>




</div>
</body>
</html>
<?php
        }else{
?>
			<p>Faça Login</p>
            <META http-equiv="refresh" content="0;URL=index.php"> 
<?php
        }
?>
