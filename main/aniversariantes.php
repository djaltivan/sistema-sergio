<?php
    $login_cookie = $_COOKIE['login'];
        if(isset($login_cookie)){ini_set( 'display_errors', false );error_reporting( 0 );
ini_set( 'display_errors', false );
error_reporting( 0 );
include('conectar.php');
include('nomesgrupos.php');

   $result = mysql_query("SELECT * FROM clientes");
   $num_rows = mysql_num_rows($result);
   $query = sprintf("SELECT * FROM clientes WHERE mes = ".$_GET['mes']." ORDER BY dia");
   $dados = mysql_query($query, $connect) or die(mysql_error());
   $linha = mysql_fetch_assoc($dados);
   $total = mysql_num_rows($dados);
   
   $login_cookie = $_COOKIE['login'];
   $local_cookie = $_COOKIE['local'];
	mysql_query("insert into log (datahora, user, log1, log2, tipo, local)values(now(),'".$login_cookie."',' ','".$linha['mes']."','Viu Aniversariantes - Mês: ','".$local."')");
	
?>
<?php $linha_veraniversario = mysql_fetch_assoc(mysql_query("SELECT * FROM usuarios WHERE login = '".$login_cookie."'", $connect));
if(empty($linha_veraniversario['veraniversario'])){ ?>
acesso negado para ver aniversáriantes
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

    <title>:: Aniversariantes por Mês ::</title>

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
                    <h1 class="page-header">Aniversariantes por Mês: <?=$linha['mes']?></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
							<a href="aniversariante_hoje.php">Hoje</a> | 
							<a href="aniversariantes.php?mes='janeiro'">Janeiro</a> | 
							<a href="aniversariantes.php?mes='fevereiro'">Fevereiro</a> | 
							<a href="aniversariantes.php?mes='março'">Março</a> | 
							<a href="aniversariantes.php?mes='abril'">Abril</a> | 
							<a href="aniversariantes.php?mes='maio'">Maio</a> | 
							<a href="aniversariantes.php?mes='junho'">Junho</a> | 
							<a href="aniversariantes.php?mes='julho'">Julho</a> | 
							<a href="aniversariantes.php?mes='agosto'">agosto</a> | 
							<a href="aniversariantes.php?mes='setembro'">setembro</a> | 
							<a href="aniversariantes.php?mes='outubro'">Outubro</a> | 
							<a href="aniversariantes.php?mes='novembro'">Novembro</a> | 
							<a href="aniversariantes.php?mes='dezembro'">Dezembro</a>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Nome</th>
                                        <th>Descrição</th>
                                        <th>Data Nascimento</th>
                                        <th>Sexo</th>
                                        <th>Contatos</th>
                                    </tr>
                                </thead>
                                <tbody>
<?php
	if($total > 0) {
		do {

?>
                                    <tr class="odd gradeA">
                                        <td>
                                        	<a border="0" href="ver_detalhe.php?idcliente=<?=$linha['idcliente']?>"><?=$linha['idcliente']?></a> | 
                                        	<a border="0" href="/sistema-sergio/main/fotos/<?=$linha['foto']?>"><img border="0" src="/sistema-sergio/main/fotos/<?=$linha['foto']?>" alt="img" width="40" height="50"></a>
                                        </td>
                                        <td><a border="0" href="ver_detalhe.php?idcliente=<?=$linha['idcliente']?>"><?=$linha['nome']?></a></td>
                                        <td><?=$linha['descricao']?></td>
                                        <td>
											<h4><?=$linha['dia']?>/<?=$linha['mes']?>/<?=$linha['ano']?></h4>
										</td>
                                        <td><?=$linha['sexo']?></td>
                                        <td>
											<h4>
												Fixo: <?=$linha['fixo']?><br />
												Oi: <?=$linha['oi']?><br />
												Tim: <?=$linha['tim']?><br />
												E-mail: <?=$linha['email']?>
											</h4>
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