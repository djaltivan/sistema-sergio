<table align="left" border=1px solid bordercolor="#000" cellspacing=0>
		<tr align=center bgcolor="#fff"><h6>
			<td colspan="9">
				<strong>Total de registros: <?php echo $num_rows; ?></strong>
			</td>
		</h6></tr>
		<tr align=center bgcolor="#fff"><h6>
			<td width=300>
				<strong>Nome</strong>
			</td>
			<td width=100>
				<strong>Fixo</strong>
			</td>
			<td width=100>
				<strong>Oi</strong>
			</td>
			<td width=100>
				<strong>Tim</strong>
			</td>
			<td width=100>
				<strong>Vivo</strong>
			</td>
			<td width=100>
				<strong>Claro</strong>
			</td>
			<td width=100>
				<strong>Nextel</strong>
			</td>
			<td width=100>
				<strong>Nextel Id</strong>
			</td>
			<td width=200>
				<strong>E-mail</strong>
			</td>
		</h6></tr>
<?php
	if($total > 0) {
		do {
?>
		<tr>
			<td align=left><?=$linha['nome']?></td>
			<td align=center><?=$linha['fixo']?></td>
			<td align=center><?=$linha['oi']?></td>
			<td align=center><?=$linha['tim']?></td>
			<td align=center><?=$linha['vivo']?></td>
			<td align=center><?=$linha['claro']?></td>
			<td align=center><?=$linha['nextel']?></td>
			<td align=center><?=$linha['nextelid']?></td>
			<td align=center><?=$linha['email']?></td>
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
