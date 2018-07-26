<?php
ini_set( 'display_errors', false );
error_reporting( 0 );
include('conectar.php'); 

$guardarfoto = $_POST["guardarfoto"];	
$nome = $_POST["nome"];
$id = $_POST["idcliente"];
$descricao = $_POST["descricao"];
$dia = $_POST["dia"];
$mes = $_POST["mes"];
$ano = $_POST["ano"];
$foto = $_FILES["foto"];
$email = $_POST["email"];
$rua = $_POST["rua"];
$numero = $_POST["numero"];
$complemento = $_POST["complemento"];
$bairro = $_POST["bairro"];
$cidade = $_POST["cidade"];
$estado = $_POST["uf"];
$cep = $_POST["cep"];
$fixo = $_POST["fixo"];
$oi = $_POST["oi"];
$tim = $_POST["tim"];
$vivo = $_POST["vivo"];
$claro = $_POST["claro"];
$nextel = $_POST["nextel"];
$nextelid = $_POST["nextelid"];
$rg = $_POST["rg"];
$cpf = $_POST["cpf"];
$profissao = $_POST["profissao"];
$naturalidade = $_POST["naturalidade"];
$responsavel = $_POST["responsavel"];
$sexo = $_POST["sexo"];
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


   // Se não houver nenhum erro
 if (count($error) == 0) {

   // Pega extensão da imagem
 preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto["name"], $ext);

   // Gera um nome único para a imagem
 $nome_imagem = md5(uniqid(time())) . "." . $ext[1];

   // Caminho de onde ficará a imagem
 $caminho_imagem = "fotos/" . $nome_imagem;

if ($guardarfoto == "guardarfoto") {
   // Faz o upload da imagem para seu respectivo caminho
 move_uploaded_file($foto["tmp_name"], $caminho_imagem);
}

}
	$query = mysql_query("UPDATE clientes SET nome=UPPER('$nome'), descricao=UPPER('$descricao'), email=LOWER('$email'), rua=UPPER('$rua'), numero='$numero', complemento='$complemento', bairro=UPPER('$bairro'), cidade=UPPER('$cidade'), estado=UPPER('$estado'), cep='$cep', fixo='$fixo', oi='$oi', tim='$tim', vivo='$vivo', claro='$claro', nextel='$nextel', nextelid='$nextelid', rg='$rg', cpf='$cpf', profissao=UPPER('$profissao'), naturalidade=UPPER('$naturalidade'), responsavel=UPPER('$responsavel'), sexo=LOWER('$sexo'), dia='$dia', mes=LOWER('$mes'), ano='$ano', g1='$g1', g2='$g2', g3='$g3', g4='$g4', g5='$g5', g6='$g6', g7='$g7', g8='$g8', g9='$g9', g10='$g10', g11='$g11', g12='$g12', g13='$g13', g14='$g14', g15='$g15', g16='$g16', g17='$g17', g18='$g18', g19='$g19', g20='$g20' WHERE idcliente='$id'");
	mysql_query($query,$connect);
	echo "<br />" . "Dados alterados com sucesso! 111";

if ($guardarfoto == "guardarfoto") {
	$query = mysql_query("UPDATE clientes SET foto='$nome_imagem' WHERE idcliente='$id'");
	mysql_query($query,$connect);
	echo "<br />" . "Foto alterada com sucesso!";
}

    $login_cookie = $_COOKIE['login'];
   $local_cookie = $_COOKIE['local'];
	mysql_query("insert into log (datahora, user, log1, log2, tipo, local)values(now(),'".$login_cookie."','$id','$nome','Atualizou Pessoa: ','".$local."')");

?>
<META http-equiv="refresh" content="0;URL=ver_detalhe.php?idcliente=<?=$id?>">