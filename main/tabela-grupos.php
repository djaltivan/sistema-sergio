<table align="left" border=1px solid bordercolor="#000" cellspacing=0>
		<tr align=center bgcolor="#fff"><h6>
			<td colspan="7">
				<strong>Total de registros: <?php echo $num_rows; ?></strong>
			</td>
		</h6></tr>
		<tr align=center bgcolor="#fff"><h6>
			<td width=60>
				<strong>Cod</strong>
			</td>
			<td width=35>
				<strong>Foto</strong>
			</td>
			<td width=300>
				<strong>Nome</strong>
			</td>
			<td width=300>
				<strong>Descrição</strong>
			</td>
			<td width=250>
				<strong>Profissão</strong>
			</td>
			<td width=250>
				<strong>Responsável</strong>
			</td>
			<td width=200>
				<strong>Data Cadastro</strong>
			</td>
		</h6></tr>
<?php
	if($total > 0) {
		do {
?>
		<tr><h5>
			<td align=center><font color=black face="Verdana" size=2><?=$linha['idcliente']?></font></td>
			<td align=center><a border="0" href="/sistema-sergio/main/fotos/<?=$linha['foto']?>"><img border="0" src="/sistema-sergio/main/fotos/<?=$linha['foto']?>" alt="img" width="35" height="40"></a></td>
			<td align=center><h4><a border="0" href="ver_detalhe.php?idcliente=<?=$linha['idcliente']?>"><?=$linha['nome']?></a></h4></td>
			<td align=center><h4><a border="0" href="ver_detalhe.php?idcliente=<?=$linha['idcliente']?>"><?=$linha['descricao']?></a></h4></td>
			<td align=center><h4><a border="0" href="ver_detalhe.php?idcliente=<?=$linha['idcliente']?>"><?=$linha['profissao']?></a></h4></td>
			<td align=center><h4><a border="0" href="ver_detalhe.php?idcliente=<?=$linha['idcliente']?>"><?=$linha['responsavel']?></a></h4></td>
			<td align=center><h4><a border="0" href="ver_detalhe.php?idcliente=<?=$linha['idcliente']?>"><?=$linha['data_cadastro']?></a></h4></td>
		</h5></tr>
<?php
		}while($linha = mysql_fetch_assoc($dados));
	}
?>
<tr>
			<td align=left bgcolor="#fff">
				<input type=button value="Refresh" onClick="window.location.reload()">
			</td>
			<td colspan="6" align=center bgcolor="#fff"></td>
</tr>
<tr align="right">
			<td colspan="7" align="left">
<?php
	include('rodape.php'); 
?>
	</td>
</tr>
</table>
