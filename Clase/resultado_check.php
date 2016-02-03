<?php
	include 'lib/funciones.php';
	
	$valor1 = intval($_POST['txtValor1']);
	$valor2 = intval($_POST['txtValor2']);
	//$operacion = $_POST['rdbOperacion'];
	if(isset($_POST['tipod'])){
		$arrayOperacion = $_POST['tipod']; 
		for($i=0;$i<count($arrayOperacion);$i++) {
			$operacion = $arrayOperacion[$i];
			echo "El resultado de la operacion '". $operacion ."' es: " . resultado($valor1,$valor2,$operacion)."<br />";
		}
	}else{
		$operacion = '';
		echo "El resultado de la operacion 'Suma' es: " . resultado($valor1,$valor2,$operacion)."<br />";
	}
?>