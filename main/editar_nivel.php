<?php
    $login_cookie = $_COOKIE['login'];
        if(isset($login_cookie)){
ini_set( 'display_errors', false );
error_reporting( 0 );
include('conectar.php');
?>
<?php $linha_nivel = mysql_fetch_assoc(mysql_query("SELECT * FROM usuarios WHERE login = '".$login_cookie."'", $connect));
if(empty($linha_nivel['nivel'])){ ?>
acesso negado para edição de nível de acesso
<?php }else{ ?>
<!DOCTYPE html>
<?php
   $result = mysql_query("SELECT * FROM usuarios");
   $num_rows = mysql_num_rows($result);
   $query = sprintf("SELECT * FROM usuarios");
   $dados = mysql_query($query, $connect) or die(mysql_error());
   $linha_usuarios = mysql_fetch_assoc($dados);
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
   <script src="js/script.js"></script>
<title>:: Editar Nivel de Acesso ::</title>
</head>
<body>
<table align="left" border=1px solid bordercolor="#fff" cellspacing=0>
<tr align=center>
<td width=500>
<h2 align="left">Editar Nível de Acesso - Você está logado como: <?php echo $_COOKIE['login']; ?></h2>
	<fieldset>
	<legend>Usuários Cadastrados</legend>
<table align="left" border=1px solid bordercolor="#fff" cellspacing=0>
		<br><a href="add_usuario.php">Novo Usuário</a> - <a href="config.php">Voltar</a>
		<tr>
					<td></td>
					<td></td>
		</tr>
		<tr align=center bgcolor="#fff"><h6>
			<td width=100>
				<strong>Cod</strong>
			</td>
			<td width=350>
				<strong>Login</strong>
			</td>
		</h6></tr>
<?php
	if($total > 0) {
		do {
?>
		<tr><h5>
			<td align=center><font color=black face="Verdana" size=2><a href="editar_nivel.php?id=<?=$linha_usuarios['ID']?>"><?=$linha_usuarios['ID']?></a></font></td>
			<td align=left><font color=black face="Verdana" size=2><a href="editar_nivel.php?id=<?=$linha_usuarios['ID']?>"><?=$linha_usuarios['login']?></a> --------- <a href="excluir_usuario.php?id=<?=$linha_usuarios['ID']?>">Excluir</a></font></td>
		</h5></tr>
<?php
		}while($linha_usuarios = mysql_fetch_assoc($dados));
	}
?>
</table>
	</fieldset>

</td>
</tr>
<tr align=center>
<td>

<?php
   $query = sprintf("SELECT * FROM usuarios WHERE ID = ".$_GET['id']."");
   $dados = mysql_query($query, $connect) or die(mysql_error());
   $linha_nivel = mysql_fetch_assoc($dados);
?>
<form action="funcao_atualizar_nivel.php" method="POST" enctype="multipart/form-data">
	<fieldset>
	<legend>Alteração de Nível</legend>
				  <table align="left" style="margin: 0 auto; font-family: Arial;">
					<tr>
						<td width="250" align="right">Id:</td>
						<td width="100" align="left">
							<input name="ID" type="text" id="ID" value="<?=$linha_nivel['ID']?>" size="5" readonly>
						</td>
					</tr>
					<tr>
						<td align="right">Login:</td>
						<td align="left"><?=$linha_nivel['login']?></td>
					</tr>
					<tr>
						<td align="right">Configuração:</td>
						<td align="left">
						<select name="config" type="text" id="config" style="width: 50px;">
						  <option selected value="<?=$linha_nivel['config']?>"><?=$linha_nivel['config']?></option>
						  <option value="0">0</option>
						  <option value="1">1</option>
						</select>
						</td>
					</tr>
					<tr>
						<td align="right">Adicionar Cadastro:</td>
						<td align="left">
						<select name="addcadastro" type="text" id="addcadastro" style="width: 50px;">
						  <option selected value="<?=$linha_nivel['addcadastro']?>"><?=$linha_nivel['addcadastro']?></option>
						  <option value="0">0</option>
						  <option value="1">1</option>
						</select>
						</td>
					</tr>
					<tr>
						<td align="right">Ver Cadastros:</td>
						<td align="left">
						<select name="vercadastro" type="text" id="vercadastro" style="width: 50px;">
						  <option selected value="<?=$linha_nivel['vercadastro']?>"><?=$linha_nivel['vercadastro']?></option>
						  <option value="0">0</option>
						  <option value="1">1</option>
						</select>
						</td>
					</tr>
					<tr>
						<td align="right">Adicionar Demandas:</td>
						<td align="left">
						<select name="adddemanda" type="text" id="adddemanda" style="width: 50px;">
						  <option selected value="<?=$linha_nivel['adddemanda']?>"><?=$linha_nivel['adddemanda']?></option>
						  <option value="0">0</option>
						  <option value="1">1</option>
						</select>
						</td>
					</tr>
					<tr>
						<td align="right">Ver Demandas:</td>
						<td align="left">
						<select name="verdemanda" type="text" id="verdemanda" style="width: 50px;">
						  <option selected value="<?=$linha_nivel['verdemanda']?>"><?=$linha_nivel['verdemanda']?></option>
						  <option value="0">0</option>
						  <option value="1">1</option>
						</select>
						</td>
					</tr>
					<tr>
						<td align="right">Editar Demandas:</td>
						<td align="left">
						<select name="editdemanda" type="text" id="editdemanda" style="width: 50px;">
						  <option selected value="<?=$linha_nivel['editdemanda']?>"><?=$linha_nivel['editdemanda']?></option>
						  <option value="0">0</option>
						  <option value="1">1</option>
						</select>
						</td>
					</tr>
					<tr>
						<td align="right">Excluir Demandas:</td>
						<td align="left">
						<select name="excluirdemanda" type="text" id="excluirdemanda" style="width: 50px;">
						  <option selected value="<?=$linha_nivel['excluirdemanda']?>"><?=$linha_nivel['excluirdemanda']?></option>
						  <option value="0">0</option>
						  <option value="1">1</option>
						</select>
						</td>
					</tr>
					<tr>
						<td align="right">Ver Relatórios:</td>
						<td align="left">
						<select name="verrelatorio" type="text" id="verrelatorio" style="width: 50px;">
						  <option selected value="<?=$linha_nivel['verrelatorio']?>"><?=$linha_nivel['verrelatorio']?></option>
						  <option value="0">0</option>
						  <option value="1">1</option>
						</select>
						</td>
					</tr>
					<tr>
						<td align="right">Ver Aniversários:</td>
						<td align="left">
						<select name="veraniversario" type="text" id="veraniversario" style="width: 50px;">
						  <option selected value="<?=$linha_nivel['veraniversario']?>"><?=$linha_nivel['veraniversario']?></option>
						  <option value="0">0</option>
						  <option value="1">1</option>
						</select>
						</td>
					</tr>
					<tr>
						<td align="right">Nível de Acesso:</td>
						<td align="left">
						<select name="nivel" type="text" id="nivel" style="width: 50px;">
						  <option selected value="<?=$linha_nivel['nivel']?>"><?=$linha_nivel['nivel']?></option>
						  <option value="0">0</option>
						  <option value="1">1</option>
						</select>
						</td>
					</tr>
					<tr>
						<td align="right">Log de Acesso:</td>
						<td align="left">
						<select name="log" type="text" id="log" style="width: 50px;">
						  <option selected value="<?=$linha_nivel['log']?>"><?=$linha_nivel['log']?></option>
						  <option value="0">0</option>
						  <option value="1">1</option>
						</select>
						</td>
					</tr>
					<tr>
						<td align="right">>></td>
						<td align="left"><input type="submit" value="Atualizar"/></td>
					</tr>
				  </table>
	</fieldset>
</form>

</td>
</tr>
<tr align=center>
<td>

<?php
   $result = mysql_query("SELECT * FROM usuarios");
   $num_rows = mysql_num_rows($result);
   $query = sprintf("SELECT * FROM usuarios");
   $dados = mysql_query($query, $connect) or die(mysql_error());
   $linha_usuarios2 = mysql_fetch_assoc($dados);
   $total = mysql_num_rows($dados);
?>
<div id="area">
	<form id="formulario" autocomplete="off" method="POST" action="alterar_senha_2.php">
	<fieldset>
	<legend>Alteração de Senha</legend>
               <table align="left" style="margin: 0 auto; font-family: Arial;">
               	<tr align="right">
			<td width="110">Login:</td>
			<td width="180">
			<select name="login" type="text" id="login" style="width: 200px;">
				<option selected value="<?php echo $_COOKIE['login']; ?>"><?php echo $_COOKIE['login']; ?></option>
				<?php
					if($total > 0) {
						do {
				?>
				<option value="<?=$linha_usuarios2['login']?>"><?=$linha_usuarios2['login']?></option>
				<?php
						}while($linha_usuarios2 = mysql_fetch_assoc($dados));
					}
				?>
			</select>
			</td>
		</tr>
		<tr align="right">
                   		<td width="110">Nova Senha:</td><td width="180"><input type="password" name="senha" id="senha"><br></td>
		</tr>
		<tr align="right">
                   		<td width="110" colspan="2"><input class="btn_submit" type="submit" value="Alterar" id="alterar" name="alterar"><br></td>
		</tr>
		<tr align="right">
			<td width="84" colspan="2"><a href="index.php">Clique aqui para entrar</a></td>
		</tr>
	</table>
	</fieldset>
	</form>
</div>

</td>
</tr>
</table>

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