﻿<?php
    $login_cookie = $_COOKIE['login'];
        if(isset($login_cookie)){
?>
<!DOCTYPE html>
<?php
include('conectar.php'); 
   $result = mysql_query("SELECT * FROM avisos");
   $num_rows = mysql_num_rows($result);
   $query = sprintf("SELECT * FROM avisos WHERE idavisos = 1");
   $dados = mysql_query($query, $connect) or die(mysql_error());
   $linha = mysql_fetch_assoc($dados);
   $total = mysql_num_rows($dados);

   $resultconfirmacaoleitura = mysql_query("SELECT * FROM confirmacaoleitura");
   $num_rows = mysql_num_rows($resultconfirmacaoleitura);
   $queryconfirmacaoleitura = sprintf("SELECT * FROM confirmacaoleitura");
   $dadosconfirmacaoleitura = mysql_query($queryconfirmacaoleitura, $connect) or die(mysql_error());
   $linhaconfirmacaoleitura = mysql_fetch_assoc($dadosconfirmacaoleitura);
   $totalconfirmacaoleitura = mysql_num_rows($dadosconfirmacaoleitura);
?>
<html>
<head>
   <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="css/styles.css">
   <link rel="stylesheet" href="css/estilo.css"/>
   <style type="text/css">
   <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.0.min.js"></script>
   <script type="text/javascript" src="js/script.js"></script>
   body {
	background-color: #F9F9F9;
	margin-top: 0px;
   }
   </style>
   <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
   <script src="js/script.js"></script>
<title>Editar Avisos</title>
</head>
<body>
<h2 align="left">Editar Avisos</h2>
<div class="fundo">
			  <form action="funcao_atualizar_avisos.php" method="POST" enctype="multipart/form-data">
				  <table align="left" style="margin: 0 auto; font-family: Arial;">
					<tr align="right">
						<td width="100">Titulo:</td><td width="300" align="left"><input name="titulo" type="text" id="titulo" autocomplete="off" value="<?=$linha['titulo']?>" size="80"></td>
					</tr>
					<tr align="right">
						<td width="100">Aviso:</td><td width="300" align="left"><input name="aviso" type="text" id="aviso" autocomplete="off" value="<?=$linha['aviso']?>" size="80"></td>
					</tr>
					<tr align="right">
						<td width="100">Lido por:</td><td width="300" align="left"></td>
					</tr>
					<tr align="right">
						<td width="100"></td>
						<td width="300" align="left">
<?php
	if($totalconfirmacaoleitura > 0) {
		do {
?>
<hr>
Lida em: <?=$linhaconfirmacaoleitura['datahora']?> | Lida por: <?=$linhaconfirmacaoleitura['confirmacaoleitura']?>
<?php
		}while($linhaconfirmacaoleitura = mysql_fetch_assoc($dadosconfirmacaoleitura));
	}
?>
						</td>
					</tr>
					<tr align="right">
						<td width="100">Link:</td><td width="300" align="left"><input name="link" type="text" id="link" autocomplete="off" value="<?=$linha['link']?>" size="80"></td>
					</tr>
					<tr align="right">
						<td></td>
						<td>Atualizado em: <?=$linha['datahora']?> <input type="submit" value="Atualizar"/><br><br><a href="config.php">Voltar</a></td>
					</tr>
				  </table>
			  </form>
		  </div>	  
</body>
</html>
<?php

        }else{

?>

			<p>Faça Login</p>

            <META http-equiv="refresh" content="0;URL=index.php"> 

<?php

        }

?>

