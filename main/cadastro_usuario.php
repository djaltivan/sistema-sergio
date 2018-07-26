<?php 
ini_set( 'display_errors', false );
error_reporting( 0 );
include('conectar.php');
 
$login = $_POST['login'];
$senha = MD5($_POST['senha']);
$query_select = "SELECT login FROM usuarios WHERE login = '$login'";
$select = mysql_query($query_select,$connect);
$array = mysql_fetch_array($select);
$logarray = $array['login'];
 
    if($login == "" || $login == null){
        echo"<script language='javascript' type='text/javascript'>alert('O campo login deve ser preenchido');window.location.href='editar_usuario.php';</script>";
 
        }else{
            if($logarray == $login){
 
                echo"<script language='javascript' type='text/javascript'>alert('Esse login já existe! Tente um login diferente');window.location.href='editar_usuario.php';</script>";
                die();
 
            }else{
                $query = "INSERT INTO usuarios (login,senha) VALUES ('$login','$senha')";
                $insert = mysql_query($query,$connect);
                 
                if($insert){
                    echo"<script language='javascript' type='text/javascript'>alert('Usuário cadastrado com sucesso! Seja bem vindo');window.location.href='index.php'</script>";
                }else{
                    echo"<script language='javascript' type='text/javascript'>alert('Não foi possível cadastrar esse usuário! Tente novamente');window.location.href='editar_usuario.php'</script>";
                }
            }
        }
?>