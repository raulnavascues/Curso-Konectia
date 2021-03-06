<?php 
	$id_trabajo = $_GET['id'];
	
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Editar trabajo</title>
		
		<link href="css/styles.css" rel="stylesheet" />
		<link href="css/formularios.css" rel="stylesheet" />
		<link href="css/jquery-ui.css" rel="stylesheet" />
		
		<script src="js/jquery-2.1.4.js" type="text/javascript" language="JavaScript"></script>
		<script src="js/jquery-ui.js" type="text/javascript" language="JavaScript"></script>
		
		<script src="js/angular.js"></script>
		
		<script>
				var embeddedResults;
				var app;
				var json;
				
				embeddedResults = json;
				console.log(embeddedResults);
					
				app= angular.module('myApp', []);
				app.controller("customersCtrl", ["$scope", "$window", function($scope, $window) {
				{$scope.names = embeddedResults;};
				angular.module('myApp', ['ngSanitize']);
				app.filter('unsafe', function($sce) {
					return function(val) {
					return $sce.trustAsHtml(val);
				};
				});	 
				}]);
				
			$(document).ready(function(){
				$.ajax({
					url: "lib/cargar_datos_trabajo.php",
					type: "get",
					data: "id=<?php echo $id_trabajo; ?>",
					dataType: 'json',
					success : function(respuesta) {
						window.json = respuesta;	
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
		<div id="centrar" ng-app="myApp" ng-controller="customersCtrl">
			<?php include 'include/menu.php'; ?>
			<form class="contact-form" id="trabajos">
				<fieldset>
					<legend>Formulario del trabajo <?php echo $nombre; ?></legend>
						<input type="hidden" id="id" name="idCliente" value ="<?php echo $id; ?>"/>
						<div style="float: left">
							<label>Activo</label>
							<input type="checkbox" id="activo" name="activo" <?php if($activo==1){ ?> checked <?php } ?>/>
						</div>
						<div ng-repeat="z in names">
							<label>{{z.NOMBRE}} - Nombre</label>
							<input type="text" id="nombre" maxlength="255" placeholder="Introducir el nombre del trabajo" name="nombre" value="{{z.NOMBRE}}" />
						</div>
						<div>
							<label>Cliente</label>
							<select id="clientes" name="clientes"></select>
						</div>
						<div>
							<label>Proveedor</label>
							<select id="proveedor" name="proveedor"></select>
						</div>
						<div>
							<label>Tipos de trabajo</label>
							<select id="tipos_trabajo" name="tipos_trabajo"></select>
						</div>
						<div>
							<label>Fecha</label>
							<input  type="text" id="fecha" name="fecha" maxlength="100" placeholder="Introducir la fecha con formato dd/mm/aaaa" value="<?php echo $fecha; ?>"  />
						</div>
						<div>
							<label>Precio</label>
							<input  type="text" id="precio" name="precio" maxlength="5" placeholder="Introducir el precio del trabajo" value="<?php echo $precio; ?>" />
						</div>
						<div>
							<label>Puntuacion</label>
							<input  type="text" id="puntuacion" name="puntuacion" maxlength="5" placeholder="Introducir la puntuacion del tipo de trabajo" value="<?php echo $puntuacion; ?>" />
						</div>
						<div>
							<label>Descripcion</label>
							<textarea  name="descripcion" id="descripcion"><?php echo $descripcion; ?></textarea>
						</div>
						<input type="button" name="btnActualizar" id="btnActualizar" value="Actualizar" class="enviar" />
				</fieldset>
			</form>
		</div>
	</body>
</html>