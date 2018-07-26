<?php
ini_set( 'display_errors', false );
error_reporting( 0 );
include('conectar.php');

$nome = $_POST["nome"];
$descricao = $_POST["descricao"];
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
$dia = $_POST["dia"];
$mes = $_POST["mes"];
$ano = $_POST["ano"];
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



   // Faz o upload da imagem para seu respectivo caminho

 move_uploaded_file($foto["tmp_name"], $caminho_imagem);






}

	mysql_query("insert into clientes (nome, descricao, foto, email, rua, numero, complemento, bairro, cidade, estado, cep, fixo, oi, tim, vivo, claro, nextel, nextelid, rg, cpf, profissao, naturalidade, responsavel, sexo, dia, mes, ano, g1, g2, g3, g4, g5, g6, g7, g8, g9, g10, g11, g12, g13, g14, g15, g16, g17, g18, g19, g20, data_cadastro)values(UPPER('$nome'), UPPER('$descricao'), '$nome_imagem', LOWER('$email'), UPPER('$rua'), '$numero', '$complemento', UPPER('$bairro'), UPPER('$cidade'), UPPER('$estado'), '$cep', '$fixo', '$oi', '$tim', '$vivo', '$claro', '$nextel', '$nextelid', '$rg', '$cpf', UPPER('$profissao'), UPPER('$naturalidade'), UPPER('$responsavel'), LOWER('$sexo'), '$dia', LOWER('$mes'), '$ano', '$g1', '$g2', '$g3', '$g4', '$g5', '$g6', '$g7', '$g8', '$g9', '$g10', '$g11', '$g12', '$g13', '$g14', '$g15', '$g16', '$g17', '$g18', '$g19', '$g20', now())");

	echo "<br />" . "Cliente cadastrado com sucesso!";

    $login_cookie = $_COOKIE['login'];
   $local_cookie = $_COOKIE['local'];
	mysql_query("insert into log (datahora, user, log1, log2, tipo, local)values(now(),'".$login_cookie."',' ','$nome','Cadastrou Pessoa: ','".$local."')");

?>
<META http-equiv="refresh" content="0;URL=cadastrar.php"> 