<?php
	include 'lib/gestionDB.php';
		
	$tabla = $_POST['tabla'];
	
	$nombre = trim($_POST['nombre']);
	$direccion = trim($_POST['direccion']);
	$telefono = trim($_POST['telefono']);
	$localidad = trim($_POST['localidad']);
	$cp = trim($_POST['cp']);
	$fax = trim($_POST['fax']);
	$contacto = trim($_POST['contacto']);
	$email = trim($_POST['email']);
	//$activo = trim($_POST['activo']);
	$observaciones = trim($_POST['observaciones']);
	
	$date = date('Y-m-d H:i:s');
	/*if($_POST['activo']=='on'){
		$activo = 1;	
	}else{
		$activo = 0;	
	}*/
	
	
	if(strlen($nombre)==0){
		echo "<b>Falta de introducir los campos obligatorios</b>";
		echo "<br /><a href='form_clientes.php'>Volver</a>";
	}
	
	//Nos conectamos a la base de datos
	conectar();
	
	$query = "
			INSERT INTO " . $tabla ."(
				NOMBRE,OBSERVACIONES,DIRECCION,LOCALIDAD,CP,CONTACTO,TELEFONO,FAX,EMAIL,FECHA_ALTA,ULT_FECHA,ACTIVO) 
				VALUES (
					'".mysql_real_escape_string($nombre)."','". mysql_real_escape_string($observaciones)."','".mysql_real_escape_string($direccion) ."','".($localidad)."',
					'".mysql_real_escape_string($cp) ."','". mysql_real_escape_string($contacto)."','".mysql_real_escape_string($telefono)."','". mysql_real_escape_string($fax) ."',
					'".mysql_real_escape_string($email) ."','". $date ."','". $date ."',1)";
	echo ejecutarQuery($query);
	
	desconectar();
	
	
?>

<a href="javascript:history.back()"  class='awesome medium red'>Volver a al pagiana anterior</a>