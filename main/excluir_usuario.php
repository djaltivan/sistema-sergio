<?php

ini_set( 'display_errors', false );

error_reporting( 0 );

include('conectar.php');

mysql_query("DELETE FROM usuarios WHERE ID = ".$_GET['id']."");
?>
<META http-equiv="refresh" content="0;URL=editar_nivel.php?id=00009">