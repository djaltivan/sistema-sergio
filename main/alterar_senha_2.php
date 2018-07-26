<?php 
ini_set( 'display_errors', false );
error_reporting( 0 );
include('conectar.php');
 
$login = $_POST['login'];
$senha = MD5($_POST['senha']);
$query_select = "SELECT * FROM usuarios WHERE login = '$login'";
$select = mysql_query($query_select,$connect);
$array = mysql_fetch_array($select);
$logarray = $array['senha'];
 
    if($login == "" || $login == null){
        echo"<script language='javascript' type='text/javascript'>alert('O campo login deve ser preenchido');window.location.href='editar_nivel.php?id=0';</script>";
 
        }else{
            if($logarray == $senha){

                echo"<script language='javascript' type='text/javascript'>alert('Essa senha é a cadastrada, digite uma nova senha');window.location.href='editar_nivel.php?id=0';</script>";
                die();

            }else{

                $query = mysql_query("UPDATE usuarios SET senha='$senha' WHERE login='$login' ");
                $insert = mysql_query($query,$connect);
                 
                if($insert){
                    echo"<script language='javascript' type='text/javascript'>alert('Não foi possível alterar a senha');window.location.href='editar_nivel.php?id=0'</script>";
                }else{
                    echo"<script language='javascript' type='text/javascript'>alert('Senha alterada com sucesso!');window.location.href='editar_nivel.php?id=0'</script>";

                }
            }
        }
?>