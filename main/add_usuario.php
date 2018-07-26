<?php

    $login_cookie = $_COOKIE['login'];

        if(isset($login_cookie)){
ini_set( 'display_errors', false );

error_reporting( 0 );

include('conectar.php');

?>

<?php $linha_nivel = mysql_fetch_assoc(mysql_query("SELECT * FROM usuarios WHERE login = '".$login_cookie."'", $connect));
if(empty($linha_nivel['nivel'])){ ?>

acesso negado para ver cadastro

<?php }else{ ?>

<!DOCTYPE html>

<html>

<head>

   <meta http-equiv="Content-Type" content="text/html;
 charset=ISO-8859-1">

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

   <script src="js/script.js"></script>

<title>:: Cadastrar Usuário ::</title>
</head>
<body>

<hr>
<h2 align="left">:: Cadastrar Usuário ::</h2>

<div class="fundo">

			  <form action="funcao_add_usuario.php" method="POST" enctype="multipart/form-data">

				  <table align="left" style="margin: 0 auto; font-family: Arial;">

					<tr align="right">

						<td width="150">Nome de Usuário:</td><td width="300" align="left"><input name="login" type="text" id="login" size="5"></td>
					</tr>

					<tr>

						<td><input type="submit" value="Adicionar"/></td>

					</tr>

</table>

			  </form>
</div>
</body>
</html>
<?php } ?>
<?php
        }else{
?>
			<p>Faça Login</p>
            <META http-equiv="refresh" content="0;URL=index.php"> 
<?php
        }
?>