<?php

include('conectar.php');

$login = $_POST["login"];

	mysql_query("insert into usuarios (login, senha, config, addcadastro, vercadastro, adddemanda, verdemanda, editdemanda, verrelatorio, veraniversario, excluirdemanda, nivel, log)values
					('$login', '827ccb0eea8a706c4c34a16891f84e7b', '0', '0', '1', '0', '1', '0', '1', '1', '0', '0', '0')");


	echo "<br />" . "Usuário cadastrado com sucesso! Sua senha é: 12345";

?>
<META http-equiv="refresh" content="3;URL=editar_nivel.php?id=00009">