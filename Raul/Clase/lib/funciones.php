<?php
	/**
	 * LLama a las respectivas funciones de cada una de las operaciones
	 */
	function resultado($valor1,$valor2,$operacion){
		$resul = 0;
		switch (trim($operacion)) {
			case 'suma':
				$resul = sumar($valor1, $valor2);
				break;
			case 'resta':
				$resul = restar($valor1, $valor2);
				break;
			case 'multiplicacion':
				$resul = multiplicar($valor1, $valor2);
				break;
			case 'dividir':
				$resul = dividir($valor1, $valor2);
				break;
			default:
				$resul = sumar($valor1, $valor2);
				break;
		}
		
		return $resul;
	}
	
	/**
	 * Suma cada uno de los valores que le pasamos
	 */
	function sumar($val1,$val2){
		return $val1 + $val2;
	}
	/**
	 * Resta cada uno de los valores que le pasamos
	 */
	function restar($val1,$val2){
		return $val1 - $val2;
	}
	
	/**
	 * Multiplica cada uno de los valores que le pasamos
	 */
	function multiplicar($val1,$val2){
		return $val1 * $val2;
	}
	
	/**
	 * Divide cada uno de los valores que le pasamos
	 */
	function dividir($val1,$val2){
		return round(($val1 / $val2),2);
	}
?>