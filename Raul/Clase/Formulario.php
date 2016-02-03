<!DOCTYPE html>
<html>
	<head>
		<title>Prueba envio de datos</title>
	</head>
	<body>
		<?php
		if(empty($_POST)){
		?>
		<form action="Formulario.php" method="post">
			<fieldset>
				<legend>Formulario</legend>
				<input type="text" name="nombre" id="nombre" />
				<input type="submit" value="Enviar" name="btnEnviar" id="btnEnviar" />
			</fieldset>
		</form>
		<?php
			}
			echo "Tu nombre es: <b style='font-style: oblique;'>". $_POST['nombre'] ."</b>";
		?>
	</body>
</html>