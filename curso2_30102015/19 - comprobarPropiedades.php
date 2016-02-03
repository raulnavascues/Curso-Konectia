<?php
	define("salto","<br>\n");

	// Se comprueba si existe el fichero.
	if (file_exists($_POST["elemento"])) 
		echo ("El elemento existe.".salto);
	else
		echo ("El elemento NO existe en la ruta especificada.".salto);

	// Se comprueba si es un fichero.
	if (is_file($_POST["elemento"]))
		echo ("El elemento es un fichero.".salto);
	else
		echo ("El elemento NO es un fichero.".salto);

	// Se comprueba si es un directorio.
	if (is_dir($_POST["elemento"]))
		echo ("El elemento es un directorio.".salto);
	else
		echo ("El elemento NO es un directorio.".salto);

	// Se comprueba si se puede leer.
	if (is_readable($_POST["elemento"]))
		echo ("El elemento es legible.".salto);
	else
		echo ("El elemento NO es legible.".salto);

	// Se comprueba si se puede escribir.
	if (is_writeable($_POST["elemento"]))
		echo ("El elemento es escribible.".salto);
	else
		echo ("El elemento NO es escribible.".salto);

	// Se comprueba si se puede ejecutar.
	if (is_executable($_POST["elemento"]))
		echo ("El elemento es ejecutable.".salto);
	else
		echo ("El elemento NO es ejecutable.".salto);
?>
