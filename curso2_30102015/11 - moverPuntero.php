<?php
	// Se define el salto de línea.
	define("salto","<br>\n");

	// Se abre el fichero para lectura.
	$manejadorFichero1=fopen("lecturaSimple.txt","r");

	// Se lee la mitad del fichero
	$contenido=fread ($manejadorFichero1,14);

	// Se muestra la mitad leída.
	echo ("La primera mitad del fichero es: <b>$contenido</b>".salto);
	echo ("Nos vamos a desplazar al cuarto carácter del fichero.".salto);

	// Desplazamos el puntero al cuarto carácter.
	fseek ($manejadorFichero1,3);

	// Leemos el cuarto caracter y lo mostramos
	echo ("El carácter correspondiente a la posición actual es <b>".fgetc($manejadorFichero1)."</b>".salto);

	// Se cierra el fichero.
	fclose($manejadorFichero1);
?>
