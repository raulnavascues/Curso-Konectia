<?php
	include 'lib/gestionDB.php';
	
	$nif = $_POST['nif'];
	$tabla = $_POST['tabla'];

	$query = "
		SELECT
			NIF, NOMBRE, RAZON_SOCIAL, DIRECCION, LOCALIDAD, CP
		FROM 
			". $tabla."
		WHERE
			NIF ='". mysql_real_escape_string($nif)."'";
			
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