<?php
  $servidor = 'dbgestao.mysql.uhserver.com';
  $usuario = 'felix';
  $senha_servidor = 'A4.b5@';
  $banco = 'dbgestao';
  $connect = mysql_connect($servidor, $usuario, $senha_servidor);
  $db = mysql_select_db($banco);
  mysql_set_charset('utf8', $connect);
?>