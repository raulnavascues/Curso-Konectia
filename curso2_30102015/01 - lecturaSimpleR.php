<?php
	$fichero=fopen("lecturaSimple.txt","r");
	$n=fpassthru($fichero);
	fclose($fichero);
	
	echo "<br />Nº de caracteres: $n";
?>
