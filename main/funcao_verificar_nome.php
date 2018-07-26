<?php
ini_set( 'display_errors', false );
error_reporting( 0 );
include('conectar.php');

$nome = $_POST["nome"];

   $query = sprintf("SELECT idcliente, nome FROM clientes WHERE nome LIKE '$nome'");
   $dados = mysql_query($query, $connect) or die(mysql_error());
   $linha = mysql_fetch_assoc($dados);
   $total = mysql_num_rows($dados);

    if($nome == "" || $nome == null){
        echo"<script language='javascript' type='text/javascript'>alert('O campo nome deve ser preenchido');window.location.href='cadastrar.php';</script>";
 
        }else{
            if($nome == $linha['nome']){
                echo"<script language='javascript' type='text/javascript'>alert('Essa pessoa já está cadastrada, clique em OK para edita-lo');window.location.href='ver_detalhe.php?idcliente=". $linha['idcliente'] ."';</script>";
                die();
            }else{
                echo"<script language='javascript' type='text/javascript'>alert('Essa pessoa não está cadastrada, clique em OK para cadastrar');window.location.href='cadastrar.php?nome=". $nome ."';</script>";
            }
        }
?>
