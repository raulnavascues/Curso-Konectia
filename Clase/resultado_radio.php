<?php
	include 'lib/funciones.php';
		
	$valor1 = intval($_POST['txtValor1']);
	$valor2 = intval($_POST['txtValor2']);
	$operacion = $_POST['rdbOperacion'];
	
	if ($operacion ==''){
		echo "El resultado de la operacion 'Suma' es: " . resultado($valor1,$valor2,$operacion);
	}else {
		echo "El resultado de la operacion '". $operacion ."' es: " . resultado($valor1,$valor2,$operacion);
	}
?>