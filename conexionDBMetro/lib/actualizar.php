<?php
	include 'lib/gestionDB.php';

	conectar();
	
	$activado = 0;
	if(isset($_POST['activo'])){
		$activado = 1;
	}
	
	$query="UPDATE ". $_POST['tabla'] ." SET NOMBRE='". mysql_real_escape_string($_POST['nombre']).
	"', DIRECCION ='". mysql_real_escape_string($_POST['direccion'])."', 
	LOCALIDAD= '". mysql_real_escape_string($_POST['localidad'])."',ACTIVO= ". $activado.",
	CP='". mysql_real_escape_string($_POST['cp']). "', TELEFONO ='". mysql_real_escape_string($_POST['telefono'])."',
	FAX = '". mysql_real_escape_string($_POST['fax'])."', CONTACTO ='". mysql_real_escape_string($_POST['contacto_cli'])."',
	EMAIL = '" . mysql_real_escape_string($_POST['email']). "', ULT_FECHA='".date('Y-m-d H:i:s')."' WHERE ID = ". mysql_real_escape_string($_POST['id']);
	
	echo $query;
	
	if (ejecutarQuery($query)==1) {
		//header('Location: index.php');//echo "<br /><span style='color:green'>Registro modificado correctamente</span><br /><br />";	
	}else{
		echo "<br /><span style='color:red'>Error al corregir los datos</span><br /><br />";
	}
		
?>