<?php


	$valor1 = $_POST["txtValor1"];
	$valor2 = $_POST["txtValor2"];
	
	$cadena = "";
	if (!isset($_POST["suma"]))
		$cadena = $_POST["suma"].": ".suma($valor1, $valor2)."<br />";
	if (!isset($_POST["resta"]))
		$cadena = $_POST["resta"].": ".resta($valor1, $valor2)."<br />";
	if (!isset($_POST["multiplicacion"]))
		$cadena = $_POST["multiplicacion"].": ".multiplicacion($valor1, $valor2)."<br />";
	if (!isset($_POST["division"]))
		$cadena = $_POST["division"].": ".division($valor1, $valor2)."<br />";
	
	
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