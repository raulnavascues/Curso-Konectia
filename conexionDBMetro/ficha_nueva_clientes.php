<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Pagina principal</title>
		<script src="js/jquery-1.11.3.js" type="text/javascript" language="JavaScript"></script>
		<link href="css/reset.css" rel="stylesheet" />
		<link href="css/styles.css" rel="stylesheet" />
		<link href="css/menu.css" rel="stylesheet" />
		<link href="css/layout.css" rel="stylesheet" />
		<link href="css/botones.css" rel="stylesheet" />
		<!--<link href="css/main.css" rel="stylesheet" />-->
		<script>
			function limpiar_campos(){
				$('#nombre').val('');
				$('#razonsocial').val('');
				$('#direccion').val('');
				$('#localidad').val('');
				$('#cp').val('');
			}
			$(document).ready(function(){
				$('#btnBuscar').click(function(){
					$.ajax({
						url: 'buscar.php',
						data: {
							'nif': $('#nif').val(),
							'tabla': 'clientes'
						},
						type: 'post',
						dataType: 'json',
						beforeSend: function(){
							limpiar_campos();
						},
						success:function(result){
							$("#errores")
										.html("Cliente encontrado")
										.removeClass('error_cliente')
										.addClass('cliente_encontrado');
							
							for(i=0; i<result.length; i++){
								$('#nombre').val(result[i].NOMBRE);
								$('#razonsocial').val(result[i].RAZON_SOCIAL);
								$('#direccion').val(result[i].DIRECCION);
								$('#localidad').val(result[i].LOCALIDAD);
								$('#cp').val(result[i].CP);
							}
						},
						error:function (jqXHR, textStatus, errorThrown){
							$('#errores')
								.html('Error a la hora de buscar un cliente. Revise por favor los datos de busqueda')
								.removeClass('cliente_encontrado').addClass('error_cliente');
						}
					});
				});
			});
		</script>
		
	</head>
	<body>
		<div id="errores"></div>
		<form id="contacto">
			<fieldset>
				<legend>Ficha de cliente</legend>
					<div>
						<span class="etiquetas">NIF</span>
						<input class="campos" type="text" id="nif" name="nif" maxlength="15" placeholder="Introducir el NIF" value="" />
					</div>
					<div>
						<span class="etiquetas">Nombre</span>
						<input class="campos" type="text" id="nombre" name="nombre" maxlength="255" placeholder="Introducir el nombre" value="" />
					</div>
					<div>
						<span class="etiquetas">Razon Social</span>
						<input class="campos" type="text" id="razonsocial" name="razonsocial" maxlength="100" placeholder="Introducir la razon social" value="" />
					</div>
					<div>
						<span class="etiquetas">Direccion</span>
						<input class="campos" type="text" id="direccion" name="direccion" maxlength="100" placeholder="Introducir la direccion" value="" />
					</div>
					<div>
						<span class="etiquetas">Localidad</span>
						<input class="campos" type="text" id="localidad" name="localidad" maxlength="100" placeholder="Introducir la localidad" value="" />
					</div>
					<div>
						<span class="etiquetas">C.P.</span>
						<input class="campos" type="text" id="cp" name="cp" maxlength="5" placeholder="Introducir el codigo postal" value="" />
					</div>
					<div>
						<input type="button" name="btnBuscar" id="btnBuscar" value="Buscar" class="enviar awesome large black"  />
					</div>
			</fieldset>
		</form>
	</body>
</html>