<?php
    $login_cookie = $_COOKIE['login'];
        if(isset($login_cookie)){ini_set( 'display_errors', false );error_reporting( 0 );
ini_set( 'display_errors', false );
error_reporting( 0 );
include('conectar.php');
include('nomesgrupos.php');

   $login_cookie = $_COOKIE['login'];
   $local_cookie = $_COOKIE['local'];
	mysql_query("insert into log (datahora, user, log1, log2, tipo, local)values(now(),'".$login_cookie."',' ',' ','Viu Pessoas Cadastradas - Todos','".$local."')");

   $result = mysql_query("SELECT foto, idcliente, nome, descricao, profissao, responsavel, sexo, data_cadastro FROM clientes ORDER BY idcliente DESC");
   $num_rows = mysql_num_rows($result);
   $query = sprintf("SELECT foto, idcliente, nome, descricao, profissao, responsavel, sexo, data_cadastro FROM clientes ORDER BY idcliente DESC");
   $dados = mysql_query($query, $connect) or die(mysql_error());
   $linha = mysql_fetch_assoc($dados);
   $total = mysql_num_rows($dados);
?>
<?php $linha_vercadastro = mysql_fetch_assoc(mysql_query("SELECT * FROM usuarios WHERE login = '".$login_cookie."'", $connect));if(empty($linha_vercadastro['vercadastro'])){ ?>
acesso negado para ver cadastro
<META http-equiv="refresh" content="1;URL=main.php">
<?php }else{ ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>:: Ver Pessoas Cadastradas ::</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">
<?php
	include('navigation.php'); 
?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Pessoas Cadastradas (Todos Cadastrados)</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <a border="0" href="gtodos100.php">Ultimos 100</a> | 
                            <a border="0" href="gtodos.php">Todos</a> | 
                            <a border="0" href="g.php?g=g1"><?=$gg1?></a> | 
                            <a border="0" href="g.php?g=g2"><?=$gg2?></a> | 
                            <a border="0" href="g.php?g=g3"><?=$gg3?></a> | 
                            <a border="0" href="g.php?g=g4"><?=$gg4?></a> | 
                            <a border="0" href="g.php?g=g5"><?=$gg5?></a> | 
                            <a border="0" href="g.php?g=g6"><?=$gg6?></a> | 
                            <a border="0" href="g.php?g=g7"><?=$gg7?></a> | 
                            <a border="0" href="g.php?g=g8"><?=$gg8?></a> | 
                            <a border="0" href="g.php?g=g9"><?=$gg9?></a> | 
                            <a border="0" href="g.php?g=g10"><?=$gg10?></a> | 
                            <a border="0" href="g.php?g=g11"><?=$gg11?></a> | 
                            <a border="0" href="g.php?g=g12"><?=$gg12?></a> | 
                            <a border="0" href="g.php?g=g13"><?=$gg13?></a> | 
                            <a border="0" href="g.php?g=g14"><?=$gg14?></a> | 
                            <a border="0" href="g.php?g=g15"><?=$gg15?></a> | 
                            <a border="0" href="g.php?g=g16"><?=$gg16?></a> | 
                            <a border="0" href="g.php?g=g17"><?=$gg17?></a> | 
                            <a border="0" href="g.php?g=g18"><?=$gg18?></a> | 
                            <a border="0" href="g.php?g=g19"><?=$gg19?></a> | 
                            <a border="0" href="g.php?g=g20"><?=$gg20?></a>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Foto</th>
                                        <th>Nome</th>
                                        <th>Descrição</th>
                                        <th>Profissão</th>
                                        <th>Responsável</th>
                                        <th>Sexo</th>
                                        <th>Data de Cadastro</th>
                                        <th>Opções</th>
                                    </tr>
                                </thead>
                                <tbody>
<?php
	if($total > 0) {
		do {

?>
                                    <tr class="odd gradeA">
                                        <td>
                                        	<a border="0" href="ver_detalhe.php?idcliente=<?=$linha['idcliente']?>"><?=$linha['idcliente']?></a>
                                        </td>
                                        <td>
                                        	<a border="0" href="/sistema-sergio/main/fotos/<?=$linha['foto']?>"><img border="0" src="/sistema-sergio/main/fotos/<?=$linha['foto']?>" alt="img" width="40" height="50"></a>
                                        </td>
                                        <td><a border="0" href="ver_detalhe.php?idcliente=<?=$linha['idcliente']?>"><?=$linha['nome']?></a></td>
                                        <td><?=$linha['descricao']?></td>
                                        <td><?=$linha['profissao']?></td>
                                        <td><?=$linha['responsavel']?></td>
                                        <td><?=$linha['sexo']?></td>
                                        <td class="center"><?=$linha['data_cadastro']?></td>
                                        <td class="center"><a border="0" href="ver_detalhe.php?idcliente=<?=$linha['idcliente']?>">Ver</a></td>
                                    </tr>
<?php
		}while($linha = mysql_fetch_assoc($dados));
	}
?>
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
			<?php include('rodape.php'); ?>
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="vendor/metisMenu/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="vendor/datatables-responsive/dataTables.responsive.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>

</body>
</html>
<?php } ?>
<?php        }else{?>

<p>Faça Login</p>
<META http-equiv="refresh" content="0;URL=index.php"> <?php }?>