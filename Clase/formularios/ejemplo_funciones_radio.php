<!DOCTYPE html>
<html>
	<head>
		<title>Calculadora</title>
	</head>
	<body>
		<form method="post" action="form_resultados.php">
			<fieldset>
				<legend>Calculadora</legend>
				<label>Valor 1: </label><input type="text" name="txtValor1" id="txtvalor1" placeholder="Introducir el primer valor" /><br />
				<label>Valor 2: </label><input type="text" name="txtValor2" id="txtValor2" placeholder="Introducir el segundo valor" /><br />
				<label>Tipo Valor: </label><br />
				<input type="radio" id="rdbOperacion" name="rdbOperacion" value="suma" checked />Suma<br />
				<input type="radio" id="rdbOperacion" name="rdbOperacion" value="resta" />Resta<br />
				<input type="radio" id="rdbOperacion" name="rdbOperacion" value="multiplicacion" />Multiplicacion<br />
				<input type="radio" id="rdbOperacion" name="rdbOperacion" value="division" />Division<br />
				<input type="hidden" name="origen" value="radio" />
				<input type="submit" value="Calcular" name="btnCalcular" id="btnCalcular" />
			</fieldset>
		</form>
	</body>
</html>
