<?php
ini_set( 'display_errors', false );
error_reporting( 0 );
include('conectar.php'); 

$id = $_POST["ID"];
$config = $_POST["config"];
$addcadastro = $_POST["addcadastro"];
$vercadastro = $_POST["vercadastro"];
$adddemanda = $_POST["adddemanda"];
$verdemanda = $_POST["verdemanda"];
$editdemanda = $_POST["editdemanda"];
$verrelatorio = $_POST["verrelatorio"];
$veraniversario = $_POST["veraniversario"];
$excluirdemanda = $_POST["excluirdemanda"];
$nivel = $_POST["nivel"];
$log = $_POST["log"];

	$query = mysql_query("UPDATE usuarios SET config='$config', addcadastro='$addcadastro', vercadastro='$vercadastro', adddemanda='$adddemanda', verdemanda='$verdemanda', editdemanda='$editdemanda', verrelatorio='$verrelatorio', veraniversario='$veraniversario', excluirdemanda='$excluirdemanda', nivel='$nivel' , log='$log' WHERE ID = '$id'");
	mysql_query($query,$connect);
	echo "<br />" . "Textos alterados com sucesso!";
?>
<META http-equiv="refresh" content="0;URL=editar_nivel.php?id=<?=$id?>">




