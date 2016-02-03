<?php
	define("salto","<br />\n");
	$fichero=fopen("lecturaSimple.txt","r");
	$bloque=fread($fichero,12);
	
	echo "Los 12 primeros caracteres del fichero son: <b>$bloque</b>".salto;
	
	$bloque=fread($fichero,12);
	echo "El siguiente bloque de 12 caracteres es: <b>$bloque</b>".salto;
	
	$bloque=fread($fichero,15);
	echo "El siguiente bloque de caracteres es: <b>$bloque</b>".salto;
	
	rewind($fichero);
	$bloque=fread($fichero,35);
	$bloque=nl2br($bloque);
	echo "Los 35 primeros caracteres son: <b>$bloque</b>".salto;
	
	// LECTURA DE TODO EL FICHERO
	rewind($fichero);
	$tamanio=filesize("lecturaSimple.txt");
	$bloque=fread($fichero,$tamanio);
	$bloque=nl2br($bloque);
	echo "<br /><br />";
	echo "<u>Fichero al completo</u><br />";
	echo $bloque;
	fclose($fichero);
?>






