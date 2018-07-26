<?php
    $login_cookie = $_COOKIE['login'];
        if(isset($login_cookie)){
ini_set( 'display_errors', false );
error_reporting( 0 );
include('conectar.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sistema de Gestão de Pessoas 3.0</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="vendor/morrisjs/morris.css" rel="stylesheet">

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
                    <h1 class="page-header">Main</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
<?php
   $mesatual = date("m");
   $diaatual = date("d");
   $anoatual = date("o");

   $result1 = mysql_query("SELECT idcliente FROM clientes");
   $num_rows1 = mysql_num_rows($result1);

   $result2 = mysql_query("SELECT * FROM clientes WHERE SUBSTRING(data_cadastro,6,2) = '".$mesatual."' and SUBSTRING(data_cadastro,9,2) = '".$diaatual."'");
   $num_rows2 = mysql_num_rows($result2);

   $result3 = mysql_query("SELECT iddemandas FROM demandas");
   $num_rows3 = mysql_num_rows($result3);

   $result4 = mysql_query("SELECT * FROM demandas WHERE SUBSTRING(data_inicio,6,2) = '".$mesatual."' and SUBSTRING(data_inicio,9,2) = '".$diaatual."'");
   $num_rows4 = mysql_num_rows($result4);

   if ($mesatual == 1){ $result5 = mysql_query("SELECT mes FROM clientes WHERE mes = 'JANEIRO'");	$mesatualtexto = 'JANEIRO'; };
   if ($mesatual == 2){ $result5 = mysql_query("SELECT mes FROM clientes WHERE mes = 'FEVEREIRO'");	$mesatualtexto = 'FEVEREIRO'; };
   if ($mesatual == 3){ $result5 = mysql_query("SELECT mes FROM clientes WHERE mes = 'MARÇO'");	$mesatualtexto = 'MARÇO'; };
   if ($mesatual == 4){ $result5 = mysql_query("SELECT mes FROM clientes WHERE mes = 'ABRIL'");	$mesatualtexto = 'ABRIL'; };
   if ($mesatual == 5){ $result5 = mysql_query("SELECT mes FROM clientes WHERE mes = 'MAIO'");	$mesatualtexto = 'MAIO'; };
   if ($mesatual == 6){ $result5 = mysql_query("SELECT mes FROM clientes WHERE mes = 'JUNHO'");	$mesatualtexto = 'JUNHO'; };
   if ($mesatual == 7){ $result5 = mysql_query("SELECT mes FROM clientes WHERE mes = 'JULHO'");	$mesatualtexto = 'JULHO'; };
   if ($mesatual == 8){ $result5 = mysql_query("SELECT mes FROM clientes WHERE mes = 'AGOSTO'");	$mesatualtexto = 'AGOSTO'; };
   if ($mesatual == 9){ $result5 = mysql_query("SELECT mes FROM clientes WHERE mes = 'SETEMBRO'");	$mesatualtexto = 'SETEMBRO'; };
   if ($mesatual == 10){ $result5 = mysql_query("SELECT mes FROM clientes WHERE mes = 'OUTUBRO'");	$mesatualtexto = 'OUTUBRO'; };
   if ($mesatual == 11){ $result5 = mysql_query("SELECT mes FROM clientes WHERE mes = 'NOVEMBRO'");	$mesatualtexto = 'NOVEMBRO'; };
   if ($mesatual == 12){ $result5 = mysql_query("SELECT mes FROM clientes WHERE mes = 'DEZEMBRO'");	$mesatualtexto = 'DEZEMBRO'; };

   $num_rows5 = mysql_num_rows($result5);
   
   $result6 = mysql_query("SELECT mes, dia FROM clientes WHERE mes = '".$mesatualtexto."' and dia = '".$diaatual."'");
   $num_rows6 = mysql_num_rows($result6);

?>
                <div class="col-lg-4 col-md-6">
                <a href="gtodos.php">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-user fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?=$num_rows1?> Pessoas</div>
                                    <div><?=$num_rows4?> Pessoa(s)</div>
									<div>cadastrada(s) HOJE</div>
                                </div>
                            </div>
                        </div>
                            <div class="panel-footer">
                                <span class="pull-left">Ver Cadastros</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                    </div>
                </a>
                </div>
                <div class="col-lg-4 col-md-6">
                <a href="demandas.php">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?=$num_rows3?> Demandas</div>
                                    <div><?=$num_rows4?> Demanda(s)</div>
									<div>iniciada(s) HOJE</div>
                                </div>
                            </div>
                        </div>
                            <div class="panel-footer">
                                <span class="pull-left">Ver Demandas</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                    </div>
                </a>
                </div>
                <div class="col-lg-4 col-md-6">
                <a href="aniversariante_hoje.php">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-calendar-plus-o fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?=$num_rows5?> Aniversariantes</div>
                                    <div>em <?php echo $mesatualtexto; ?></div>
									<div><?=$num_rows6?> Aniversariante(s) HOJE</div>
                                </div>
                            </div>
                        </div>
                            <div class="panel-footer">
                                <span class="pull-left">Ver Aniversariantes de Hoje</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                    </div>
                </a>
                </div>
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-8">




                </div>
                <!-- /.col-lg-4 -->
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

    <!-- Morris Charts JavaScript -->
    <script src="vendor/raphael/raphael.min.js"></script>
    <script src="vendor/morrisjs/morris.min.js"></script>
    <script src="data/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>

</body>

</html>
<?php
        }else{
?>
			<p>Faça Login</p>
            <META http-equiv="refresh" content="0;URL=index.php"> 
<?php
        }
?>