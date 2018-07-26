<?php
ini_set( 'display_errors', false );
error_reporting( 0 );
include('conectar.php');
?>
<div class="linha2">
	<a href="main.php">
	<div class="tile5 prata5">
		<img src="icon/logo.png"/><br />
	</div>
	</a>				
	<a href="main.php">
	<div class="tile2 prata2">
		<img src="icon/home.png"/><br />
		<h3>Home</h3>
	</div>
	</a>				
<?php $linha_addcadastro = mysql_fetch_assoc(mysql_query("SELECT * FROM usuarios WHERE login = '".$login_cookie."'", $connect));
if(empty($linha_addcadastro['addcadastro'])){ ?>
<?php }else{ ?>
	<a href="cadastrar.php">
	<div class="tile2 prata2">
		<img src="icon/cadastrar.png"/><br />
		<h3>Cadastrar</h3>
	</div>
	</a>				
<?php } ?>
<?php $linha_vercadastro = mysql_fetch_assoc(mysql_query("SELECT * FROM usuarios WHERE login = '".$login_cookie."'", $connect));
if(empty($linha_vercadastro['vercadastro'])){ ?>
<?php }else{ ?>
	<a href="gtodos.php">
	<div class="tile2 prata2">
		<img src="icon/cadastros.png"/><br />
		<h3>Ver Cadastros</h3>
	</div>
	</a>				
<?php } ?>
<?php $linha_verdemanda = mysql_fetch_assoc(mysql_query("SELECT * FROM usuarios WHERE login = '".$login_cookie."'", $connect));
if(empty($linha_verdemanda['verdemanda'])){ ?>
<?php }else{ ?>
	<a href="demandas.php">
	<div class="tile2 prata2">
		<img src="icon/demandas.png"/><br />
		<h3>Demandas</h3>
	</div>
	</a>
<?php } ?>
<?php $linha_verrelatorio = mysql_fetch_assoc(mysql_query("SELECT * FROM usuarios WHERE login = '".$login_cookie."'", $connect));
if(empty($linha_verrelatorio['verrelatorio'])){ ?>
<?php }else{ ?>
	<a href="relatorios.php">
	<div class="tile2 prata2">
		<img src="icon/relatorios.png"/><br />
		<h3>Relatórios</h3>
	</div>
	</a>				
<?php } ?>
<?php $linha_veraniversario = mysql_fetch_assoc(mysql_query("SELECT * FROM usuarios WHERE login = '".$login_cookie."'", $connect));
if(empty($linha_veraniversario['veraniversario'])){ ?>
<?php }else{ ?>
	<a href="aniversariantes.php?mes='janeiro'">
	<div class="tile2 prata2">
		<img src="icon/aniversariantes.png"/><br />
		<h3>Aniversáriantes</h3>
	</div>
	</a>				
<?php } ?>
	<a href="logoff.php">
	<div class="tile2 prata2">
		<img src="icon/sair.png"/><br />
		<h3>Sair</h3>
	</div>
	</a>
	<a href="config.php">
	<div class="tile2 prata2">
		<img src="icon/config.png"/><br />
		<h3>Config.</h3>
	</div>
	</a>
</div>
