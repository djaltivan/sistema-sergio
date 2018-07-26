<?php
ini_set( 'display_errors', false );
error_reporting( 0 );
include('conectar.php');

    $login = $_POST['login'];
    $local = $_POST['local'];
    $entrar = $_POST['entrar'];
    $senha = md5($_POST['senha']);
        if (isset($entrar)) {
                     
            $verifica = mysql_query("SELECT * FROM usuarios WHERE login = '$login' AND senha = '$senha'") or die("erro ao selecionar");
	    $linha = mysql_fetch_assoc($verifica);
                if (mysql_num_rows($verifica)<=0){
                    echo"<script language='javascript' type='text/javascript'>alert('Login e/ou senha incorretos');window.location.href='login.php';</script>";
                    die();
                }else{
                    setcookie("login",$login,time()+28800);
                    setcookie("nivel",$linha['nivel'],time()+28800);
                    header("Location:main.php");
                }
        }
	setcookie("local",$local,time()+28800);
?>
