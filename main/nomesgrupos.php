<?php

   $result = mysql_query("SELECT * FROM grupos");
   $num_rows = mysql_num_rows($result);
   $query = sprintf("SELECT * FROM grupos WHERE idgrupos = 1");
   $dados = mysql_query($query, $connect) or die(mysql_error());
   $linha_grupo = mysql_fetch_assoc($dados);


  $gg1 = $linha_grupo['g1'];
  $gg2 = $linha_grupo['g2'];
  $gg3 = $linha_grupo['g3'];
  $gg4 = $linha_grupo['g4'];
  $gg5 = $linha_grupo['g5'];
  $gg6 = $linha_grupo['g6'];
  $gg7 = $linha_grupo['g7'];
  $gg8 = $linha_grupo['g8'];
  $gg9 = $linha_grupo['g9'];
  $gg10 = $linha_grupo['g10'];
  $gg11 = $linha_grupo['g11'];
  $gg12 = $linha_grupo['g12'];
  $gg13 = $linha_grupo['g13'];
  $gg14 = $linha_grupo['g14'];
  $gg15 = $linha_grupo['g15'];
  $gg16 = $linha_grupo['g16'];
  $gg17 = $linha_grupo['g17'];
  $gg18 = $linha_grupo['g18'];
  $gg19 = $linha_grupo['g19'];
  $gg20 = $linha_grupo['g20'];
?>



