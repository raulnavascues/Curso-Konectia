<?php


	$valor1 = $_POST["txtValor1"];
	$valor2 = $_POST["txtValor2"];
	//$operacion = $_POST["txtOperacion"]; // para form.php
	$operacion = $_POST["rdbOperacion"]; // para form_radio.php
	
	switch ($operacion)
	{
		case 'suma':
			$resultado = suma($valor1, $valor2);
			break;
		case 'resta':
			$resultado = resta($valor1, $valor2);
			break;
		case 'multiplicacion':
			$resultado = multiplicacion($valor1, $valor2);
			break;
		case 'division':
			$resultado = division($valor1, $valor2);
			break;
		default:
			$resultado = suma($valor1, $valor2);
			break;
	}
	
	echo "El resultado de la operación ".$operacion." es :".$resultado;
	
	function suma($val1, $val2)
	{
		$resultado = $val1 + $val2;
		return $resultado;
	}
	
	function resta($val1, $val2)
	{
		$resultado = $val1 - $val2;
		return $resultado;
	}
	
	function multiplicacion($val1, $val2)
	{
		$resultado = $val1 * $val2;
		return $resultado;
	}
	
	function division($val1, $val2)
	{
		$resultado = $val1 / $val2;
		return $resultado;
	}

?>