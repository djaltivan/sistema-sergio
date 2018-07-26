<?php
ini_set( 'display_errors', false );
error_reporting( 0 );
include('conectar.php'); 

$g1 = $_POST["g1"];
$g2 = $_POST["g2"];
$g3 = $_POST["g3"];
$g4 = $_POST["g4"];
$g5 = $_POST["g5"];
$g6 = $_POST["g6"];
$g7 = $_POST["g7"];
$g8 = $_POST["g8"];
$g9 = $_POST["g9"];
$g10 = $_POST["g10"];
$g11 = $_POST["g11"];
$g12 = $_POST["g12"];
$g13 = $_POST["g13"];
$g14 = $_POST["g14"];
$g15 = $_POST["g15"];
$g16 = $_POST["g16"];
$g17 = $_POST["g17"];
$g18 = $_POST["g18"];
$g19 = $_POST["g19"];
$g20 = $_POST["g20"];

	$query = mysql_query("UPDATE grupos SET g1='$g1', g2='$g2', g3='$g3', g4='$g4', g5='$g5', g6='$g6', g7='$g7', g8='$g8', g9='$g9', g10='$g10', g11='$g11', g12='$g12', g13='$g13', g14='$g14', g15='$g15', g16='$g16', g17='$g17', g18='$g18', g19='$g19', g20='$g20' WHERE idgrupos=1");
	mysql_query($query,$connect);
	echo "<br />" . "Grupos alterados com sucesso!";
?>
<META http-equiv="refresh" content="0;URL=editar_grupos.php">
