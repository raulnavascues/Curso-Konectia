<html>
	<head>
		<title>Formulario sobre misma página</title>
	</head>
<body>
<?php
	if (empty($_POST))
	{
?>
	<form action="form_mat_check.php" method="POST">
		<label>Valor 1:</label>
		<input type="text" id="txtValor1" name="txtValor1" value="" />
		<br />
		<br />
		<label>Valor 2:</label>
		<input type="text" id="txtValor2" name="txtValor2" value="" />
		<br />
		<br />
		<label>Operación:</label>
		<br />
		<input type="Checkbox" name="chkSuma" value="suma"  /> Suma
		<br />
		<input type="Checkbox" name="chkResta" value="resta" /> Resta
		<br />
		<input type="Checkbox" name="chkMultiplicacion" value="multiplicacion" /> Multiplicacion
		<br />
		<input type="Checkbox" name="chkDivision" value="division" /> Division
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