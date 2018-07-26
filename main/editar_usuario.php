<?php
    $login_cookie = $_COOKIE['login'];
        if(isset($login_cookie)){
ini_set( 'display_errors', false );
error_reporting( 0 );
?>
<!DOCTYPE html>
<?php
include('conectar.php'); 
   $result = mysql_query("SELECT * FROM clientes");
   $num_rows = mysql_num_rows($result);
   $query = sprintf("SELECT * FROM clientes");
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
<title>:: Editar Usuário ::</title>
</head>
<body>
<div class="fundo">
	<div id="area">
		<form id="formulario" autocomplete="off" method="POST" action="alterar_senha.php">
			<fieldset>
				<legend>Alterar Senha - Logado como: <?php echo $_COOKIE['login']; ?></legend>
                <table align="left" style="margin: 0 auto; font-family: Arial;">
                	<tr align="right">
						<td width="110">Login:</td><td width="180"><input type="text" name="login" id="login" value="<?php echo $_COOKIE['login']; ?>" readonly><br></td>
					</tr>
					<tr align="right">
                    	<td width="110">Nova Senha:</td><td width="180"><input type="password" name="senha" id="senha"><br></td>
					</tr>
					<tr align="right">
                    	<td width="110" colspan="2"><input class="btn_submit" type="submit" value="Alterar" id="alterar" name="alterar"><br></td>
					</tr>
					<tr align="right">
						<td width="84" colspan="2"><a href="login.php">Clique aqui para entrar</a><br><br><a href="config.php">Voltar</a></td>
					</tr>
				</table>
			</fieldset>
		</form>
	</div>
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

