<?php
	include '../lib/funciones.php';
	
	$respuesta="";
	
	$valor1 = intval($_POST['txtValor1']);
	$valor2 = intval($_POST['txtValor2']);
	$origen = $_POST['origen'];
	
	switch ($origen) {
		case 'combo':
			$operacion = $_POST['cmbOperacion'];
			$respuesta = origenComboRadio($valor1, $valor2, $operacion);
			break;
		case 'radio':
			$operacion = $_POST['rdbOperacion'];
			$respuesta = origenComboRadio($valor1, $valor2, $operacion);		
			break;
		case 'check':
			$respuesta = origenCheck($valor1, $valor2);		
			break;
		default:
			$respuesta .="El metodo seleccionado no esta disponible";		
			break;
	}

	echo $respuesta;
	
	function origenCheck($valor1, $valor2){
		$respuesta ="";
		if(isset($_POST['tipod'])){
			$arrayOperacion = $_POST['tipod']; 
			for($i=0;$i<count($arrayOperacion);$i++) {
				$operacion = $arrayOperacion[$i];
				$respuesta .= "El resultado de la operacion '". ucfirst($operacion) ."' es: <b style='color:blue'>" . resultado($valor1,$valor2,$operacion)."</b><br />";
			}
		}else{
			$operacion = '';
			$respuesta .= "El resultado de la operacion 'Suma' es: <b style='color:blue'>" . resultado($valor1,$valor2,$operacion)."</b><br />";
		}
		
		return $respuesta;
	}
	
	function origenComboRadio($valor1, $valor2, $operacion){
		$respuesta ="";
		if ($operacion ==''){
				$respuesta .= "El resultado de la operacion 'Suma' es: <b style='color:green'>" . resultado($valor1,$valor2,$operacion)."</b>";
			}else {
				$respuesta .= "El resultado de la operacion '". ucfirst($operacion) ."' es: <b style='color:green'>" . resultado($valor1,$valor2,$operacion)."</b>";
			}	
			
			return $respuesta;
	}
?>