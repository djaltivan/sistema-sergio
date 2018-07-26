<?php
ini_set( 'display_errors', false );
error_reporting( 0 );
include('conectar.php');
mysql_query("DELETE FROM demandas WHERE iddemandas = ".$_GET['iddemanda']."");

    $login_cookie = $_COOKIE['login'];
    $iddemanda = $_GET['iddemanda'];
    $demanda = $_GET['demanda'];

   $local_cookie = $_COOKIE['local'];
	mysql_query("insert into log (datahora, user, log1, log2, tipo, local)values(now(),'".$login_cookie."','".$iddemanda."','".$demanda."','Apagou Demanda: ','".$local."')");
?>
<META http-equiv="refresh" content="0;URL=demanda_frame.php?idcliente=<?=$_GET['idcliente']?>">