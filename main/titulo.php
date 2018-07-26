<?php
include('conectar.php'); 
   $query = sprintf("SELECT * FROM textos WHERE idtextos = 1");
   $dados = mysql_query($query, $connect) or die(mysql_error());
   $linhatitulo = mysql_fetch_assoc($dados);
?>
<?=$linhatitulo['titulo']?>