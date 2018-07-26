<?
ini_set( 'display_errors', false );
error_reporting( 0 );
include('conectar.php');

	$array_file = file("fontetexto.sql");
	$string_file = implode(" ", $array_file);
	$result = mysql_query($string_file);
?>