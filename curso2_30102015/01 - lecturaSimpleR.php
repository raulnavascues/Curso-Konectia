<?php
	$fichero=fopen("lecturaSimple.txt","r");
	$n=fpassthru($fichero);
	fclose($fichero);
	
	echo "<br />N� de caracteres: $n";
?>
