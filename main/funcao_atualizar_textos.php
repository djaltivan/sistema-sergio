<?php
ini_set( 'display_errors', false );
error_reporting( 0 );
include('conectar.php'); 

$titulo = $_POST["titulo"];
$rodape = $_POST["rodape"];
$link = $_POST["link"];
$titulolink = $_POST["titulolink"];

	$query = mysql_query("UPDATE textos SET titulo='$titulo', rodape='$rodape', link='$link', titulolink='$titulolink' WHERE idtextos=1");
	mysql_query($query,$connect);
	echo "<br />" . "Textos alterados com sucesso!";
?>
<META http-equiv="refresh" content="0;URL=editar_textos.php">
