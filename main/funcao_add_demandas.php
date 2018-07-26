<?php
ini_set( 'display_errors', false );
error_reporting( 0 );
include('conectar.php'); 

$idcliente = $_POST["idcliente"];
$demanda = $_POST["demanda"];
$descricao = $_POST["descricao"];
$status = $_POST["status"];
$data_inicio = $_POST["data_inicio"];
$data_termino = $_POST["data_termino"];
$atendente = $_POST["atendente"];

	mysql_query("insert into demandas (idcliente, demanda, descricao, status, data_inicio, data_termino, atendente)values('$idcliente', '$demanda', '$descricao', '$status', '$data_inicio', '$data_termino', '$atendente')");

	echo "<br />" . "Demanda cadastrada com sucesso!";

    $login_cookie = $_COOKIE['login'];

   $local_cookie = $_COOKIE['local'];
	mysql_query("insert into log (datahora, user, log1, log2, tipo, local)values(now(),'".$login_cookie."',' ','".$demanda."','Cadastrou Demanda: ','".$local."')");
?>
<META http-equiv="refresh" content="0;URL=demanda_frame.php?idcliente=<?=$idcliente?>">
