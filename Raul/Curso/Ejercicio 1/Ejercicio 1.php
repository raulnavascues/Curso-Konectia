<?php
	$ocupacion = 'estudiante';
	
	echo "Valor introducido: " . $ocupacion . "<hr />";
	if ($ocupacion != 'niño') {
		switch (strtolower($ocupacion)) {
			case 'estudiante' :
				$edad = "esta comprendida entre 0 y 18";
				break;
			case 'trabajador' :
				$edad = "esta comprendida entre 19 y 67";
				break;
			case'jubilado' :
				$edad = "es mayor a 67";
				break;
			default:
				break;
		}
		$resultado = "La ocupacion " . $ocupacion . " y su edad " . $edad;
	} else {
		$resultado = "La ocupacion niño no se puede evaluar";
	}
	
	echo utf8_decode($resultado);
?>
