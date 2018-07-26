<?php
ini_set( 'display_errors', false );
error_reporting( 0 );
include('conectar.php');

mysql_query("DELETE FROM clientes WHERE idcliente = ".$_GET['idcliente']."");

    $login_cookie = $_COOKIE['login'];
    $nome = $_GET['nome'];

   $local_cookie = $_COOKIE['local'];
	mysql_query("insert into log (datahora, user, log1, log2, tipo, local)values(now(),'".$login_cookie."','".$_GET['idcliente']."','".$nome."','Apagou Pessoa: ','".$local."')");
?>
<META http-equiv="refresh" content="0;URL=gtodos100.php">