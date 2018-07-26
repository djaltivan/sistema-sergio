<?php
    $login_cookie = $_COOKIE['login'];
        if(isset($login_cookie)){
ini_set( 'display_errors', false );
error_reporting( 0 );
include('conectar.php');
?>
<?php $linha_log = mysql_fetch_assoc(mysql_query("SELECT * FROM usuarios WHERE login = '".$login_cookie."'", $connect));
if(empty($linha_log['log'])){ ?>
acesso negado para ver log
<?php }else{ ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">

    <title>
      
        Log
      
    </title>

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,400italic" rel="stylesheet">
    
      <link href="assets/css/toolkit-inverse.css" rel="stylesheet">
    
    
    <link href="assets/css/application.css" rel="stylesheet">

    <style>
      /* note: this is a hack for ios iframe for bootstrap themes shopify page */
      /* this chunk of css is not part of the toolkit :) */
      body {
        width: 1px;
        min-width: 100%;
        *width: 100%;
      }
    </style>
  </head>


<body>
<?php
   $result = mysql_query("SELECT * FROM log");
   $num_rows = mysql_num_rows($result);
   $query = sprintf("SELECT * FROM log");
   $dados = mysql_query($query, $connect) or die(mysql_error());
   $linha = mysql_fetch_assoc($dados);
   $total = mysql_num_rows($dados);
?>
<div class="ud">
  <div class="eg">
<h2>Relatório de Log</h2>
<br>
    <table class="cl" data-sort="table">
      <thead>
        <tr>
          <th>Id Log</th>
          <th>Data Hora</th>
          <th>User</th>
          <th>Local</th>
          <th>Log</th>
          <th>Id</th>
        </tr>
        <tr colspan="7">
		Total de registros: <?php echo $num_rows; ?>
        </tr>
      </thead>
      <tbody>
	
<?php
	if($total > 0) {
		do {
?>
        <tr>
          <td><?=$linha['idlog']?></td>
          <td><?=$linha['datahora']?></td>
          <td><?=$linha['user']?></td>
          <td><?=$linha['local']?></td>
          <td><?=$linha['tipo']?><?=$linha['log2']?></td>
          <td><?=$linha['log1']?></td>
        </tr>
<?php
		}while($linha = mysql_fetch_assoc($dados));
	}
?>
      </tbody>
    </table>
  </div>
</div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/chart.js"></script>
    <script src="assets/js/tablesorter.min.js"></script>
    <script src="assets/js/toolkit.js"></script>
    <script src="assets/js/application.js"></script>
    <script>
      // execute/clear BS loaders for docs
      $(function(){while(window.BS&&window.BS.loader&&window.BS.loader.length){(window.BS.loader.pop())()}})
    </script>
  </body>
</html>
<?php } ?>
<?php        }else{?>

<p>Faça Login</p>
<META http-equiv="refresh" content="0;URL=index.php"> <?php }?>