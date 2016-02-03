<?php
	/* Se abre el fichero para su escritura. Recuerde que, cuando se intenta abrir un fichero para escritura, si este no existe, PHP se encarga de crearlo. */
	$manejador=fopen("escrituraLimitada.txt","a");

	// Se define una cadena
	$cadena="Esto es una cadena de texto.";

	/* Se intenta escribir la cadena y se comprueba si ha sido posible.*/
	if (@fwrite($manejador,$cadena,6))
	{
		echo("La cadena se ha escrito en el archivo.");
	}

	else
	{
		echo ("NO SE HA PODIDO ESCRIBIR.");
	}

	// Se cierra el fichero.
	fclose($manejador);
?>

