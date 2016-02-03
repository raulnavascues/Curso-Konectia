<?php
	// Se define el salto de línea.
	define("salto","<br>\n");

	// Se abre el fichero para lectura.
	$manejadorFichero1=fopen("lecturaSimple.txt","r");

	// Se lee la mitad del fichero
	$contenido=fread ($manejadorFichero1,14);

	// Se muestra la mitad leída.
	echo ("La primera mitad del fichero es:	<b>$contenido</b>".salto);
	echo ("Nos vamos a desplazar cinco caracteres hacia	atrás.".salto);

	/* Desplazamos el puntero cinco caracteres hacia atrás desde la posición actual. */
	fseek ($manejadorFichero1,-5,SEEK_CUR);

	// Leemos el correspondiente carácter y lo mostramos
	echo ("El carácter correspondiente a la posición actual es <b>".fgetc($manejadorFichero1)."</b>".salto);

	// Se cierra el fichero.
	fclose($manejadorFichero1);
?>
