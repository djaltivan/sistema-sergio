<?php
   $result = mysql_query("SELECT * FROM grupos");
   $num_rows = mysql_num_rows($result);
   $query = sprintf("SELECT * FROM grupos WHERE idgrupos = 1");
   $dados = mysql_query($query, $connect) or die(mysql_error());
   $linha_grupo = mysql_fetch_assoc($dados);
   $total = mysql_num_rows($dados);
?>
<h2><left>
	<a href="netodos.php">Todos</a> | 
	<a href="ne.php?g=g1&t=<?=$linha_grupo['g1']?>"><?=$linha_grupo['g1']?></a> | 
	<a href="ne.php?g=g2&t=<?=$linha_grupo['g2']?>"><?=$linha_grupo['g2']?></a> | 
	<a href="ne.php?g=g3&t=<?=$linha_grupo['g3']?>"><?=$linha_grupo['g3']?></a> | 
	<a href="ne.php?g=g4&t=<?=$linha_grupo['g4']?>"><?=$linha_grupo['g4']?></a> | 
	<a href="ne.php?g=g5&t=<?=$linha_grupo['g5']?>"><?=$linha_grupo['g5']?></a> | 
	<a href="ne.php?g=g6&t=<?=$linha_grupo['g6']?>"><?=$linha_grupo['g6']?></a> | 
	<a href="ne.php?g=g7&t=<?=$linha_grupo['g7']?>"><?=$linha_grupo['g7']?></a> | 
	<a href="ne.php?g=g8&t=<?=$linha_grupo['g8']?>"><?=$linha_grupo['g8']?></a><br />
	<a href="ne.php?g=g9&t=<?=$linha_grupo['g9']?>"><?=$linha_grupo['g9']?></a> | 
	<a href="ne.php?g=g10&t=<?=$linha_grupo['g10']?>"><?=$linha_grupo['g10']?></a> | 
	<a href="ne.php?g=g11&t=<?=$linha_grupo['g11']?>"><?=$linha_grupo['g11']?></a> | 
	<a href="ne.php?g=g12&t=<?=$linha_grupo['g12']?>"><?=$linha_grupo['g12']?></a> | 
	<a href="ne.php?g=g13&t=<?=$linha_grupo['g13']?>"><?=$linha_grupo['g13']?></a> | 
	<a href="ne.php?g=g14&t=<?=$linha_grupo['g14']?>"><?=$linha_grupo['g14']?></a> | 
	<a href="ne.php?g=g15&t=<?=$linha_grupo['g15']?>"><?=$linha_grupo['g15']?></a> | 
	<a href="ne.php?g=g16&t=<?=$linha_grupo['g16']?>"><?=$linha_grupo['g16']?></a><br />
	<a href="ne.php?g=g17&t=<?=$linha_grupo['g17']?>"><?=$linha_grupo['g17']?></a> | 
	<a href="ne.php?g=g18&t=<?=$linha_grupo['g18']?>"><?=$linha_grupo['g18']?></a> | 
	<a href="ne.php?g=g19&t=<?=$linha_grupo['g19']?>"><?=$linha_grupo['g19']?></a> | 
	<a href="ne.php?g=g20&t=<?=$linha_grupo['g20']?>"><?=$linha_grupo['g20']?></a>
</h2>
