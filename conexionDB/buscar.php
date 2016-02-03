<?php
	include 'lib/gestionDB.php';
	
	$nif = $_POST['nif'];
	$tabla = $_POST['tabla'];
	$sort = $_POST['sort'];
	
	$query = "
		SELECT
			".$sort.".ID,
			".$sort.".NIF, 
			".$sort.".NOMBRE,
			".$sort.".RAZON_SOCIAL,
			".$sort.".DIRECCION, 
			".$sort.".LOCALIDAD, 
			".$sort.".CP, 
			SUM(TTP.PUNTUACION) AS PUNTUACION_TRABAJO
		FROM 
			". $tabla." ".$sort."
		LEFT JOIN 
			TRABAJOS T ON (T.ID_CLIENTE = C.ID AND T.ACTIVO = 1)
		LEFT JOIN
			TIPO_TRABAJO TT ON (TT.ID = T.ID_TIPO_TRABAJO)
		LEFT JOIN
			TIPOS_TRABAJO_PUNTUACION TTP ON (TTP.ID_TRABAJO = TT.ID AND T.FECHA BETWEEN TTP.FECHA_DESDE AND TTP.FECHA_HASTA) 
		WHERE
			".$sort.".NIF ='". mysql_real_escape_string($nif)."'";
	
	//echo $query;
	
	conectar();
	
	$result = ejecutarConsulta($query);
	
	if(mysql_num_rows($result)>0){
		desconectar();
		
		while($rowC = mysql_fetch_array($result,MYSQL_ASSOC)){
			   		$rowsC[] = $rowC;
		}
				
		echo json_encode($rowsC);
	}
	
	
?>