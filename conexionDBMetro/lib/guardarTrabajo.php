<?php
	include 'gestionDB.php';
	
	conectar();
	
	$idCliente =  $_POST['id_cliente'];
	$nombreTrabajo = $_POST['nombreTrabajo'];
	$proveedorTrabajo = $_POST['proveedorTrabajo'];
	$tiposTrabajo = $_POST['tipos_trabajo'];
	$fechaTrabajo = date("Y/m/d",strtotime($_POST['fechaTrabajo']));	
	$descripcionTrabajo = $_POST['descripcionTrabajo'];
	$precioTrabajo = number_format($_POST['precioTrabajo'], 2, ".", ",");
	$fechaActual = date('Y-m-d H:i:s');
	
	$query = "
			INSERT INTO 
				TRABAJOS
			(
				NOMBRE,
				DESCRIPCION,
				ID_CLIENTE,
				ID_PROVEEDOR,
				ID_TIPO_TRABAJO,
				PRECIO,
				FECHA,
				FECHA_ALTA,
				ULT_FECHA,
				ACTIVO
			)VALUES(
				'".mysql_real_escape_string($nombreTrabajo)."',
				'".mysql_real_escape_string($descripcionTrabajo)."',
				".mysql_real_escape_string($idCliente).",
				".mysql_real_escape_string($proveedorTrabajo).",
				".mysql_real_escape_string($tiposTrabajo).",
				".mysql_real_escape_string($precioTrabajo).",
				'".mysql_real_escape_string($fechaTrabajo)."',
				'".$fechaActual."',
				'".$fechaActual."', 1
			)";
			
			echo $query;
			
			if (ejecutarQuery($query)!=1) {
				echo "<br /><span style='color:red'>Error al corregir los datos</span><br /><br />";
			}
?>
