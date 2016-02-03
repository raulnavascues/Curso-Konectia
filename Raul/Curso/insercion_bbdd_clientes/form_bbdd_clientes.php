<html>
	<head>
		<title>Clientes</title>
	</head>
<body>

	<form action="insercion_bbdd_clientes.php" method="POST">
		   
        <label>Nombre:</label>
		<input type="text" id="nombre" name="nombre" value="" maxlength="255" />
		<br />
		<br />
		<label>Observaciones:</label>
		<input type="text" id="observaciones" name="observaciones" value="" />
		<br />
		<br />
		<label>Direccion:</label>
		<input type="text" id="direccion" name="direccion" value="" />
		<br />
		<br />
		<label>Localidad:</label>
		<input type="text" id="localidad" name="localidad" value="" />
		<br />
		<br />
		<label>CP:</label>
		<input type="text" id="cp" name="cp" value="" />
		<br />
		<br />
		<label>Contacto:</label>
		<input type="text" id="contacto" name="contacto" value="" />
		<br />
		<br />
		<label>Telefono:</label>
		<input type="text" id="telefono" name="telefono" value="" />
		<br />
		<br />
		<label>Fax:</label>
		<input type="text" id="fax" name="fax" value="" />
		<br />
		<br />
		<label>Email:</label>
		<input type="text" id="email" name="email" value="" />
		<br />
		<br />
		<label>Fecha</label>
		<input type="text" value="" name="fecha" id="fecha" placeholder="aaaa-mm-dd"/>
		
		<br />
		<input type="submit" value="Enviar Formulario" name="btnEnviar" />
	</form>
	
</body>
</html>