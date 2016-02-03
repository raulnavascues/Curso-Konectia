<?php include 'lib/gestionDB.php'; 

	$id = $_GET['id'];
	
	conectar();
	$query = "
		SELECT
			T.NOMBRE AS NOMBRE,
			T.DESCRIPCION AS DESCRIPCION,
			T.ID_CLIENTE AS CLIENTE,
			T.ID_PROVEEDOR AS PROVEEDOR,
			T.ID_TIPO_TRABAJO AS TIPO_TRABAJO,
			P.PUNTUACION AS PUNTUACION,
			T.PRECIO AS PRECIO,
			DATE_FORMAT(T.FECHA, '%d/%m/%Y') AS FECHA,
			T.ACTIVO AS ACTIVO
		FROM
			TRABAJOS T
		LEFT JOIN
			TIPOS_TRABAJO_PUNTUACION P ON (
				T.ID_TIPO_TRABAJO = P.ID_TRABAJO 
			AND 
				T.FECHA BETWEEN P.FECHA_DESDE AND P.FECHA_HASTA
			)
		WHERE
			T.ACTIVO = 1 
		AND
			T.ID = ". $id;
		
		
		//echo $query;
		$result = ejecutarConsulta($query);
		
		$cliente = "";
		$proveedor ="";
		$tipoTrabajo ="";
		$nombre = "";
		$descripcion = "";
		$puntuacion = 0;
		$precio = 0;
		$fecha ="";
		$activo = 0;
		if (mysql_num_rows($result)>0){
			while($rowC = mysql_fetch_array($result,MYSQL_ASSOC)){
			   		$rowsC[] = $rowC;
			}
			$cliente = $rowsC[0]['CLIENTE'];
			$proveedor = $rowsC[0]['PROVEEDOR'];
			$tipoTrabajo = $rowsC[0]['TIPO_TRABAJO'];
			$activo = $rowsC[0]['ACTIVO'];
			$nombre = $rowsC[0]['NOMBRE'];
			$fecha = $rowsC[0]['FECHA'];
			$precio = number_format($rowsC[0]['PRECIO'], 2,",",".");
			$puntuacion = $rowsC[0]['PUNTUACION'];
			$descripcion = $rowsC[0]['DESCRIPCION'];
		}
	//ECHO mysql_num_rows($result);
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Editar trabajo</title>
		<link href="css/reset.css" rel="stylesheet" />
		<link href="css/styles.css" rel="stylesheet" />
		<!--<link href="css/formularios.css" rel="stylesheet" />-->
		<link href="css/jquery-ui.css" rel="stylesheet" />
		<link href="css/menu.css" rel="stylesheet" />
		<link href="css/layout.css" rel="stylesheet" />
		
		<script src="js/jquery-2.1.4.js" type="text/javascript" language="JavaScript"></script>
		<script src="js/jquery-ui.js" type="text/javascript" language="JavaScript"></script>
			<script src="js/scriptMenu.js" type="text/javascript" language="JavaScript"></script>
		<script>
			$(document).ready(function(){
				$.ajax({
					url: "lib/cargaSelect.php",
					type: "post",
					dataType: 'html',
					data: "tabla=id_clientes&seleccionado=<?php echo $cliente ?>",
					success : function(respuesta) {
						$("#clientes").html(respuesta);
					 }
				});
				$.ajax({
					url: "lib/cargaSelect.php",
					type: "post",
					dataType: 'html',
					data: "tabla=proveedores&seleccionado=<?php echo $proveedor ?>",
					success : function(respuesta) {
						$("#proveedor").html(respuesta);
					 }
				});
				$.ajax({
					url: "lib/cargaSelect.php",
					type: "post",
					dataType: 'html',
					data: "tabla=tipo_trabajo&seleccionado=<?php echo $tipoTrabajo ?>",
					success : function(respuesta) {
						$("#tipos_trabajo").html(respuesta);
					 }
				});
		
				$("#fecha").datepicker({
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
				
				$('#btnActualizar').click(function(){
						$.ajax({
							url: "lib/actualizar_trabajo.php",
							type: "post",
							data:$('#trabajos').serializeArray(),					
							dataType: 'html',
							success : function(respuesta) {
								$(location).attr('href', 'index.php');
							},
							error: function(){
								alert('Ha habido algun error. Revise los campos y vulvalo a intentarlo mas tarde');			
							}
						});
					});
				
			});
			
		</script>
	</head>
	<body>
		<div id="centrar">
			<?php include 'include/menu.php'; ?>
			<form class="contact-form" id="contacto">
				<fieldset>
					<legend>Formulario del trabajo <?php echo $nombre; ?></legend>
						<input type="hidden" id="id" name="idCliente" value ="<?php echo $id; ?>"/>
						<div style="float: left">
							<span class="etiquetas">Activo</span>
							<input type="checkbox" id="activo" name="activo" <?php if($activo==1){ ?> checked <?php } ?>/>
						</div>
						<div>
							<span class="etiquetas">Nombre</span>
							<input class="campos"  type="text" id="nombre" maxlength="255" placeholder="Introducir el nombre del trabajo" name="nombre" value="<?php echo $nombre; ?>" />
						</div>
						<div>
							<span class="etiquetas">Cliente</span>
							<select id="clientes" name="clientes" class="campos"></select>
						</div>
						<div>
							<span class="etiquetas">Proveedor</span>
							<select id="proveedor" name="proveedor" class="campos"></select>
						</div>
						<div>
							<span class="etiquetas">Tipos de trabajo</span>
							<select id="tipos_trabajo" name="tipos_trabajo" class="campos"></select>
						</div>
						<div>
							<span class="etiquetas">Fecha</span>
							<input class="campos" type="text" id="fecha" name="fecha" maxlength="100" placeholder="Introducir la fecha con formato dd/mm/aaaa" value="<?php echo $fecha; ?>"  />
						</div>
						<div>
							<span class="etiquetas">Precio</span>
							<input class="campos" type="text" id="precio" name="precio" maxlength="5" placeholder="Introducir el precio del trabajo" value="<?php echo $precio; ?>" />
						</div>
						<div>
							<span class="etiquetas">Puntuacion</span>
							<input class="campos" type="text" id="puntuacion" name="puntuacion" maxlength="5" placeholder="Introducir la puntuacion del tipo de trabajo" value="<?php echo $puntuacion; ?>" />
						</div>
						<div>
							<span class="etiquetas">Descripcion</span>
							<textarea class="campos" name="descripcion" id="descripcion"><?php echo $descripcion; ?></textarea>
						</div>
						<input type="button" name="btnActualizar" id="btnActualizar" value="Actualizar" class="enviar" />
				</fieldset>
			</form>
		</div>
	</body>
</html>