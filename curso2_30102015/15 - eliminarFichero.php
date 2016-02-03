<?php
	// Se define el salto de línea.
	define("salto","<br>\n");

	/* Se intenta eliminar un fichero y se informa del resultado. */
	if (@unlink("ficheroParaEliminar.txt"))
	{
		echo ("Se ha eliminado el fichero.".salto);
	}
	else
	{
		echo ("NO se pudo eliminar el fichero.".salto);
	}
?>
