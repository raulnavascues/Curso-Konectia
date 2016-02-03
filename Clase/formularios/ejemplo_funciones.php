<!DOCTYPE html>
<html>
	<head>
		<title>Calculadora</title>
		<script src="../js/jquery-2.1.4.js"></script>
			<script>
				$(document).ready(function(){
					$("#btnCalcular").click(function(){
						$.ajax({
					  		url: "form_resultados.php",
					  		type: "post",
					  		data:"txtValor1="+ $("#txtvalor1").val() + "&txtValor2=" + $("#txtValor2").val() + 
					  				"&origen=combo&cmbOperacion=" + $("#cmbOperacion").val(), 
					  		dataType: 'html',
					  		success : function(respuesta) {
					    		$("#respuesta").html(respuesta);
					  		}
						});
					});	
				});
		</script>
	</head>
	<body>
		<form>
			<fieldset>
				<legend>Calculadora</legend>
				<label>Valor 1: </label><input type="text" name="txtValor1" id="txtvalor1" placeholder="Introducir el primer valor" /><br />
				<label>Valor 2: </label><input type="text" name="txtValor2" id="txtValor2" placeholder="Introducir el segundo valor" /><br />
				<label>Tipo Valor: </label>
				 <select id="cmbOperacion" name = "cmbOperacion">
				 	<option value="">Elige una opcion</option>
					<option value="suma">Suma</option>
					<option value="resta">Resta</option>
					<option value="multiplicacion">Multiplicacion</option>
					<option value="dividir">Dividir</option>
				</select><br />
				<input type="hidden" name="origen" id="origen" value="combo" />
				<input type="button" value="Calcular" name="btnCalcular" id="btnCalcular" />
			</fieldset>
		</form>
		<div id="respuesta"></div>
	</body>
</html>
