<?php
	include 'gestionDB.php';
	
	$fecha_trabajo = date("Y-m-d", strtotime($_POST['fecha_trabajo']));
	$id_tipo_trabajo = $_POST['id_tipo_tabajo'];
	
	$query = "
		SELECT 
			PUNTUACION AS PUNTOS
		FROM 
			TIPOS_TRABAJO_PUNTUACION 
		WHERE 
			ID_TRABAJO = ". $id_tipo_trabajo."
		AND
			ACTIVO = 1
		AND
			DATE('".$fecha_trabajo."') >= date_format(FECHA_DESDE, '%Y-%m-%d') AND DATE('".$fecha_trabajo."') <= date_format(FECHA_HASTA, '%Y-%m-%d')";
			
	//echo $query;
	
	conectar();
	
	$resultado = ejecutarConsulta($query);
	
	//echo "AAA:".$resultado;
	
	if (mysql_num_rows($resultado)>0){
		$line = mysql_fetch_array($resultado,MYSQL_ASSOC);
		echo json_encode($line);
	}
	desconectar();
?>