<?php
ini_set( 'display_errors', false );
error_reporting( 0 );
include('conectar.php'); 

$titulo = $_POST["titulo"];
$aviso = $_POST["aviso"];
$datahora = $_POST["datahora"];
$link = $_POST["link"];

	mysql_query("DELETE FROM confirmacaoleitura WHERE idconfirmacaoleitura > 0");

	$query = mysql_query("UPDATE avisos SET titulo='$titulo', aviso='$aviso', datahora=now(), link='$link' WHERE idavisos=1");
	mysql_query($query,$connect);
	echo "<br />" . "Aviso alterado com sucesso!";
	
?>
<META http-equiv="refresh" content="0;URL=config.php">
