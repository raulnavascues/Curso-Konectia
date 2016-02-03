<?php
	include 'lib/gestionDB.php';

	conectar();
	
	$activado = 0;
	if(isset($_POST['activo'])){
		$activado = 1;
	}
	$activo = 0;
	if(isset($_POST['activo'])){
		$activo = 1;
	}
	$precio = number_format($_POST['precio'], 2, ".", ",");
	
	echo "<br />".$_POST['fecha']."<br />";
	$fecha = date("Y/m/d",strtotime($_POST['fecha']));
	
	$query="
		UPDATE
			TRABAJOS
		SET
			NOMBRE = '" .mysql_real_escape_string($_POST['nombre'])."',
			DESCRIPCION = '". mysql_real_escape_string($_POST['descripcion'])."',
			ID_CLIENTE = ".$_POST['clientes'].",
			ID_PROVEEDOR=".$_POST['proveedor'].",
			ID_TIPO_TRABAJO=".$_POST['tipos_trabajo'].",
			PRECIO=". $precio. ",
			FECHA='".mysql_real_escape_string($fecha)."',
			ULT_FECHA='".date('Y-m-d H:i:s')."',
			ACTIVO= ". $activo ."
		WHERE
			ID = ". $_POST['id'];
	
	echo $query;
	
	if (ejecutarQuery($query)!=1) {
		echo "<br /><span style='color:red'>Error al corregir los datos</span><br /><br />";
	}
		
?>
