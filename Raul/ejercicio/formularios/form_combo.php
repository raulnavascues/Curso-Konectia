<html>
	<head>
		<title>Formulario sobre misma página</title>
	</head>
<body>
<?php
	if (empty($_POST))
	{
?>
	<form action="form_matematicas.php" method="POST">
	<input type="hidden" name="form_origen" value="combo" />
		<label>Valor 1:</label>
		<input type="text" id="txtValor1" name="txtValor1" value="" />
		<br />
		<br />
		<label>Valor 2:</label>
		<input type="text" id="txtValor2" name="txtValor2" value="" />
		<br />
		<br />
		<label>Operación:</label>
		<select id="Operacion" name="Operacion">
			<option value="suma">Suma</option>
			<option value="resta">Resta</option>
			<option value="multiplicacion">Multiplicacion</option>
			<option value="division">Division</option>
		</select>
		<br />
		<br />
		<input type="submit" value="Enviar Formulario" name="btnEnviar" />
	</form>
	<?php
	}
	else
		echo "El nombre introducido es: ".$_POST["txtNombre"];
	?>
</body>
</html>