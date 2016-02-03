<?php
	include "../lib/funciones.php";	
	if (isset($_POST["form_origen"]))
	{
		
		$valor1 = $_POST["txtValor1"];
		$valor2 = $_POST["txtValor2"];
		
		switch ($_POST["form_origen"])
		{
			case 'check':
				$cadena = origenCheck($valor1, $valor2);
				break;
			case 'radio':
				$cadena = origenComboRadio($valor1, $valor2);	
				break;
			case 'combo':
				$cadena = origenComboRadio($valor1, $valor2);
				break;
			default:
				$cadena = "El metodo seleccionado no esta disponible";
		}
	}	
	else
		$cadena = "No se puede devolver nada";
	
	echo $cadena;

	function origenComboRadio($valor1, $valor2)
	{
		$operacion = $_POST["Operacion"];
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
		return $resultado;
	}
	
	function origenCheck($valor1, $valor2)
	{
		$cadena = "";
		if (isset($_POST["chkSuma"]))
			$cadena.= $_POST["chkSuma"].": ".suma($valor1, $valor2)."<br />";
		if (isset($_POST["chkResta"]))
			$cadena.= $_POST["chkResta"].": ".resta($valor1, $valor2)."<br />";
		if (isset($_POST["chkMultiplicacion"]))
			$cadena.= $_POST["chkMultiplicacion"].": ".multiplicacion($valor1, $valor2)."<br />";
		if (isset($_POST["chkDivision"]))
			$cadena.= $_POST["chkDivision"].": ".division($valor1, $valor2)."<br />";
		return $cadena;	
	}

?>