<?php
ini_set( 'display_errors', false );
error_reporting( 0 );
include('conectar.php');
  $logoff = '';
	setcookie("login",$logoff);
	mysql_close($connect);
	header("Location:login.php");
?>