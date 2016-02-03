<?php
	// Se define el salto de línea.
	define("salto","<br>\n");

	// Se abre el fichero para lectura.
	$manejador=fopen("lecturaSimple.txt","r");

	// Mientras no se alcance el final del fichero
	while(!feof($manejador))
	{
		// Se lee un carácter.
		$caracter=fgetc($manejador);
		//Se obtiene la posición del puntero.
		$posicion=ftell($manejador);
		/* Se comprueba si se ha leído un carácter. Esto se hace para no tratar la marca de final de fichero como un carácter. */
		if ($caracter)
		{
			/* Se muestra el carácter y la posición que ocupa. */
			echo ("El carácter en la posición ");
			echo ("<b>$posicion</b> es \"<b>");
			echo ("$caracter</b>\"".salto);
		}	
	}

	// Se cierra el fichero.
	fclose($manejador);
?>
