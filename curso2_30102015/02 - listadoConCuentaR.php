<?php
	// Se define el salto de línea.
	define("salto","<br>\n");

	// Se abre el fichero para lectura.
	$manejadorFichero1=fopen("lecturaSimple.txt","r");
	echo ("El contenido del fichero es: <b>");

	// Se muestra el contenido del fichero y se asigna el total de caracteres a una variable
	$caracteres=fpassthru($manejadorFichero1);
	echo ("</b>".salto."El total de caracteres es de: <b>");

	// Se muestra el total de caracteres.
	echo($caracteres."</b>".salto);

	fclose($manejadorFichero1);
?>
