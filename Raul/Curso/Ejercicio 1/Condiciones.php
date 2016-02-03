<?php
	$edad= '33';
		
	$resultado = "Valor introducido no valido";	
	
	if (is_numeric($edad)){
		if ($edad >= 0 ){
			if($edad <= 18){
				$resultado = "Estudiante";
			}elseif($edad >= 19 && $edad <= 67){
				$resultado = "Trabajador";
			}else{
				$resultado = "Jubilado";
			}
		}
	}
	
	echo $resultado;
	echo '<br />';
	
	$estado ="Estudiante"; //='estudiante';
	switch (strtolower($estado)) {
		case 'estudiante':
			$resultado = 'Su edad esta comprendida entre 0 y 18 años';
			break;
		case 'trabajador':
			$resultado = 'Su edad esta comprendida entre 19 y 67 años';
			break;
		case 'jubilado':
			$resultado = 'Su edad es mayor a 67 años';
			break;
		default:
			$resultado = "Valor introducido no valido";
			break;		
	}
	echo utf8_decode($resultado);
?>