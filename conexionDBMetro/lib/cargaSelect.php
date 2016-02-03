<?php
	include 'gestionDB.php';
	
	$tabla = $_POST['tabla'];
	$seleccionado = $_POST['seleccionado'];
	
	$query = "
		SELECT 
			ID, NOMBRE
		FROM "
			.$tabla.
		" WHERE
			ACTIVO = 1";
	
	conectar();
	$result = ejecutarConsulta($query);
	
	$msg='';
	
	switch ($tabla) {
		case 'clientes':
			$msg = 'un cliente';
			break;
		case 'proveedores':
			$msg = 'un proveedor';
			break;
		case 'tipo_trabajo':
			$msg = 'un tipo de trabajo';
			break;
		default:
			
			break;
	}
	
	$options = "<option value='-1'>Elija ". $msg."</option>";
	if(mysql_num_rows($result) > 0){
		while($rowC = mysql_fetch_array($result,MYSQL_ASSOC)){
		   		$rowsC[] = $rowC;
		}
		
		$checkeado ="";
		foreach ($rowsC as $row) {
			if ($seleccionado == $row['ID']){
				$checkeado = "selected";
			}else{
				$checkeado ="";
			}
			$options .= "<option value='". $row['ID']."' ". $checkeado.">". $row['NOMBRE']."</option>";
		}
	}
	
	echo $options;
	
?>