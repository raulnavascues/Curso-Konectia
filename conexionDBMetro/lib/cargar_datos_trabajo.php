<?php include 'gestionDB.php'; 

	$id = $_GET['id'];
	
	conectar();
	$query = "
		SELECT
			T.NOMBRE AS NOMBRE,
			T.DESCRIPCION AS DESCRIPCION,
			T.ID_CLIENTE AS CLIENTE,
			T.ID_PROVEEDOR AS PROVEEDOR,
			T.ID_TIPO_TRABAJO AS TIPO_TRABAJO,
			P.PUNTUACION AS PUNTUACION,
			T.PRECIO AS PRECIO,
			DATE_FORMAT(T.FECHA, '%d/%m/%Y') AS FECHA,
			T.ACTIVO AS ACTIVO
		FROM
			TRABAJOS T
		LEFT JOIN
			TIPOS_TRABAJO_PUNTUACION P ON (
				T.ID_TIPO_TRABAJO = P.ID_TRABAJO 
			AND 
				T.FECHA BETWEEN P.FECHA_DESDE AND P.FECHA_HASTA
			)
		WHERE
			T.ACTIVO = 1 
		AND
			T.ID = ". $id;
		
		
		//echo $query;
		$result = ejecutarConsulta($query);
		
		$cliente = "";
		$proveedor ="";
		$tipoTrabajo ="";
		$nombre = "";
		$descripcion = "";
		$puntuacion = 0;
		$precio = 0;
		$fecha ="";
		$activo = 0;
		if (mysql_num_rows($result)>0){
			while($rowC = mysql_fetch_array($result,MYSQL_ASSOC)){
			   		$rowsC[] = $rowC;
			}
			/*$cliente = $rowsC[0]['CLIENTE'];
			$proveedor = $rowsC[0]['PROVEEDOR'];
			$tipoTrabajo = $rowsC[0]['TIPO_TRABAJO'];
			$activo = $rowsC[0]['ACTIVO'];
			$nombre = $rowsC[0]['NOMBRE'];
			$fecha = $rowsC[0]['FECHA'];
			$precio = number_format($rowsC[0]['PRECIO'], 2,",",".");
			$puntuacion = $rowsC[0]['PUNTUACION'];
			$descripcion = $rowsC[0]['DESCRIPCION'];*/
			
			echo json_encode($rowsC);
		}
	//ECHO mysql_num_rows($result);
	
	
?>