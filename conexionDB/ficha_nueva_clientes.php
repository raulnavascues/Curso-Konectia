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
			
			function cargar_tabla_trabajos(id){
				
				$.ajax({
					url: "lib/cargar_listado_trabajos.php",
					type: "post",
					dataType: 'html',
					data: {
						"id": id	
					},
					success : function(respuesta) {
						$("#t_body_trabajos").html(respuesta);
					 }
				});
			}
			$(document).ready(function(){
				consultar_cliente($.urlParam('nif'));
				
				
				$('#btnNuevoTrabajo').click(function(){
					$('#tablaTrabajos').removeClass('mostrar').addClass('ocultar');
					$('#nuevoTrabajo').removeClass('ocultar').addClass('mostrar');
				})
				
				$('#btnCerrar').click(function(){
					$('#tablaTrabajos').removeClass('ocultar').addClass('mostrar');
					$('#nuevoTrabajo').removeClass('mostrar').addClass('ocultar');
							
					$('#nombreTrabajo').val('');
					$("#proveedorTrabajo").val('');
					$("#tipos_trabajo").val('');
					$("#fechaTrabajo").val('');
					$("#precioTrabajo").val(0);
					$("#descripcionTrabajo").val('');
				});
				$('#btnBuscar').click(function(){
					consultar_cliente();
				});
				$('#btnGuardarTrabajo').click(function(){
						// Guardar los datos del formulario
						$.ajax({
							url: "lib/guardarTrabajo.php",
							type: "post",
							data:$('#nuevo_trabajo').serializeArray(),					
							dataType: 'html',
							success : function(respuesta) {
								//Actualizar la puntuacion del cliente
								$('#puntuacion').val(parseInt($('#puntuacion').val()) +parseInt($('#puntuacion_trab').val()));
								//Recargar la tabla de los trabajos
								cargar_tabla_trabajos(10);
								// Ocultar el de alta de trabajos y mostrar la tabla recargada
								$('#tablaTrabajos').addClass('mostrar');
								$('#tablaTrabajos').removeClass('ocultar');
								$('#nuevoTrabajo').addClass('ocultar');
								$('#nuevoTrabajo').removeClass('mostrar');
								
								resetear();
							},
							error: function(){
								alert('Ha habido algun error. Revise los campos y vulvalo a intentarlo mas tarde');			
							}
						});					
					});
					
					$.ajax({
						url: "lib/cargaSelect.php",
						type: "post",
						dataType: 'html',
						data: "tabla=proveedores&seleccionado=0",
						success : function(respuesta) {
							$("#proveedorTrabajo").html(respuesta);
						 }
					});
					$.ajax({
						url: "lib/cargaSelect.php",
						type: "post",
						dataType: 'html',
						data: "tabla=tipo_trabajo&seleccionado=0",
						success : function(respuesta) {
							$("#tipos_trabajo").html(respuesta);
						 }
					});
			});
			$.urlParam = function(name){
				var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
				return results[1] || 0;
			}
			
			function consultar_cliente(nif){
				$.ajax({
						url: 'buscar.php',
						data: {
							'nif'	: nif,
							//'id' 	: 	'10',
							'tabla'	: 	'clientes',
							'sort'	: 	'C'
						},
						type: 'post',
						dataType: 'json',
						beforeSend: function(){
							limpiar_campos();
							$("#errores").hide();
						},
						success:function(result){
							for(i=0; i<result.length; i++){
								id = result[i].ID;
								$('#id_cliente').val(id);
								$('#nif').val(result[i].NIF);
								$('#nombre').val(result[i].NOMBRE);
								$('#razonsocial').val(result[i].RAZON_SOCIAL);
								$('#direccion').val(result[i].DIRECCION);
								$('#localidad').val(result[i].LOCALIDAD);
								$('#cp').val(result[i].CP);
								$('#puntuacion').val(result[i].PUNTUACION_TRABAJO);
							}
							cargar_tabla_trabajos(id);
						},
						error:function (jqXHR, textStatus, errorThrown){
							$('#errores')
								.show()
								.html('Error a la hora de buscar un cliente. Revise por favor los datos de busqueda')
								.removeClass('cliente_encontrado').addClass('error_cliente');
						}
					});
			}
			
			function resetear(){
					$('#nombreTrabajo').val();
					$("#proveedorTrabajo").val('-1');
					$("#tipos_trabajo").val('-1');
					$("#fechaTrabajo").val('');
					$("#precioTrabajo").val(0);
					$("#descripcionTrabajo").val();
				}
		</script>
		
	</head>
	<body>
		<div id="centrar">
			<?php include 'include/menu.php'; ?>
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
							<span class="etiquetas">Puntuacion</span>
							<input class="campos" type="text" id="puntuacion" name="puntuacion" readonly="readonly" maxlength="5" placeholder="Introducir el codigo postal" value="" />
						</div>
						<div>
							<input type="button" name="btnBuscar" id="btnBuscar" value="Buscar" class="enviar awesome large black"  />
						</div>
				</fieldset>
			</form>
		<div class="clear"></div>
	
		<div id='tablaTrabajos' class="mostrar">
			<input type="button" name="btnNuevoTrabajo" id="btnNuevoTrabajo" value="Nuevo trabajo" class="enviar awesome large black"  />
		
		
		
			<span class='titulo_tabla_clientes'>Tabla de trabajos de un cliente</span>
			<table id='trabajosClientes' name='trabajosClientes'>
				<thead>
					<th style='text-align:left; display:none;'>ID</th>
					<th style='text-align:left'>Nombre Trabajo</th>
					<th style='text-align:left'>Proveedor</th>
					<th style='text-align:left'>Fecha</th>
					<th style='text-align:left'>Tipo</th>
					<th style='text-align:right'>Precio</th>
					<th style='text-align:right'>P</th>
					<th style='text-align:right'>Activo</th>
					<th style='text-align:right'>Editar</th>
					<th style='text-align:right'>Borrar</th>
				</thead>
				<tbody id="t_body_trabajos"></tbody>
			</table>
		</div>
	
	
	<div id="nuevoTrabajo" class="ocultar">
			<form class="contact-form" id="nuevo_trabajo">
				<fieldset>
					<legend>Nuevo trabajo</legend>
						<input type="hidden" name = "id_cliente" id= "id_cliente" value = "10" />
						<div>
							<span class="etiquetas">Nombre</span>
							<input class="campos" type="text" id="nombreTrabajo" maxlength="255" placeholder="Introducir el nombre del trabajo" name="nombreTrabajo" value="" />
						</div>
						<div>
							<span class="etiquetas">Proveedor</span>
							<select id="proveedorTrabajo" name="proveedorTrabajo" class="campos"></select>
						</div>
						<div>
							<span class="etiquetas">Tipos de trabajo</span>
							<select id="tipos_trabajo" class="campos" name="tipos_trabajo"></select>
						</div>
						<div>
							<span class="etiquetas">Fecha</span>
							<input class="campos" type="text" id="fechaTrabajo" name="fechaTrabajo" maxlength="100" placeholder="Introducir la fecha con formato dd/mm/aaaa" value=""  />
						</div>
						<div>
							<span class="etiquetas">Precio</span>
							<input class="campos" type="text" id="precioTrabajo" name="precioTrabajo" maxlength="5" placeholder="Introducir el precio del trabajo" value="" />
						</div>
						<div>
							<span class="etiquetas">Descripcion</span>
							<textarea class="campos" name="descripcionTrabajo" id="descripcionTrabajo"></textarea>
						</div>
						<input type="hidden" id="puntuacion_trab" name="puntuacion_trab" value="" />
						<input type="button" name="btnCerrar" id="btnCerrar" value="Cerrar" class="enviar awesome large black" />
						<input type="button" name="btnGuardarTrabajo" id="btnGuardarTrabajo" value="Guardar" class="enviar awesome large black" />
				</fieldset>
			</form>
		</div>
	</div>
	</body>
	<script>
		//Comprobar la puntuacion de los trabajos
		$(document).ready(function(){
			$('#fechaTrabajo').blur(function(){
				$.ajax({
					url		: 	'lib/comprobar_puntuacion_trabajo.php',
					data	: 	{
						'fecha_trabajo'	: 	$(this).val(),
						'id_tipo_tabajo': 	$('#tipos_trabajo').val()
					},
					type: 'post',
					dataType:'json',
					success:function(data){
						$('#puntuacion_trab').val(data.PUNTOS);
					},
					error:function(){
						alert('error');
					}
				});
			});
		});
	</script>
</html>