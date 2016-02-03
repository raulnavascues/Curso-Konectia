<?php

if (strlen(trim($_POST["nombre"])) == 0) //Validamos todos los campos obligatorios con ||
{
	echo "Falta de introducir los campos obligatorios";
	echo "<br><a href='form_bbdd_clientes.php'>Volver</a>";
}
else
{
$link = mysql_connect('localhost', 'konectia', 'konectia') or die('No se pudo conectar: ' . mysql_error());

mysql_select_db('konectia') or die('No se pudo seleccionar la base de datos');

$fecha = date('Y-m-d H:i:s');



$query = 'INSERT INTO clientes 
            (NOMBRE, OBSERVACIONES, DIRECCION, LOCALIDAD, CP, CONTACTO, 
             TELEFONO, FAX, EMAIL, PUNTUACION, FECHA_ALTA, ULT_FECHA, ACTIVO ) 
            VALUES 
            ("'.mysql_real_escape_string(trim($_POST["nombre"])).'",
             "'.mysql_real_escape_string(trim($_POST["observaciones"])).'",
             "'.mysql_real_escape_string(trim($_POST["direccion"])).'",
             "'.mysql_real_escape_string(trim($_POST["localidad"])).'",
             "'.mysql_real_escape_string(trim($_POST["cp"])).'",
             "'.mysql_real_escape_string(trim($_POST["contacto"])).'",
             "'.mysql_real_escape_string(trim($_POST["telefono"])).'",
             "'.mysql_real_escape_string(trim($_POST["fax"])).'",
             "'.mysql_real_escape_string(trim($_POST["email"])).'",
             0,
             "'.$fecha.'",
             "'.$fecha.'",
             1)';





$resultado = mysql_query($query, $link);

if ($resultado > 0 )
{
	$idInsertado = mysql_insert_id();
	echo "Nuevo registro insertado con el ID: ".$idInsertado;
}
else
{
		echo "Se ha producido un error. Intentelo más tarde. Si el error continua pongase en contacto con el administrador";
}
	}
?>