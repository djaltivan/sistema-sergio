<?php
    $login_cookie = $_COOKIE['login'];
        if(isset($login_cookie)){
ini_set( 'display_errors', false );
error_reporting( 0 );
?>
	<META http-equiv="refresh" content="0;URL=main.php">
<?php
		}else{
?>
	<p>Faça Login</p>
	<META http-equiv="refresh" content="0;URL=login.php"> 
<?php
        }
?>