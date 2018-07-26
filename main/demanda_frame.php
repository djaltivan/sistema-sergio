<?php
    $login_cookie = $_COOKIE['login'];
        if(isset($login_cookie)){
ini_set( 'display_errors', false );
error_reporting( 0 );
include('conectar.php');

   $result = mysql_query("SELECT * FROM clientes");
   $num_rows = mysql_num_rows($result);
   $query = sprintf("SELECT * FROM clientes WHERE idcliente = ".$_GET['idcliente']."");
   $dados = mysql_query($query, $connect) or die(mysql_error());
   $linha = mysql_fetch_assoc($dados);
   $total = mysql_num_rows($dados);
?>
<?php $linha_verdemanda = mysql_fetch_assoc(mysql_query("SELECT * FROM usuarios WHERE login = '".$login_cookie."'", $connect));

if(empty($linha_verdemanda['verdemanda'])){ ?>
acesso negado para ver demandas
<?php }else{ ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Edição de Demanda</title>

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
    
    <!-- Adicionando Javascript -->
    <script type="text/javascript" >
    
    function limpa_formulário_cep() {
            //Limpa valores do formulário de cep.
            document.getElementById('rua').value=("");
            document.getElementById('bairro').value=("");
            document.getElementById('cidade').value=("");
            document.getElementById('uf').value=("");
    }

    function meu_callback(conteudo) {
        if (!("erro" in conteudo)) {
            //Atualiza os campos com os valores.
            document.getElementById('rua').value=(conteudo.logradouro);
            document.getElementById('bairro').value=(conteudo.bairro);
            document.getElementById('cidade').value=(conteudo.localidade);
            document.getElementById('uf').value=(conteudo.uf);
            document.getElementById('numero').value="";
            document.getElementById('complemento').value="";
        } //end if.
        else {
            //CEP não Encontrado.
            limpa_formulário_cep();
            alert("CEP não encontrado.");
        }
    }
        
    function pesquisacep(valor) {

        //Nova variável "cep" somente com dígitos.
        var cep = valor.replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep != "") {

            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if(validacep.test(cep)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                document.getElementById('rua').value="...";
                document.getElementById('bairro').value="...";
                document.getElementById('cidade').value="...";
                document.getElementById('uf').value="...";

                //Cria um elemento javascript.
                var script = document.createElement('script');

                //Sincroniza com o callback.
                script.src = '//viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

                //Insere script no documento e carrega o conteúdo.
                document.body.appendChild(script);

            } //end if.
            else {
                //cep é inválido.
                limpa_formulário_cep();
                alert("Formato de CEP inválido.");
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            limpa_formulário_cep();
        }
    };

    </script>
</head>

<body>
			<div class="row">
				<div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Demandas:
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                        <div class="form-group">
<?php $linha_adddemanda = mysql_fetch_assoc(mysql_query("SELECT * FROM usuarios WHERE login = '".$login_cookie."'", $connect));
if(empty($linha_adddemanda['adddemanda'])){ ?>
<?php }else{ ?>
		<strong><a border="0" href="add_demanda.php?idcliente=<?=$linha['idcliente']?>"><br />Adicionar Demanda<br /><br /></a>
<?php } ?>
<?php
   include('conectar.php'); 
   $resultdemanda = mysql_query("SELECT * FROM demandas ORDER BY status ASC");
   $num_rows = mysql_num_rows($resultdemanda);
   $query = sprintf("SELECT * FROM demandas WHERE idcliente = ".$_GET['idcliente']." ORDER BY status ASC");
   $dadosdemanda = mysql_query($query, $connect) or die(mysql_error());
   $linhademanda = mysql_fetch_assoc($dadosdemanda);
   $totaldemanda = mysql_num_rows($dadosdemanda);
?>
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Demanda</th>
                                        <th>Data de Inicio</th>
                                        <th>Data de Termino</th>
                                        <th>Status</th>
                                        <th>Opções</th>
                                    </tr>
                                </thead>
                                <tbody>
<?php
	if($totaldemanda > 0) {
		do {

?>
                                    <tr class="odd gradeA" background="/sistema-sergio/main/img/<?=$linhademanda['status']?>.jpg">
                                        <td><?=$linhademanda['iddemandas']?></td>
                                        <td><a border="0" href="editar_demanda.php?iddemandas=<?=$linhademanda['iddemandas']?>&idcliente=<?=$_GET['idcliente']?>"><?=$linhademanda['demanda']?></a></td>
                                        <td><a border="0" href="editar_demanda.php?iddemandas=<?=$linhademanda['iddemandas']?>&idcliente=<?=$_GET['idcliente']?>"><?=$linhademanda['data_inicio']?></a></td>
                                        <td><a border="0" href="editar_demanda.php?iddemandas=<?=$linhademanda['iddemandas']?>&idcliente=<?=$_GET['idcliente']?>"><?=$linhademanda['data_termino']?></a></td>
                                        <td><?=$linhademanda['status']?></td>
                                        <td><a border="0" href="editar_demanda.php?iddemandas=<?=$linhademanda['iddemandas']?>&idcliente=<?=$_GET['idcliente']?>">Ver</a></td>
                                    </tr>
<?php
		}while($linhademanda = mysql_fetch_assoc($dadosdemanda));
	}
?>
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->

							
							
							
							
							
							
							
							
							
							
							
							
							
							


									</div>
                                </div>
                            </div>
                            <!-- /.row (nested) -->
                        </div>
					</div>
				</div>
			</div>
				<div class="row">
                <div class="col-lg-8">
                </div>
                <!-- /.col-lg-4 -->
            </div>
            <!-- /.row -->

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
<?php } ?>
<?php
        }else{
?>
			<p>Faça Login</p>
            <META http-equiv="refresh" content="0;URL=index.php"> 
<?php
        }
?>