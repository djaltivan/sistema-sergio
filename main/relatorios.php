<?php
    $login_cookie = $_COOKIE['login'];
        if(isset($login_cookie)){
ini_set( 'display_errors', false );
error_reporting( 0 );
include('conectar.php');

   $login_cookie = $_COOKIE['login'];
   $local_cookie = $_COOKIE['local'];
	mysql_query("insert into log (datahora, user, log1, log2, tipo, local)values(now(),'".$login_cookie."',' ',' ','Viu Relatórios','".$local."')");

?>
<?php $linha_verrelatorio = mysql_fetch_assoc(mysql_query("SELECT * FROM usuarios WHERE login = '".$login_cookie."'", $connect));
if(empty($linha_verrelatorio['verrelatorio'])){ ?>
acesso negado para relatórios
<?php }else{ ?>
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
<title>:: Relatórios ::</title>
</head>
<body>
<?php
	include('menu.php'); 
?>
<hr>
<h2 align="left">:: Relatórios ::</h2>
<div class="fundo">
<?php
	include('menu-relatorio.php'); 
?>
</div>	  
<?php
	include('rodape.php'); 
?>
</body>
</html>
<?php } ?>
<?php
        }else{
?>
			<p>Faça Login</p>
            <META http-equiv="refresh" content="0;URL=index.php"> 
<?php
        }
?>
