<?php    $login_cookie = $_COOKIE['login'];
        if(isset($login_cookie)){ini_set( 'display_errors', false );error_reporting( 0 );
include('conectar.php');
?><?php $linha_vercadastro = mysql_fetch_assoc(mysql_query("SELECT * FROM usuarios WHERE login = '".$login_cookie."'", $connect));if(empty($linha_vercadastro['vercadastro'])){ ?>acesso negado para ver cadastro<?php }else{ ?><!DOCTYPE html><html><head>   <meta http-equiv="Content-Type" content="text/html; charset=utf-8">   <meta charset="utf-8">   <meta http-equiv="X-UA-Compatible" content="IE=edge">   <meta name="viewport" content="width=device-width, initial-scale=1">   <link rel="stylesheet" href="css/styles.css">   <link rel="stylesheet" href="css/estilo.css"/>   <style type="text/css">   <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.0.min.js"></script>   <script type="text/javascript" src="js/script.js"></script>   body {	background-color: #F9F9F9;	margin-top: 0px;   }   </style>   <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>   <script src="js/script.js"></script><title>:: Edição de Cadastro ::</title></head><body><?php	include('menu.php');
 ?><hr><h2 align="left">:: Lista de todos os dados cadastrados :: </h2>
<?php	include('menu-grupos.php');
 ?><hr><?php   include('conectar.php');
    $result = mysql_query("SELECT * FROM clientes ORDER BY idcliente DESC");
   $num_rows = mysql_num_rows($result);   $query = sprintf("SELECT * FROM clientes ORDER BY idcliente DESC");
   $dados = mysql_query($query, $connect) or die(mysql_error());   $linha = mysql_fetch_assoc($dados);
   $total = mysql_num_rows($dados);?><?php	include('tabela-todos.php');
 ?></body></html><?php } ?><?php        }else{?>			<p>Faça Login</p>            <META http-equiv="refresh" content="0;URL=index.php"> <?php        }?>