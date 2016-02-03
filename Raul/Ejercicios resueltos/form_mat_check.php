<?php
	$valor1 = $_POST["txtValor1"];
	$valor2 = $_POST["txtValor2"];
	
	$cadena = "";
	
	
	if (isset($_POST["chkSuma"]))
		$cadena.= $_POST["chkSuma"].": ".suma($valor1, $valor2)."<br />";
	if (isset($_POST["chkResta"]))
		$cadena.= $_POST["chkResta"].": ".resta($valor1, $valor2)."<br />";
	if (isset($_POST["chkMultiplicacion"]))
		$cadena.= $_POST["chkMultiplicacion"].": ".multiplicacion($valor1, $valor2)."<br />";
	if (isset($_POST["chkDivision"]))
		$cadena.= $_POST["chkDivision"].": ".division($valor1, $valor2)."<br />";
	echo $cadena;
	
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