<!DOCTYPE html>
<html>
	<head>
		<title>Formulario de alta de clientes</title>
		<!--<divnk href="css/formularios.css" rel="stylesheet" />-->
		<link href="css/reset.css" rel="stylesheet" />
		
		<link href="css/menu.css" rel="stylesheet" />
		<link href="css/layout.css" rel="stylesheet" />
		<link href="css/jquery-ui.css" rel="stylesheet" />
		
		<link href="css/styles.css" rel="stylesheet" />
		<link href="css/botones.css" rel="stylesheet" />
		<script src="js/scriptMenu.js" type="text/javascript" language="JavaScript"></script>
		
		<script src="js/jquery-1.11.3.js" type="text/javascript" language="JavaScript"></script>
		<script src="js/jquery-ui.js" type="text/javascript" language="JavaScript"></script>
		<script type="text/javascript" language="JavaScript">
		
				function cargar_tabla_trabajos(){
					cliente = <?php echo $_GET['id']; ?>;
					$.ajax({
						url: "lib/cargar_listado_trabajos.php",
						type: "post",
						dataType: 'html',
						data: "id="+ cliente,
						success : function(respuesta) {
							$("#t_body_trabajos").html(respuesta);
						 }
					});
				}
				
				function resetear(){
					$('#nombreTrabajo').val();
					$("#proveedorTrabajo").val('');
					$("#tipos_trabajo").val('');
					$("#fechaTrabajo").val('');
					$("#precioTrabajo").val(0);
					$("#descripcionTrabajo").val();
				}
				
				$(document).ready(function(){
					
					$("#fechaTrabajo").datepicker({
						// Formato de la fecha
					    dateFormat: "dd/mm/yy",
					    // Primer dia de la semana El lunes
					    firstDay: 1,
					    // Dias Largo en castellano
					    dayNames: [ "Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado" ],
					    // Dias cortos en castellano
					    dayNamesMin: [ "Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa" ],
					    // Nombres largos de los meses en castellano
					    monthNames: [ "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre" ],
					    // Nombres de los meses en formato corto 
					    monthNamesShort: [ "Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dec" ],
					    // Cuando seleccionamos la fecha esta se pone en el campo Input 
					    onSelect: function(dateText) { 
					          $('#fecha').val(dateText);
					      }
					});
					
					cargar_tabla_trabajos();
					
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
									
					$('#btnGuardarTrabajo').click(function(){
						// Guardar los datos del formulario
						$.ajax({
							url: "lib/guardarTrabajo.php",
							type: "post",
							data:$('#nuevo_trabajo').serializeArray(),					
							dataType: 'html',
							success : function(respuesta) {
								//Recargar la tabla de los trabajos
								cargar_tabla_trabajos();
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
					$('#btnActualizar').click(function(){
						if (validarDatos()){
							$.ajax({
								url: "lib/actualizar.php",
								type: "post",
								data:$('#contacto').serializeArray(),					
								dataType: 'html',
								success : function(respuesta) {
									$(location).attr('href', 'index.php');
								},
								error: function(){
									alert('Ha habido algun error. Revise los campos y vulvalo a intentarlo mas tarde');			
								}
							});
						}	
					});
					
					$(document).on("click",".borrar", function(){
						$.ajax({
							
						});
					});
				});
				
			function validarDatos(){
				activar = true;
				
				if($('#nombre').val()!=''){
					$('#nombre').removeClass('rojo');
					$('#nombre').addClass('verde');
					activar = true;
				}else{
					$('#nombre').removeClass('verde');
					$('#nombre').addClass('rojo');
					activar = false;
				}
				
				if($('#direccion').val()!=''){
					$('#direccion').removeClass('rojo');
					$('#direccion').addClass('verde');
					activar = true;
				}else{
					$('#direccion').removeClass('verde');
					$('#direccion').addClass('rojo');
					activar = false;
				}
				
				if($('#localidad').val()!=''){
					$('#localidad').removeClass('rojo');
					$('#localidad').addClass('verde');
					activar = true;
				}else{
					$('#localidad').removeClass('verde');
					$('#localidad').addClass('rojo');
					activar = false;
				}
				
				return activar;
			}
			
			
			
			/*function activar(){
				if(document.getElementById('activo').value == true){
					document.getElementById('activado').value = "true";
				}else{
					document.getElementById('activado').value = "false";
				}
			}*/
		</script>
	</head>
<body>
	<div id="centrar">
<?php
	include 'include/menu.php';
	include 'lib/gestionDB.php';
	
	$id = trim($_GET['id']);
	
	if (is_numeric($id)){
		switch ($_GET['opciones']) {
			case 'editar':
				editar($id);
				break;
			case 'eliminar':
				eliminar($id);
				break;
			default:
				
				break;
		}
	}else{
		echo "ERROR no se ha introducido un id correcto.<br />";
		echo "<a href='verdatos.php' class='awesome medium red'>Volver</a>";
	}
	
	
	
	function eliminar($id){
		conectar();
		if (ejecutarQuery("UPDATE clientes SET ACTIVO = 0, ULT_FECHA = '". date('Y-m-d H:i:s'). "' WHERE ID=". $id)==1){
			echo "<h1>El Cliente seleccionado se ha dado de baja</h1><br />";
			echo "<a href='index.php' class='awesome medium red'>Volver a pagina principal</a>";
		}else{
			echo "<h1>Ha habido un problema que no se ha podido darle de baja</h1><br />";
			echo "<a href='index.php' class='awesome medium red'>Volver a pagina principal</a>";
		}
	}
	
	function editar($id){
		
		conectar();
		$result = ejecutarConsulta("SELECT * FROM CLIENTES WHERE ID=" . $id);
		
		if (mysql_num_rows($result)>0){
		while($rowC = mysql_fetch_array($result,MYSQL_ASSOC)){
		   $rowsC[] = $rowC;
		}
?>
		<form id="contacto">
			<fieldset>
				<legend>Ficha de cliente</legend>
				
				<input type="hidden" id ="id" name="id" value=<?php echo $rowsC[0]['ID']; ?> />
				<input type="hidden" id ="tabla" name="tabla" value="clientes" />
				<input type="hidden" id ="activado" name="activado" value="" />
				
				<div>
					<span class="etiquetas">Nombre</span>
					<input class="campos" type="text" id="nombre" name="nombre" maxlength="255" placeholder="Introducir el nombre" value="<?php echo $rowsC[0]['NOMBRE']; ?>" />
				</div>
				<div>
					<span class="etiquetas">Direccion</span>
					<input class="campos" type="text" id="direccion" name="direccion" maxlength="100" placeholder="Introducir la direccion" value="<?php echo $rowsC[0]['DIRECCION']; ?>" />
				</div>
				<div>
					<span class="etiquetas">Localidad</span>
					<input class="campos" type="text" id="localidad" name="localidad" maxlength="100" placeholder="Introducir la localidad" value="<?php echo $rowsC[0]['LOCALIDAD']; ?>" />
				</div>
				<div>
					<span class="etiquetas">C.P.</span>
					<input class="campos" type="text" id="cp" name="cp" maxlength="5" placeholder="Introducir el codigo postal" value="<?php echo $rowsC[0]['CP']; ?>" />
				</div>
				<div>
					<span class="etiquetas">Telefono</span>
					<input class="campos" type="text" id="telefono" name="telefono" maxlength="20" placeholder="Introducir el telefono" value="<?php echo $rowsC[0]['TELEFONO']; ?>" />
				</div>
				<div>
					<span class="etiquetas">Fax</span>
					<input class="campos" type="text" id="fax" name="fax" maxlength="20" placeholder="Introducir el fax" value="<?php echo $rowsC[0]['FAX']; ?>" />
				</div>
				<div>
					<span class="etiquetas">Contacto</span>
					<input class="campos" type="text" id="contacto_cli" name="contacto_cli" maxlength="100" placeholder="Introducir el contacto" value="<?php echo $rowsC[0]['CONTACTO']; ?>" />
				</div>
				<div>
					<span class="etiquetas">Email</span>
					<input class="campos" type="text" id="email" name="email"  maxlength="20" placeholder="Introducir el email con el formato: alguien@dominio.com" value="<?php echo $rowsC[0]['EMAIL']; ?>" />
				</div>
				<div>
					<span class="etiquetas observaciones">Observaciones</span>
					<textarea class="campos" name="observaciones" id="observaciones"><?php echo $rowsC[0]['OBSERVACIONES']; ?></textarea>
				</div>
				<div>
					<span class="etiquetas">Activo</span>
					<input class="squaredOne" type="checkbox" id="activo" name="activo" <?php if($rowsC[0]['ACTIVO']==1){ ?> checked <?php } ?> />
				</div>
				<div>
					<input type="button" name="btnActualizar" id="btnActualizar" value="Actualizar" class="enviar awesome large black"  />
				</div>
				<!--<div><span>Puntuacion</span><input  type="text" id="puntuacion" name="puntuacion" readonly /></div>-->
				<div></div>
					
			</fieldset>
		</form>
	<div class="clear"></div>
<?php	
	
		}else{
			echo "<h1>Cliente no encontrado</h1><br />";
			echo "<a href='verdatos.php' class='awesome medium red'>Volver</a>";
		}
		desconectar();
	}
	
		
?>


<!-- Mostramos los trabajos del cliente en cuestion-->
	<div id='tablaTrabajos' class="mostrar">
	<input type="button" name="btnNuevoTrabajo" id="btnNuevoTrabajo" value="Nuevo trabajo" class="enviar awesome large black"  />
	<?php
		
		?>
			<span class='titulo_tabla_clientes'>Tabla de trabajos de un cliente</span>
			<table id='trabajosClientes' name='trabajosClientes'>
				
				<thead>
					<th style='text-align:left; display:none;'>ID</th>
					<th style='text-align:left'>Nombre Trabajo</th>
					<th style='text-align:left'>Proveedor</th>
					<th style='text-align:left'>Fecha</th>
					<th style='text-align:left'>Tipo</th>
					<th style='text-align:right'>Precio</th>
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
						<input type="hidden" name = "id_cliente" id= "id_cliente" value = "<?php echo $id; ?>" />
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
						<input type="button" name="btnCerrar" id="btnCerrar" value="Cerrar" class="enviar awesome large black" />
						<input type="button" name="btnGuardarTrabajo" id="btnGuardarTrabajo" value="Guardar" class="enviar awesome large black" />
				</fieldset>
			</form>
</div>
	
</div>


</body>
</html>