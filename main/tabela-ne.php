<table align="left" border=1px solid bordercolor="#000" cellspacing=0>
		<tr align=center bgcolor="#fff"><h6>
			<td colspan="8">
				<strong>Total de registros: <?php echo $num_rows; ?></strong>
			</td>
		</h6></tr>
		<tr align=center bgcolor="#fff"><h6>
			<td width=300>
				<strong>Nome</strong>
			</td>
			<td width=100>
				<strong>Rua</strong>
			</td>
			<td width=100>
				<strong>Numero</strong>
			</td>
			<td width=100>
				<strong>Complemento</strong>
			</td>
			<td width=100>
				<strong>Bairro</strong>
			</td>
			<td width=100>
				<strong>Cidade</strong>
			</td>
			<td width=100>
				<strong>Estado</strong>
			</td>
			<td width=100>
				<strong>Cep</strong>
			</td>
		</h6></tr>
<?php
	if($total > 0) {
		do {
?>
		<tr>
			<td align=left><?=$linha['nome']?></td>
			<td align=center><?=$linha['rua']?></td>
			<td align=center><?=$linha['numero']?></td>
			<td align=center><?=$linha['complemento']?></td>
			<td align=center><?=$linha['bairro']?></td>
			<td align=center><?=$linha['cidade']?></td>
			<td align=center><?=$linha['estado']?></td>
			<td align=center><?=$linha['cep']?></td>
		</tr>
<?php
		}while($linha = mysql_fetch_assoc($dados));
	}
?>
<tr>
			<td align=left bgcolor="#fff">
				<input type=button value="Refresh" onClick="window.location.reload()">
			</td>
			<td colspan="9" align=center bgcolor="#fff"></td>
</tr>
<tr align="right">
			<td colspan="9" align="left">
<?php
	include('rodape.php'); 
?>
	</td>
</tr>
</table>
