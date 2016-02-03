<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<title>Saludo</title>
	</head>
	<body>
		<?php
			echo 'Primera linea <br />';
			echo 'Segunda Linea <br />';
			
			
			$conexion = mysqli_connect('localhost','konectia','konectia','konectia',3306);
			
			if (!$conexion) {
			    echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
			    echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
			    echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
			    exit;
			}

			echo "Éxito: Se realizó una conexión apropiada a MySQL! La base de datos 'konectia' es genial." . PHP_EOL;
			echo "Información del host: " . mysqli_get_host_info($conexion) . PHP_EOL;
			
			$resultado = $conexion->query("SELECT * FROM clientes");
			
			echo mysqli_affected_rows($resultado);
			
			mysqli_close($conexion);
		?>				
	</body>
</html>