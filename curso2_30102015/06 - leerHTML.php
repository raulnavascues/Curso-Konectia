<?php
	$manejadorFichero1=fopen("ficheroHTML.html","r");

	fpassthru($manejadorFichero1);

	fclose ($manejadorFichero1);
?>
