<?php
ini_set( 'display_errors', false );
error_reporting( 0 );
include('conectar.php');

   $login_cookie = $_COOKIE['login'];
   $local_cookie = $_COOKIE['local'];
	mysql_query("insert into log (datahora, user, log1, log2, tipo, local)values(now(),'".$login_cookie."',' ',' ','Normalizou textos','".$local."')");

	mysql_query("commit;");
	mysql_query("UPDATE clientes SET nome = UPPER(nome);");
	mysql_query("UPDATE clientes SET email = LOWER(email);");
	mysql_query("UPDATE clientes SET descricao = UPPER(descricao);");
	mysql_query("UPDATE clientes SET rua = UPPER(rua);");
	mysql_query("UPDATE clientes SET complemento = UPPER(complemento);");
	mysql_query("UPDATE clientes SET bairro = UPPER(bairro);");
	mysql_query("UPDATE clientes SET cidade = UPPER(cidade);");
	mysql_query("UPDATE clientes SET estado = UPPER(estado);");
	mysql_query("UPDATE clientes SET profissao = UPPER(profissao);");
	mysql_query("UPDATE clientes SET naturalidade = UPPER(naturalidade);");
	mysql_query("UPDATE clientes SET responsavel = UPPER(responsavel);");
	mysql_query("UPDATE clientes SET sexo = LOWER(sexo);");

?>
Normalização efetuada com sucesso
<META http-equiv="refresh" content="0;URL=config.php">
