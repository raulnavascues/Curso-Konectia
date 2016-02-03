<?php
	include 'lib/gestionDB.php';
	
	conectar();
	
	$GLOBALS['activo']= true;
	$registros = -1;
	
	$result = ejecutarConsulta("select count(1) as contador from clientes");
	
	while($rowC = mysql_fetch_array($result,MYSQL_ASSOC)){
		   $rowsC[] = $rowC;
	}
	
	foreach ($rowsC as $rowS) {
		$registros = $rowS['contador'];
	}
	
	$query = "
		SELECT 
			P.ID AS ID, 
			P.NOMBRE AS NOMBRE, 
			P.DIRECCION AS DIRECCION, 
			P.LOCALIDAD AS LOCALIDAD, 
			COUNT(T.ID) AS NUM_TRABAJO, 
			P.ACTIVO AS ACTIVO
		FROM
			PROVEEDORES P
		LEFT JOIN 
			TRABAJOS T ON(P.ID = T.ID_PROVEEDOR AND T.ACTIVO = 1)
		GROUP BY
			P.ID
		ORDER BY
			NOMBRE ASC
	";
	
	
	$resultado = mysql_query($query);
	$tabla = "";	
	
	while($row = mysql_fetch_array($resultado,MYSQL_ASSOC)){
		   $rows[] = $row;
	}
	
	echo json_encode($rows);
	
	desconectar();
?>