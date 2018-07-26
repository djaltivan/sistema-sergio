<?php
    $login_cookie = $_COOKIE['login'];
        if(isset($login_cookie)){
ini_set( 'display_errors', false );
error_reporting( 0 );
include('conectar.php');
?>
<?php $linha_addcadastro = mysql_fetch_assoc(mysql_query("SELECT * FROM usuarios WHERE login = '".$login_cookie."'", $connect));
if(empty($linha_addcadastro['addcadastro'])){ ?>
acesso negado para cadastrar
<META http-equiv="refresh" content="1;URL=main.php">
<?php }else{ ?>
<?php
   $result = mysql_query("SELECT * FROM grupos");
   $num_rows = mysql_num_rows($result);
   $query = sprintf("SELECT * FROM grupos WHERE idgrupos = 1");
   $dados = mysql_query($query, $connect) or die(mysql_error());
   $linha_grupo = mysql_fetch_assoc($dados);
   $total = mysql_num_rows($dados);
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>:: Cadastrar Pessoa ::</title>

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
    
    <!-- Adicionando Javascript Cep -->
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
	<script type="text/javascript">
	function alteraMaiusculo(){
		var valor = document.getElementById("campo").nome;
		var novoTexto = valor.value.toUpperCase();
		valor.value = novoTexto;
		}
	</script>
</head>

<body>

    <div id="wrapper">
<?php
	include('navigation.php'); 
?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Cadastrar</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->

			<div class="row">
				<div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Verificar Nome: (Em Letra Maiuscula)
                        </div>
                        <div class="panel-body">
							<form role="form" action="funcao_verificar_nome.php" method="POST" enctype="multipart/form-data" name="formulario" id="campo">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
										<input class="form-control" name="nome" id="nome" onkeyup="alteraMaiusculo()" />
									</div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
										<input type="submit" class="btn btn-primary" value="Verificar Nome"/>
									</div>
                                </div>
							</div>
							</form>
                            <!-- /.row (nested) -->
                        </div>
					</div>
				</div>
			</div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Novo Cadastro de Pessoa
                        </div>
                        <div class="panel-body">
                            <div class="row">
							<form role="form" action="funcao_gravar_cadastro.php" method="POST" enctype="multipart/form-data">
                                <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Nome *</label>
                                            <input class="form-control" name="nome" id="nome" value="<?=$_GET['nome']?>">
                                            <label>Descrição</label>
                                            <input class="form-control" name="descricao" id="descricao">
                                            <label>Cep</label>
                                            <input class="form-control" name="cep" id="cep" value="" maxlength="9"
                                            							onblur="pesquisacep(this.value);">
                                            <label>Numero</label>
                                            <input class="form-control" name="numero" id="numero">
                                            <label>Complemento</label>
                                            <input class="form-control" name="complemento" id="complemento">
                                            <label>Rua</label>
                                            <input class="form-control" name="rua" id="rua">
                                            <label>Bairro</label>
                                            <input class="form-control" name="bairro" id="bairro">
                                            <label>Cidade</label>
                                            <input class="form-control" name="cidade" id="cidade">
                                            <label>Estado</label>
                                            <input class="form-control" name="uf" id="uf">
                                            <label>Sexo</label>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="sexo" id="sexo" value="masculino">Masculino
                                                </label>
                                                <label>
                                                    <input type="radio" name="sexo" id="sexo" value="feminino">Feminino
                                                </label>
                                            </div>
                                            <label>RG *</label>
                                            <input class="form-control" name="rg" id="rg">
                                            <label>CPF *</label>
                                            <input class="form-control" name="cpf" id="cpf">
                                            <label>Naturalidade</label>
                                            <input class="form-control" name="naturalidade" id="naturalidade">
                                            <label>Profissão</label>
                                            <input class="form-control" name="profissao" id="profissao">
                                            <label>Responsável</label>
                                            <input class="form-control" name="responsavel" id="responsavel">
                                        </div>
                                        <div class="form-group">
                                            <label>Data Nascimento</label>
                                            <br>
                                            <label>Dia</label>
                                            <select class="form-control" name="dia" id="dia">
                                                <option selected value="-">-</option>
                                                <option value="01">01</option>
                                                <option value="02">02</option>
                                                <option value="03">03</option>
                                                <option value="04">04</option>
                                                <option value="05">05</option>
                                                <option value="06">06</option>
                                                <option value="07">07</option>
                                                <option value="08">08</option>
                                                <option value="09">09</option>
                                                <option value="10">10</option>
                                                <option value="11">11</option>
                                                <option value="12">12</option>
                                                <option value="13">13</option>
                                                <option value="14">14</option>
                                                <option value="15">15</option>
                                                <option value="16">16</option>
                                                <option value="17">17</option>
                                                <option value="18">18</option>
                                                <option value="19">19</option>
                                                <option value="20">20</option>
                                                <option value="21">21</option>
                                                <option value="22">22</option>
                                                <option value="23">23</option>
                                                <option value="24">24</option>
                                                <option value="25">25</option>
                                                <option value="26">26</option>
                                                <option value="27">27</option>
                                                <option value="28">28</option>
                                                <option value="29">29</option>
                                                <option value="30">30</option>
                                                <option value="31">31</option>
                                            </select>
                                            <label>Mês</label>
                                            <select class="form-control" name="mes" id="mes">
                                                <option selected value="-">-</option>
                                                <option value="janeiro">janeiro</option>
                                                <option value="fevereiro">fevereiro</option>
                                                <option value="março">março</option>
                                                <option value="abril">abril</option>
                                                <option value="maio">maio</option>
                                                <option value="junho">junho</option>
                                                <option value="julho">julho</option>
                                                <option value="agosto">agosto</option>
                                                <option value="setembro">setembro</option>
                                                <option value="outubro">outubro</option>
                                                <option value="novembro">novembro</option>
                                                <option value="dezembro">dezembro</option>
                                            </select>
                                            <label>Ano</label>
                                            <select class="form-control" name="ano" id="ano">
                                                <option selected value="-">-</option>
                                                <option value="2030">2030</option>
                                                <option value="2029">2029</option>
                                                <option value="2028">2028</option>
                                                <option value="2027">2027</option>
                                                <option value="2026">2026</option>
                                                <option value="2025">2025</option>
                                                <option value="2024">2024</option>
                                                <option value="2023">2023</option>
                                                <option value="2022">2022</option>
                                                <option value="2021">2021</option>
                                                <option value="2020">2020</option>
                                                <option value="2019">2019</option>
                                                <option value="2018">2018</option>
                                                <option value="2017">2017</option>
                                                <option value="2016">2016</option>
                                                <option value="2015">2015</option>
                                                <option value="2014">2014</option>
                                                <option value="2013">2013</option>
                                                <option value="2012">2012</option>
                                                <option value="2011">2011</option>
                                                <option value="2010">2010</option>
                                                <option value="2009">2009</option>
                                                <option value="2008">2008</option>
                                                <option value="2007">2007</option>
                                                <option value="2006">2006</option>
                                                <option value="2005">2005</option>
                                                <option value="2004">2004</option>
                                                <option value="2003">2003</option>
                                                <option value="2002">2002</option>
                                                <option value="2001">2001</option>
                                                <option value="2000">2000</option>
                                                <option value="1999">1999</option>
                                                <option value="1998">1998</option>
                                                <option value="1997">1997</option>
                                                <option value="1996">1996</option>
                                                <option value="1995">1995</option>
                                                <option value="1994">1994</option>
                                                <option value="1993">1993</option>
                                                <option value="1992">1992</option>
                                                <option value="1991">1991</option>
                                                <option value="1990">1990</option>
                                                <option value="1989">1989</option>
                                                <option value="1988">1988</option>
                                                <option value="1987">1987</option>
                                                <option value="1986">1986</option>
                                                <option value="1985">1985</option>
                                                <option value="1984">1984</option>
                                                <option value="1983">1983</option>
                                                <option value="1982">1982</option>
                                                <option value="1981">1981</option>
                                                <option value="1980">1980</option>
                                                <option value="1979">1979</option>
                                                <option value="1978">1978</option>
                                                <option value="1977">1977</option>
                                                <option value="1976">1976</option>
                                                <option value="1975">1975</option>
                                                <option value="1974">1974</option>
                                                <option value="1973">1973</option>
                                                <option value="1972">1972</option>
                                                <option value="1971">1971</option>
                                                <option value="1970">1970</option>
                                                <option value="1969">1969</option>
                                                <option value="1968">1968</option>
                                                <option value="1967">1967</option>
                                                <option value="1966">1966</option>
                                                <option value="1965">1965</option>
                                                <option value="1964">1964</option>
                                                <option value="1963">1963</option>
                                                <option value="1962">1962</option>
                                                <option value="1961">1961</option>
                                                <option value="1960">1960</option>
                                                <option value="1959">1959</option>
                                                <option value="1958">1958</option>
                                                <option value="1957">1957</option>
                                                <option value="1956">1956</option>
                                                <option value="1955">1955</option>
                                                <option value="1954">1954</option>
                                                <option value="1953">1953</option>
                                                <option value="1952">1952</option>
                                                <option value="1951">1951</option>
                                                <option value="1950">1950</option>
                                                <option value="1949">1949</option>
                                                <option value="1948">1948</option>
                                                <option value="1947">1947</option>
                                                <option value="1946">1946</option>
                                                <option value="1945">1945</option>
                                                <option value="1944">1944</option>
                                                <option value="1943">1943</option>
                                                <option value="1942">1942</option>
                                                <option value="1941">1941</option>
                                                <option value="1940">1940</option>
                                                <option value="1939">1939</option>
                                                <option value="1938">1938</option>
                                                <option value="1937">1937</option>
                                                <option value="1936">1936</option>
                                                <option value="1935">1935</option>
                                                <option value="1934">1934</option>
                                                <option value="1933">1933</option>
                                                <option value="1932">1932</option>
                                                <option value="1931">1931</option>
                                                <option value="1930">1930</option>
                                                <option value="1929">1929</option>
                                                <option value="1928">1928</option>
                                                <option value="1927">1927</option>
                                                <option value="1926">1926</option>
                                                <option value="1925">1925</option>
                                                <option value="1924">1924</option>
                                                <option value="1923">1923</option>
                                                <option value="1922">1922</option>
                                                <option value="1921">1921</option>
                                                <option value="1920">1920</option>
                                                <option value="1919">1919</option>
                                                <option value="1918">1918</option>
                                                <option value="1917">1917</option>
                                                <option value="1916">1916</option>
                                                <option value="1915">1915</option>
                                                <option value="1914">1914</option>
                                                <option value="1913">1913</option>
                                                <option value="1912">1912</option>
                                                <option value="1911">1911</option>
                                                <option value="1910">1910</option>
                                                <option value="1909">1909</option>
                                                <option value="1908">1908</option>
                                                <option value="1907">1907</option>
                                                <option value="1906">1906</option>
                                                <option value="1905">1905</option>
                                                <option value="1904">1904</option>
                                                <option value="1903">1903</option>
                                                <option value="1902">1902</option>
                                                <option value="1901">1901</option>
                                                <option value="1900">1900</option>
                                            </select>
                                        </div>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Foto</label>
                                            <input type="file" name="foto" id="foto">
                                        </div>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input class="form-control" name="email" id="email">
                                            <label>Tel Fixo</label>
                                            <input class="form-control" name="fixo" id="fixo">
                                            <label>Cel. Tim</label>
                                            <input class="form-control" name="tim" id="tim">
                                            <label>Cel. Oi</label>
                                            <input class="form-control" name="oi" id="oi">
                                            <label>Cel. Vivo</label>
                                            <input class="form-control" name="vivo" id="vivo">
                                            <label>Cel. Claro</label>
                                            <input class="form-control" name="claro" id="claro">
                                            <label>Cel. Nextel</label>
                                            <input class="form-control" name="nextel" id="nextel">
                                            <label>Id. Nextel</label>
                                            <input class="form-control" name="nextelid" id="nextelid">
                                        </div>
                                        <div class="form-group">
                                                <?php
													include('nomesgrupos.php');
												?>
                                            <label>Grupos</label>
                                            <div class="checkbox">
                                                <label><input name="g1" id="g1" type="checkbox" value="S"><?=$gg1?></label><br>
                                                <label><input name="g2" id="g2" type="checkbox" value="S"><?=$gg2?></label><br>
                                                <label><input name="g3" id="g3" type="checkbox" value="S"><?=$gg3?></label><br>
                                                <label><input name="g4" id="g4" type="checkbox" value="S"><?=$gg4?></label><br>
                                                <label><input name="g5" id="g5" type="checkbox" value="S"><?=$gg5?></label><br>
                                                <label><input name="g6" id="g6" type="checkbox" value="S"><?=$gg6?></label><br>
                                                <label><input name="g7" id="g7" type="checkbox" value="S"><?=$gg7?></label><br>
                                                <label><input name="g8" id="g8" type="checkbox" value="S"><?=$gg8?></label><br>
                                                <label><input name="g9" id="g9" type="checkbox" value="S"><?=$gg9?></label><br>
                                                <label><input name="g10" id="g10" type="checkbox" value="S"><?=$gg10?></label><br>
                                                <label><input name="g11" id="g11" type="checkbox" value="S"><?=$gg11?></label><br>
                                                <label><input name="g12" id="g12" type="checkbox" value="S"><?=$gg12?></label><br>
                                                <label><input name="g13" id="g13" type="checkbox" value="S"><?=$gg13?></label><br>
                                                <label><input name="g14" id="g14" type="checkbox" value="S"><?=$gg14?></label><br>
                                                <label><input name="g15" id="g15" type="checkbox" value="S"><?=$gg15?></label><br>
                                                <label><input name="g16" id="g16" type="checkbox" value="S"><?=$gg16?></label><br>
                                                <label><input name="g17" id="g17" type="checkbox" value="S"><?=$gg17?></label><br>
                                                <label><input name="g18" id="g18" type="checkbox" value="S"><?=$gg18?></label><br>
                                                <label><input name="g19" id="g19" type="checkbox" value="S"><?=$gg19?></label><br>
                                                <label><input name="g20" id="g20" type="checkbox" value="S"><?=$gg20?></label><br>
                                            </div>
                                            <input type="submit" class="btn btn-primary" value="Cadastrar"/> <input type="reset" class="btn btn-primary" value="Limpar"/>
                                        </div>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
							</form>
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-8">




                </div>
                <!-- /.col-lg-4 -->
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
