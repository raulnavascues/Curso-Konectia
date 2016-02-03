<!DOCTYPE html>
<html>
	<head>
		<title>Formulario de alta de clientes</title>
		<link href="css/styles.css" rel="stylesheet" />
		<link href="css/formularios.css" rel="stylesheet" />
	</head>
	<body>
		<div id ="centrar">
			<?php include 'include/menu.php';?>
			<form action="consultar.php" method="post" class="contact-form">
				<fieldset>
					<legend>Consultar datos</legend>
					<label>Id</label><input type="text" id="id" name="id" placeholder="Introducir el id a buscar" />
					<input type="radio" name="opciones" id="opciones" value="editar" checked /><label>Editar</label>
					<input type="radio" name="opciones" id="opciones" value="eliminar" /> <label>Eliminar</label>
					<input type="submit" value="Enviar" name="enviar" id="enviar" class="enviar" />
				</fieldset>
			</form>
		</div>
	</body>
</html>