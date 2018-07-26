<?php
ini_set( 'display_errors', false );
error_reporting( 0 );
include('conectar.php'); 

$idcliente = $_POST['idcliente'];
$id = $_POST["iddemandas"];
$demanda = $_POST["demanda"];
$descricao = $_POST["descricao"];
$status = $_POST["status"];
$data_inicio = $_POST["data_inicio"];
$data_termino = $_POST["data_termino"];
$atendente = $_POST["atendente"];

	$query = mysql_query("UPDATE demandas SET demanda='$demanda', descricao='$descricao', status='$status', data_inicio='$data_inicio' , data_termino='$data_termino' , atendente='$atendente' WHERE iddemandas='$id'");
	mysql_query($query,$connect);
	echo "<br />" . "Textos alterados com sucesso!";

    $login_cookie = $_COOKIE['login'];
   $local_cookie = $_COOKIE['local'];
	mysql_query("insert into log (datahora, user, log1, log2, tipo, local)values(now(),'".$login_cookie."','".$id."','".$demanda."','Atualizou Demanda: ','".$local."')");
?>
<META http-equiv="refresh" content="0;URL=demanda_frame.php?idcliente=<?=$idcliente?>&iddemandas=<?=$id?>">

<?=$idcliente?>
<br>
<?=$id?>