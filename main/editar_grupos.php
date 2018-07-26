<?php
    $login_cookie = $_COOKIE['login'];
        if(isset($login_cookie)){
?>
<!DOCTYPE html>
<?php
include('conectar.php'); 
   $result = mysql_query("SELECT * FROM grupos");
   $num_rows = mysql_num_rows($result);
   $query = sprintf("SELECT * FROM grupos WHERE idgrupos = 1");
   $dados = mysql_query($query, $connect) or die(mysql_error());
   $linha = mysql_fetch_assoc($dados);
   $total = mysql_num_rows($dados);
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
<title>:: Editar Grupos ::</title>
</head>
<body>
<h2 align="left">Editar Grupos</h2>
<div class="fundo">
			  <form action="funcao_atualizar_grupos.php" method="POST" enctype="multipart/form-data">
				  <table align="left" style="margin: 0 auto; font-family: Arial;">
					<tr align="right">
						<td width="90">Grupo - 01:</td><td width="180" align="left"><input name="g1" type="text" id="g1" autocomplete="off" value="<?=$linha['g1']?>" size="20"></td>
						<td width="90">Grupo - 06:</td><td width="180" align="left"><input name="g6" type="text" id="g6" autocomplete="off" value="<?=$linha['g6']?>" size="20"></td>
						<td width="90">Grupo - 11:</td><td width="180" align="left"><input name="g11" type="text" id="g11" autocomplete="off" value="<?=$linha['g11']?>" size="20"></td>
						<td width="90">Grupo - 16:</td><td width="180" align="left"><input name="g16" type="text" id="g16" autocomplete="off" value="<?=$linha['g16']?>" size="20"></td>
					</tr>
					<tr align="right">
						<td>Grupo - 02:</td><td width="180" align="left"><input name="g2" type="text" id="g2" autocomplete="off" value="<?=$linha['g2']?>" size="20"></td>
						<td>Grupo - 07:</td><td width="180" align="left"><input name="g7" type="text" id="g7" autocomplete="off" value="<?=$linha['g7']?>" size="20"></td>
						<td>Grupo - 12:</td><td width="180" align="left"><input name="g12" type="text" id="g12" autocomplete="off" value="<?=$linha['g12']?>" size="20"></td>
						<td>Grupo - 17:</td><td width="180" align="left"><input name="g17" type="text" id="g17" autocomplete="off" value="<?=$linha['g17']?>" size="20"></td>
					</tr>
					<tr align="right">
						<td>Grupo - 03:</td><td width="180" align="left"><input name="g3" type="text" id="g3" autocomplete="off" value="<?=$linha['g3']?>" size="20"></td>
						<td>Grupo - 08:</td><td width="180" align="left"><input name="g8" type="text" id="g8" autocomplete="off" value="<?=$linha['g8']?>" size="20"></td>
						<td>Grupo - 13:</td><td width="180" align="left"><input name="g13" type="text" id="g13" autocomplete="off" value="<?=$linha['g13']?>" size="20"></td>
						<td>Grupo - 18:</td><td width="180" align="left"><input name="g18" type="text" id="g18" autocomplete="off" value="<?=$linha['g18']?>" size="20"></td>
					</tr>
					<tr align="right">
						<td>Grupo - 04:</td><td width="180" align="left"><input name="g4" type="text" id="g4" autocomplete="off" value="<?=$linha['g4']?>" size="20"></td>
						<td>Grupo - 09:</td><td width="180" align="left"><input name="g9" type="text" id="g9" autocomplete="off" value="<?=$linha['g9']?>" size="20"></td>
						<td>Grupo - 14:</td><td width="180" align="left"><input name="g14" type="text" id="g14" autocomplete="off" value="<?=$linha['g14']?>" size="20"></td>
						<td>Grupo - 19:</td><td width="180" align="left"><input name="g19" type="text" id="g19" autocomplete="off" value="<?=$linha['g19']?>" size="20"></td>
					</tr>
					<tr align="right">
						<td>Grupo - 05:</td><td width="180" align="left"><input name="g5" type="text" id="g5" autocomplete="off" value="<?=$linha['g5']?>" size="20"></td>
						<td>Grupo - 10:</td><td width="180" align="left"><input name="g10" type="text" id="g10" autocomplete="off" value="<?=$linha['g10']?>" size="20"></td>
						<td>Grupo - 15:</td><td width="180" align="left"><input name="g15" type="text" id="g15" autocomplete="off" value="<?=$linha['g15']?>" size="20"></td>
						<td>Grupo - 20:</td><td width="180" align="left"><input name="g20" type="text" id="g20" autocomplete="off" value="<?=$linha['g20']?>" size="20"></td>
					</tr>
					<tr align="right">
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td align="right"><input type="submit" value="Atualizar"/><br><br><a href="config.php">Voltar</a></td>
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

