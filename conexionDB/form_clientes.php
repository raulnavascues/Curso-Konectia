<!DOCTYPE html>
<html>
	<head>
		<title>Formulario de alta de clientes</title>
		<link href="css/formularios.css" rel="stylesheet" />
		<link href="css/styles.css" rel="stylesheet" />
		<link href="css/botones.css" rel="stylesheet" />
		
		<link href="css/menu.css" rel="stylesheet" />
		<link href="css/layout.css" rel="stylesheet" />
		
		<script src="js/scriptMenu.js" type="text/javascript" language="JavaScript"></script>
		
		
	</head>
	<body>
		<div id="centrar">
		<?php include 'include/menu.php';?>
			<form action="insertar.php" method="post" class="contact-form">
				<fieldset>
					<legend>Formulario de alta de clientes: </legend>
					<?php include 'include/formulario.php';?>
					<div><input type="submit" name="btnEnviar" id="btnEnviar" value="Enviar" class="enviar" /></div>
					<input type="hidden" name="tabla" id="tabla" value="clientes"  />
				</fieldset>
			</form>
		</div>
	</body>
</html>