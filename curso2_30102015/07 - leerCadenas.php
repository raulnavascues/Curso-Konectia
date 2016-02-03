<?php
	// Se abre el fichero
	$manejadorFichero1=fopen("ficheroHTML.html","r");

	// Se inicia un bucle que se ejecutará mientras no se alcance el final del fichero
	while (!feof($manejadorFichero1))
	{
	// Se lee una cadena, hasta el salto de línea
	$contenido=fgets($manejadorFichero1);
	echo($contenido);
	}

	// Se cierra el fichero.
	fclose ($manejadorFichero1);
?>
