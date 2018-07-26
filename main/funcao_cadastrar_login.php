<?php

ini_set( 'display_errors', false );
error_reporting( 0 );

include('conectar.php'); 



$login = $_POST["login"];


	$query = mysql_query("INSERT INTO usuarios (login, senha, config, addcadastro, vercadastro, adddemanda, verdemanda, editdemanda, verrelatorio, veraniversario, excluirdemanda, nivel) VALUES ('$login', 'admin', 1, 1, 1, 1, 1, 1, 1, 1, 1, 0");

	mysql_query($query,$connect);

	echo "<br />" . "Login criado com sucesso!";

?>

<META http-equiv="refresh" content="0;URL=index.php">

