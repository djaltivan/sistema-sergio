<table align="left" border=1px solid bordercolor="#000" cellspacing=0>
		<tr align=center bgcolor="#fff"><h6>
			<td colspan="47">
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
				<strong>Data Nascimento</strong>
			</td>
			<td width=250>
				<strong>rua</strong>
			</td>
			<td width=200>
				<strong>numero</strong>
			</td>
			<td width=200>
				<strong>complemento</strong>
			</td>
			<td width=200>
				<strong>bairro</strong>
			</td>
			<td width=200>
				<strong>cidade</strong>
			</td>
			<td width=200>
				<strong>estado</strong>
			</td>
			<td width=200>
				<strong>cep</strong>
			</td>
			<td width=200>
				<strong>email</strong>
			</td>
			<td width=200>
				<strong>fixo</strong>
			</td>
			<td width=200>
				<strong>oi</strong>
			</td>
			<td width=200>
				<strong>tim</strong>
			</td>
			<td width=200>
				<strong>vivo</strong>
			</td>
			<td width=200>
				<strong>claro</strong>
			</td>
			<td width=200>
				<strong>nextel</strong>
			</td>
			<td width=200>
				<strong>nextelid</strong>
			</td>
			<td width=200>
				<strong>sexo</strong>
			</td>
			<td width=200>
				<strong>rg</strong>
			</td>
			<td width=200>
				<strong>cpf</strong>
			</td>
			<td width=200>
				<strong>profissao</strong>
			</td>
			<td width=200>
				<strong>naturalidade</strong>
			</td>
			<td width=200>
				<strong>responsavel</strong>
			</td>
			<td width=200>
				<strong>data_cadastro</strong>
			</td>
			<td width=200>
				<strong>g1</strong>
			</td>
			<td width=200>
				<strong>g2</strong>
			</td>
			<td width=200>
				<strong>g3</strong>
			</td>
			<td width=200>
				<strong>g4</strong>
			</td>
			<td width=200>
				<strong>g5</strong>
			</td>
			<td width=200>
				<strong>g6</strong>
			</td>
			<td width=200>
				<strong>g7</strong>
			</td>
			<td width=200>
				<strong>g8</strong>
			</td>
			<td width=200>
				<strong>g9</strong>
			</td>
			<td width=200>
				<strong>g10</strong>
			</td>
			<td width=200>
				<strong>g11</strong>
			</td>
			<td width=200>
				<strong>g12</strong>
			</td>
			<td width=200>
				<strong>g13</strong>
			</td>
			<td width=200>
				<strong>g14</strong>
			</td>
			<td width=200>
				<strong>g15</strong>
			</td>
			<td width=200>
				<strong>g16</strong>
			</td>
			<td width=200>
				<strong>g17</strong>
			</td>
			<td width=200>
				<strong>g18</strong>
			</td>
			<td width=200>
				<strong>g19</strong>
			</td>
			<td width=200>
				<strong>g20</strong>
			</td>
		</h6></tr>
<?php
	if($total > 0) {
		do {
?>
		<tr>
			<td align=center><font color=black face="Verdana" size=2><?=$linha['idcliente']?></font></td>
			<td align=center><h4>/sistema-sergio/main/fotos/<?=$linha['foto']?></h4></td>
			<td align=center><h4><?=$linha['nome']?></h4></td>
			<td align=center><h4><?=$linha['descricao']?></h4></td>
			<td align=center><h4><?=$linha['data_nascimento']?></h4></td>
			<td align=center><h4><?=$linha['rua']?></h4></td>
			<td align=center><h4><?=$linha['numero']?></h4></td>
			<td align=center><h4><?=$linha['complemento']?></h4></td>
			<td align=center><h4><?=$linha['bairro']?></h4></td>
			<td align=center><h4><?=$linha['cidade']?></h4></td>
			<td align=center><h4><?=$linha['estado']?></h4></td>
			<td align=center><h4><?=$linha['cep']?></h4></td>
			<td align=center><h4><?=$linha['email']?></h4></td>
			<td align=center><h4><?=$linha['fixo']?></h4></td>
			<td align=center><h4><?=$linha['oi']?></h4></td>
			<td align=center><h4><?=$linha['tim']?></h4></td>
			<td align=center><h4><?=$linha['vivo']?></h4></td>
			<td align=center><h4><?=$linha['claro']?></h4></td>
			<td align=center><h4><?=$linha['nextel']?></h4></td>
			<td align=center><h4><?=$linha['nextelid']?></h4></td>
			<td align=center><h4><?=$linha['sexo']?></h4></td>
			<td align=center><h4><?=$linha['rg']?></h4></td>
			<td align=center><h4><?=$linha['cpf']?></h4></td>
			<td align=center><h4><?=$linha['profissao']?></h4></td>
			<td align=center><h4><?=$linha['naturalidade']?></h4></td>
			<td align=center><h4><?=$linha['responsavel']?></h4></td>
			<td align=center><h4><?=$linha['data_cadastro']?></h4></td>
			<td align=center><h4><?=$linha['g1']?></h4></td>
			<td align=center><h4><?=$linha['g2']?></h4></td>
			<td align=center><h4><?=$linha['g3']?></h4></td>
			<td align=center><h4><?=$linha['g4']?></h4></td>
			<td align=center><h4><?=$linha['g5']?></h4></td>
			<td align=center><h4><?=$linha['g6']?></h4></td>
			<td align=center><h4><?=$linha['g7']?></h4></td>
			<td align=center><h4><?=$linha['g8']?></h4></td>
			<td align=center><h4><?=$linha['g9']?></h4></td>
			<td align=center><h4><?=$linha['g10']?></h4></td>
			<td align=center><h4><?=$linha['g11']?></h4></td>
			<td align=center><h4><?=$linha['g12']?></h4></td>
			<td align=center><h4><?=$linha['g13']?></h4></td>
			<td align=center><h4><?=$linha['g14']?></h4></td>
			<td align=center><h4><?=$linha['g15']?></h4></td>
			<td align=center><h4><?=$linha['g16']?></h4></td>
			<td align=center><h4><?=$linha['g17']?></h4></td>
			<td align=center><h4><?=$linha['g18']?></h4></td>
			<td align=center><h4><?=$linha['g19']?></h4></td>
			<td align=center><h4><?=$linha['g20']?></h4></td>
		</tr>
<?php
		}while($linha = mysql_fetch_assoc($dados));
	}
?>
<tr align="right">
			<td colspan="47" align="left">
<?php
	include('rodape.php'); 
?>
	</td>
</tr>
</table>
