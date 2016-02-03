<?php

$ocupacion = "";

echo "La ocupación introducida es: ".$ocupacion;

$error = 0;

switch($ocupacion)
{
	case 'ESTUDIANTE':
		$resultado = "su edad es entre 0 y 18";
		break;
	case 'TRABAJADOR':
		$resultado = "su edad es entre 19 y 67";
		break;
	case 'JUBILADO':
		$resultado = "su edad es mayor a 67";
		break;		
	default:
		$error = 1;
		break;
}

if ($error == 0)
	$cadena = "Su ocupación es ".$ocupacion." y ".$resultado;
else
	$cadena = "La ocupación ".$ocupacion." no se puede evaluar";

echo "<br> Resultado: ".$cadena;

?>