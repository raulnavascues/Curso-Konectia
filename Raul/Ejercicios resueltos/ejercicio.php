 <?php
 
$edad = -5;
$resultado = "";

if ($edad >= 0)
{
	if ($edad <=18)
		$resultado = "ESTUDIANTE";
	else if ($edad>=19 && $edad <=67)
		$resultado = "TRABAJADOR";
	else
		$resultado = "JUBILADO";
}
else
{
	$resultado = "Valor introducido incorrecto";
}
echo $resultado;
 
 ?>
 <br>
 ------------------------------------------------------
 <br>
 <?php
 
 $ocupacion = "NIÑO";
 
 echo "La ocupación introducida es: ".$ocupacion;
 
 $error = 0;
 $resultado = "";
 switch($ocupacion)
 {
	case 'ESTUDIANTE':
		$resultado = "su edad es entre 0 y 18";
		break;
	case 'ESTUDIANTE':
		$resultado = "su edad es entre 0 y 18";
		break;
	case 'ESTUDIANTE':
		$resultado = "su edad es entre 0 y 18";
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
 