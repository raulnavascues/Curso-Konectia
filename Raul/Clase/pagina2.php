<?php
	echo "<pre>";
	print_r($_POST);
	echo "</pre>";
	$nombre ="";
	
	if (isset($_POST['nombre'])){
		$nombre = $_POST['nombre'];
		echo "Tu nombre es: <b style='font-style: oblique;'>". $nombre ."</b>";		
	}else {
		$nombre ="";
	}
	
	echo "<br /><a href='Formulario.php'>Volver</a>";
?>