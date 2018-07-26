<?php
include('conectar.php'); 
   $result = mysql_query("SELECT * FROM textos");
   $num_rows = mysql_num_rows($result);
   $query = sprintf("SELECT * FROM textos WHERE idtextos = 1");
   $dados = mysql_query($query, $connect) or die(mysql_error());
   $linha = mysql_fetch_assoc($dados);
   $total = mysql_num_rows($dados);
?>
<br />
<hr>
<h3>
<?=$linha['rodape']?>
<a href="
<?=$linha['link']?>
">
<?=$linha['titulolink']?>
</a>
</h3>