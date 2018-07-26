<?php
include('conectar.php'); 
   $result_avisos = mysql_query("SELECT * FROM avisos");
   $num_rows = mysql_num_rows($result_avisos);
   $query_avisos = sprintf("SELECT * FROM avisos WHERE idavisos = 1");
   $dados_avisos = mysql_query($query_avisos, $connect) or die(mysql_error());
   $linha_avisos = mysql_fetch_assoc($dados_avisos);
   $total_avisos = mysql_num_rows($dados_avisos);
?>
        <!-- Navigation -->
		<img height="50" src="../main/icon/logo.png">
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="main.php">
					Sistema de Gestão de Pessoas 3.0
				</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
			Data: <?php echo date("d"); ?>/<?php echo date("m"); ?>/<?php echo date("o"); ?>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-envelope fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                        <li>
                            <a href="<?=$linha_avisos['link']?>">
                                <div>
                                    <strong><?=$linha_avisos['titulo']?></strong>
                                    <span class="pull-right text-muted">
                                        <em><?=$linha_avisos['datahora']?></em>
                                    </span>
                                </div>
                                <div><?=$linha_avisos['aviso']?></div>
                            </a>
<?php $linhaconfirmacaoleitura = mysql_fetch_assoc(mysql_query("SELECT * FROM confirmacaoleitura WHERE confirmacaoleitura = '".$login_cookie."'", $connect));
if(empty($linhaconfirmacaoleitura['confirmacaoleitura'])){ ?>
                            <a href="confirmacao_leitura.php?nome=<?=$login_cookie?>">
                                <div>Confirmar Leitura</div>
                            </a>
<?php }else{ ?>
                            <a href="#">
                                <div>Leitura Confirmada</div>
                            </a>
<?php } ?>
						</li>
                        <li class="divider"></li>
                    </ul>
                    <!-- /.dropdown-messages -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="configuracao.php"><i class="fa fa-gear fa-fw"></i> Configuração</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="logoff.php"><i class="fa fa-sign-out fa-fw"></i> Sair</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="main.php"><i class="fa fa-dashboard fa-fw"></i> Inicio</a>
                        </li>
                        <li>
                            <a href="cadastrar.php"><i class="fa fa-edit fa-fw"></i> Cadastrar</a>
                        </li>
                        <li>
                            <a href="gtodos100.php"><i class="fa fa-edit fa-fw"></i> Pessoas cadastradas</a>
                        </li>
                        <li>
                            <a href="demandas.php"><i class="fa fa-edit fa-fw"></i> Demandas</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-table fa-fw"></i> Relatórios<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="gtodos.php">Lista Geral</a>
                                </li>
                                <li>
                                    <a href="aniversariantes.php?mes=%27janeiro%27">Aniversáriantes</a>
                                </li>
                                <li>
                                    <a href="nfcetodos.php" target="_blank">Relatório (Nome+Fone+Cel+Email) de todos</a>
                                </li>
                                <li>
                                    <a href="netodos.php" target="_blank">Relatório (Nome+Endereço) de todos</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>