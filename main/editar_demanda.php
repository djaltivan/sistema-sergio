<?php
    $login_cookie = $_COOKIE['login'];
        if(isset($login_cookie)){
ini_set( 'display_errors', false );
error_reporting( 0 );
include('conectar.php');
?>
<!DOCTYPE html>
<?php
   $result = mysql_query("SELECT * FROM demandas");
   $num_rows = mysql_num_rows($result);
   $query = sprintf("SELECT * FROM demandas WHERE iddemandas = ".$_GET['iddemandas']."");
   $dados = mysql_query($query, $connect) or die(mysql_error());
   $linhademanda = mysql_fetch_assoc($dados);
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
<title>:: Editar Demanda ::</title>
<script type="text/javascript" language="javascript">
function mostrarResultado(box,num_max,campospan){
	var contagem_carac = box.length;
	if (contagem_carac != 0){
		document.getElementById(campospan).innerHTML = contagem_carac + " caracteres digitados";
		if (contagem_carac == 1){
			document.getElementById(campospan).innerHTML = contagem_carac + " caracter digitado";
		}
		if (contagem_carac >= num_max){
			document.getElementById(campospan).innerHTML = "Limite de caracteres excedido!";
		}
	}else{
		document.getElementById(campospan).innerHTML = "Ainda não temos nada digitado..";
	}
}

function contarCaracteres(box,valor,campospan){
	var conta = valor - box.length;
	document.getElementById(campospan).innerHTML = "Você ainda pode digitar " + conta + " caracteres";
	if(box.length >= valor){
		document.getElementById(campospan).innerHTML = "Opss.. você não pode mais digitar..";
		document.getElementById("campo").value = document.getElementById("campo").value.substr(0,valor);
	}	
}

</script>
</head>
<body>
<h2 align="left">Editar Demanda</h2>
<div class="fundo">
			  <form action="funcao_atualizar_demanda.php" method="POST" enctype="multipart/form-data">
				  <table align="left" style="margin: 0 auto; font-family: Arial;">
					<tr align="right">
						<td width="150">
							Id Demanda:<br>Id Pessoa:
						</td>
						<td width="300" align="left">
						<input name="iddemandas" type="text" id="iddemandas" value="<?=$linhademanda['iddemandas']?>" size="5" readonly>
						<br>
						<input name="idcliente" type="text" id="idcliente" value="<?=$_GET['idcliente']?>" size="5" readonly>
<?php $linha_excluirdemanda = mysql_fetch_assoc(mysql_query("SELECT * FROM usuarios WHERE login = '".$login_cookie."'", $connect));
if(empty($linha_excluirdemanda['excluirdemanda'])){ ?>
<?php }else{ ?>
						<a border="0" href="funcao_apagar_demanda.php?iddemanda=<?=$linhademanda['iddemandas']?>&demanda=<?=$linhademanda['demanda']?>&idcliente=<?=$_GET['idcliente']?>">Excluir Demanda</a>
<?php } ?>
						</td>
					</tr>
<?php $linha_editdemanda = mysql_fetch_assoc(mysql_query("SELECT * FROM usuarios WHERE login = '".$login_cookie."'", $connect));
if(empty($linha_editdemanda['editdemanda'])){ ?>
					<tr align="right">
						<td>Demanda:</td><td width="300" align="left"><input name="demanda" type="text" id="demanda" autocomplete="off" value="<?=$linhademanda['demanda']?>" readonly style="width: 400px;"></td>
					</tr>
					<tr align="right">
						<td>Relatório:</td><td width="300" align="left">
						<textarea name="descricao" type="text" id="campo" onkeyup="mostrarResultado(this.value,2000,'spcontando');contarCaracteres(this.value,2000,'sprestante')" value="<?=$linhademanda['descricao']?>" readonly style="width: 400px; height: 150px;"><?=$linhademanda['descricao']?></textarea><br />
						<span id="spcontando" style="font-family:Georgia;">Ainda não temos nada digitado..</span><br />
						<span id="sprestante" style="font-family:Georgia;"></span></td>
					</tr>
					<tr align="right">
						<td>Status:</td><td width="300" align="left"><input name="status" type="text" id="status" autocomplete="off" value="<?=$linhademanda['status']?>" readonly style="width: 400px;"></td>
					</tr>
					<tr align="right">
						<td>Data Inicio:</td><td width="300" align="left"><input name="data_inicio" type="date" id="data_inicio" autocomplete="off" value="<?=$linhademanda['data_inicio']?>" readonly style="width: 400px;"></td>
					</tr>
					<tr align="right">
						<td>Data Termino:</td><td width="300" align="left"><input name="data_termino" type="date" id="data_termino" autocomplete="off" value="<?=$linhademanda['data_termino']?>" readonly style="width: 400px;"></td>
					</tr>
					<tr align="right">
						<td>Cod. Atendente:</td>
						<td width="300" align="left">
							<input name="atendente" type="text" id="atendente" autocomplete="off" value="<?=$linhademanda['atendente']?>" readonly style="width: 50px;">
						Ver atendente: <a border="0" href="ver_detalhe.php?idcliente=<?=$linhademanda['atendente']?>">
<?php
   $query = sprintf("SELECT * FROM clientes WHERE idcliente = ".$linhademanda['atendente']."");
   $dados = mysql_query($query, $connect) or die(mysql_error());
   $linhademanda = mysql_fetch_assoc($dados);
   $total = mysql_num_rows($dados);
?>
						<?=$linhademanda['nome']?></a>
						</td>
					</tr>
<?php }else{ ?>
					<tr align="right">
						<td>Demanda:</td><td width="300" align="left"><input name="demanda" type="text" id="demanda" autocomplete="off" value="<?=$linhademanda['demanda']?>" style="width: 400px;"></td>
					</tr>
					<tr align="right">
						<td>Relatório:</td><td width="300" align="left">
						<textarea name="descricao" type="text" id="campo" onkeyup="mostrarResultado(this.value,2000,'spcontando');contarCaracteres(this.value,2000,'sprestante')" value="<?=$linhademanda['descricao']?>" style="width: 400px; height: 150px;"><?=$linhademanda['descricao']?></textarea><br />
						<span id="spcontando" style="font-family:Georgia;">Ainda não temos nada digitado..</span><br />
						<span id="sprestante" style="font-family:Georgia;"></span></td>
					</tr>
					<tr align="right">
						<td>Status:</td><td width="300" align="left">
						<select name="status" type="text" id="status" style="width: 400px;">
						  <option selected value="<?=$linhademanda['status']?>"><?=$linhademanda['status']?></option>
						  <option value="1 - Solicitado">1 - Solicitado</option>
						  <option value="2 - Em Processo">2 - Em Processo</option>
						  <option value="3 - Concluido">3 - Concluido</option>
						  <option value="4 - Cancelado">4 - Cancelado</option>
						  <option value="5 - Finalizado">5 - Finalizado</option>
						</select>
						</td>
					</tr>
					<tr align="right">
						<td>Data Inicio:</td><td width="300" align="left"><input name="data_inicio" type="date" id="data_inicio" autocomplete="off" value="<?=$linhademanda['data_inicio']?>" style="width: 400px;"></td>
					</tr>
					<tr align="right">
						<td>Data Termino:</td><td width="300" align="left"><input name="data_termino" type="date" id="data_termino" autocomplete="off" value="<?=$linhademanda['data_termino']?>" style="width: 400px;"></td>
					</tr>
					<tr align="right">
						<td>Cod. Atendente:</td>
						<td width="300" align="left">
							<input name="atendente" type="text" id="atendente" autocomplete="off" value="<?=$linhademanda['atendente']?>" style="width: 50px;">
						Ver atendente: <a border="0" href="ver_detalhe.php?idcliente=<?=$linhademanda['atendente']?>">
<?php
   $query = sprintf("SELECT * FROM clientes WHERE idcliente = ".$linhademanda['atendente']."");
   $dados = mysql_query($query, $connect) or die(mysql_error());
   $linhademanda = mysql_fetch_assoc($dados);
   $total = mysql_num_rows($dados);
?>
						<?=$linhademanda['nome']?></a>
						</td>
					</tr>
<?php } ?>
					<tr>
						<td colspan="2" align="right"><input type="submit" value="Atualizar"/><input type="button" value="Cancelar" onClick="history.go(-1)"></td>
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
