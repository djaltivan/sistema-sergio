<?php
    $login_cookie = $_COOKIE['login'];
        if(isset($login_cookie)){ini_set( 'display_errors', false );error_reporting( 0 );
ini_set( 'display_errors', false );
error_reporting( 0 );
include('conectar.php');
include('nomesgrupos.php');

   $login_cookie = $_COOKIE['login'];
   $local_cookie = $_COOKIE['local'];
	mysql_query("insert into log (datahora, user, log1, log2, tipo, local)values(now(),'".$login_cookie."',' ',' ','Viu Demandas - Todas ','".$local."')");
	
?>
<?php $linha_verdemanda = mysql_fetch_assoc(mysql_query("SELECT * FROM usuarios WHERE login = '".$login_cookie."'", $connect));

if(empty($linha_verdemanda['verdemanda'])){ ?>
acesso negado para ver cadastro
<?php }else{ ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>:: Demandas Finalizadas ::</title>

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
                    <h1 class="page-header">Lista de todas as demandas cadastradas:</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
							<a href="demandas.php">Todas Demandas</a> | 
							<a href="demandas_solicitado.php"><img border="0" src="/sistema-sergio/main/img/1.jpg" alt="img" width="20" height="20"> Solicitadas</a> | 
							<a href="demandas_emprocesso.php"><img border="0" src="/sistema-sergio/main/img/2.jpg" alt="img" width="20" height="20"> Em Processo</a> | 
							<a href="demandas_concluido.php"><img border="0" src="/sistema-sergio/main/img/3.jpg" alt="img" width="20" height="20"> Concluidas</a> | 
							<a href="demandas_finalizado.php"><img border="0" src="/sistema-sergio/main/img/5.jpg" alt="img" width="20" height="20"> Finalizadas</a> | 
							<a href="demandas_cancelado.php"><img border="0" src="/sistema-sergio/main/img/4.jpg" alt="img" width="20" height="20"> Canceladas</a>
                        </div>
                        <!-- /.panel-heading -->
<?php
   $result = mysql_query("SELECT * FROM demandas WHERE status = '5 - Finalizado' ORDER BY status ASC");
   $num_rows = mysql_num_rows($result);
   $query = sprintf("SELECT * FROM demandas WHERE status = '5 - Finalizado' ORDER BY status ASC");
   $dados = mysql_query($query, $connect) or die(mysql_error());
   $linha = mysql_fetch_assoc($dados);
   $total = mysql_num_rows($dados);

?>
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
									  <th>Cod Demanda</th>
									  <th>Pessoa Atendida</th>
									  <th>Pessoa Responsável</th>
									  <th>Demanda</th>
									  <th>Descrição</th>
									  <th>Status</th>
									  <th>Data Início</th>
									  <th>Data Término</th>
									  <th>Atendente</th>
                                    </tr>
                                </thead>
                                <tbody>
<?php
	if($total > 0) {
		do {

?>
<?php

   $query = sprintf("SELECT * FROM clientes WHERE idcliente =  ".$linha['idcliente']."");
   $dados_2 = mysql_query($query, $connect) or die(mysql_error());
   $linha_2 = mysql_fetch_assoc($dados_2);
   $total_2 = mysql_num_rows($dados_2);

   $query = sprintf("SELECT * FROM clientes WHERE idcliente =  ".$linha['atendente']."");
   $dados_4 = mysql_query($query, $connect) or die(mysql_error());
   $linha_4 = mysql_fetch_assoc($dados_4);
   $total_4 = mysql_num_rows($dados_4);
   
?>
                                    <tr class="odd gradeA" background="/sistema-sergio/main/img/<?=$linha['status']?>.jpg">
									  <td><?=$linha['iddemandas']?></td>
									  <td><a border="0" href="ver_detalhe.php?idcliente=<?=$linha_2['idcliente']?>"><?=$linha_2['nome']?></a></td>
									  <td><a border="0" href="ver_detalhe.php?idcliente=<?=$linha['atendente']?>"><?=$linha_4['nome']?></a></td>
									  <td><a border="0" href="editar_demanda.php?iddemandas=<?=$linha['iddemandas']?>&idcliente=<?=$linha_2['idcliente']?>"><?=$linha['demanda']?></a></td>
									  <td><?=$linha['descricao']?></td>
									  <td><?=$linha['status']?></td>
									  <td><?=$linha['data_inicio']?></td>
									  <td><?=$linha['data_termino']?></td>
									  <td>
									<?php
							   $query = sprintf("SELECT * FROM clientes WHERE idcliente =  ".$linha['atendente']."");

									   $dados_3 = mysql_query($query, $connect) or die(mysql_error());

									   $linha_3 = mysql_fetch_assoc($dados_3);

									   $total_3 = mysql_num_rows($dados_3);

									?>
									<a border="0" href="ver_detalhe.php?idcliente=<?=$linha_3['idcliente']?>"><?=$linha_3['nome']?></a>
									  </td>
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