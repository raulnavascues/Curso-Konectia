<?php
	// Se define el salto de l�nea.
	define("salto","<br>\n");

	// Se determina el tama�o del fichero
	$caracteres=filesize("lecturaSimple.txt");

	// Se abre el fichero para lectura.
	$manejadorFichero1=fopen("lecturaSimple.txt","r");

	// Se lee todo el fichero de una vez
	$bloque=fread($manejadorFichero1,$caracteres);
	echo ("El contenido del fichero es: <b>$bloque</b>".salto);

	// Se muestra el tama�o del fichero.
	echo ("El total de caracteres es de: <b>$caracteres</b>");

	// Se cierra el fichero
	fclose ($manejadorFichero1);
?>

