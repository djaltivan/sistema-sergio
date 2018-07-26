<?php
ini_set( 'display_errors', false );
error_reporting( 0 );
include('conectar.php');

$nome = $_GET["nome"];

	mysql_query("insert into confirmacaoleitura (confirmacaoleitura, datahora)values('$nome',now())");

	echo "<br />" . "Confimação de Leitura cadastrada com sucesso!";

?>
<META http-equiv="refresh" content="1;URL=main.php"> 