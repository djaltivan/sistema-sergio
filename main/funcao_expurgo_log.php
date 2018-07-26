<?php
ini_set( 'display_errors', false );
error_reporting( 0 );
include('conectar.php');
mysql_query("DELETE FROM log WHERE datahora < DATE_SUB(NOW(), INTERVAL 6 MONTH);");
?>
Expurgo feito na tabela de logs