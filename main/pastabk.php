<?php
	$pasta = 'backup/';
	$arquivos = glob("$pasta{*.sql}", GLOB_BRACE);
	foreach($arquivos as $img){
	   echo $img . "<br />";
	}
?>