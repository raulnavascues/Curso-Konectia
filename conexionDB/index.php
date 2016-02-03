<?php //include 'lib/gestionDB.php'; ?>

<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Pagina principal</title>
		<script src="js/jquery-1.11.3.js" type="text/javascript" language="JavaScript"></script>
		
		<link href="css/menu.css" rel="stylesheet" />
		<link href="css/layout.css" rel="stylesheet" />
		<!--<script src="js/jquery.dataTables.js" type="text/javascript" language="JavaScript"></script>
		<script src="js/dataTables.jqueryui.js" type="text/javascript" language="JavaScript"></script>
		<script src="js/dataTables.foundation.js" type="text/javascript" language="JavaScript"></script>
		
		<link href="css/dataTables.jqueryui.css" rel="stylesheet" />-->
		<link href="css/botones.css" rel="stylesheet" />
		<link href="css/styles.css" rel="stylesheet" />
		<script src="js/scriptMenu.js" type="text/javascript" language="JavaScript"></script>
		<script>
			$(document).ready(function(){
				listarClientes();
				listarProveedor();
				$(document).on('click','.borrar', function(){
					console.log($(this).find("#tClientes .nombre").html());
					//verificar($(this).find(".nombre").html(),$(this).find("id").html());
				});
			});
			
			function listarClientes(){
				$.ajax({
					url: "listarClientes.php",
					type: "post",
					dataType: 'html',
					async: false,
					success : function(respuesta) {
						$('#tbodyClientes').html(respuesta);
					 }
				});
				
				//$('#tClientes').DataTable();
			}
			function listarProveedor(){
				$.ajax({
					url: "listarProveedores.php",
					type: "post",
					dataType: 'json',
					success : function(respuesta) {
						tabla ='';
						colorLinea='';
						activado = true;
						
						for(i=0; i<respuesta.length;i++){
							if(respuesta[i]['NUM_TRABAJO']==0){
								colorLinea = "class='rojo'";
							}else if(respuesta[i]["NUM_TRABAJO"]>1){
									colorLinea = "class='verde'";
							}else{
									colorLinea = "class='blanco'";
							}
							tabla += "<tr " + colorLinea +">";
							tabla += "<td style='display:none;' class='id'>"+ respuesta[i]["ID"] + "</td>";
							tabla += "<td class='nombre'>"+ respuesta[i]["NOMBRE"] + "</td>";
							tabla += "<td class = 'direccion'>" + respuesta[i]["DIRECCION"] + "</td>";
							tabla += "<td class = 'localidad'>" + respuesta[i]["LOCALIDAD"] + "</td>";
							tabla += "<td class='trabajo'>" + respuesta[i]["NUM_TRABAJO"] + "</td>";
							tabla += "<td class='activo'>" + activo(respuesta[i]["ACTIVO"]) + "</td>";
							tabla += "<td class='editar'><a class'editar' href='consultarProveedor.php?id=" + respuesta[i]["ID"] + "&opciones=editar'><img src='images/doc.png' alt='Editar el contacto'  style='width:32px;height:32px;' /></a></td>";
							tabla += "<td class ='borrar'>";
							if (activado) {
								tabla += "<a class='borrar'><img class='borrar' src='images/delete.png' alt='Borrar el contacto'  style='width:32px;height:32px;' /></a>";
							}
							tabla += "</td>";
							tabla += "</tr>";
						}
						$('#tbodyProveedores').html(tabla);
					 }
				});
				
				//$('#tProveedores').DataTable();
			}
			
			
			function activo(activo){
				palAct = '';
				if(activo== 1){
					activado = true;
					palAct ="<img src='images/activo.png' alt='Estado activo del cliente'  style='width:32px;height:32px;' />";
				}else if(activo==0){
					activado = false;
					palAct ="<img src='images/no_activo.png' alt='Estado inactivo del cliente'  style='width:32px;height:32px;' />";
				}
				return palAct;
			}
			
			function verificar(nombre,id){
				if(confirm("¿Desea borrar el cliente '" + nombre + "' seleccionado?")){
					$(document).ready(function(){
						$.ajax({
						url: "consultar.php",
						type: "get",
						data: {
							"id": id,
							"opciones":"eliminar"
						},
						dataType: 'html',
						success : function(respuesta) {
							$("#tablaC").html('');
							listarClientes();
						 }
					});
					//$('#tClientes').DataTable();
				});
					//window.location="consultar.php?";
				}else{
					return 0;
				}
			}
	</script>
	</head>
	<body>
	<div id="centrar">
		<?php include 'include/menu.php'; ?>
		<div id="tablaC">
			<span class='titulo_tabla_clientes'>Tabla Clientes</span>
			<table style='width: 100%' id='tClientes' name='tClientes' class='display'>	
				<thead>
					<tr>
						<th style='text-align:left; display:none;'>ID</th>
						<th class='nombre'>Nombre</th>
						<th class = 'direccion'>Direccion</th>
						<th class = 'localidad'>Localidad</th>
						<th class= 'ctrabajos'>Trabajos</th>
						<th class= 'ctrabajo'>P</th>
						<th class= 'cactivo'>Activo</th>
						<th class= 'ceditar'>Editar</th>
						<th class= 'cborrar'>Borrar</th>
					</tr>
				</thead>
				<tbody id='tbodyClientes'>
				</tbody>
				<tfoot>
					<th style='text-align:left; display:none;'>ID</th>
					<th class='nombre'>Nombre</th>
					<th class = 'direccion'>Direccion</th>
					<th class = 'localidad'>Localidad</th>
					<th class= 'ctrabajos'>Trabajos</th>
					<th class= 'ctrabajo'>P</th>
					<th class= 'cactivo'>Activo</th>
					<th class= 'ceditar'>Editar</th>
					<th class= 'cborrar'>Borrar</th>
				</tfoot>
			</table>
		</div>
		
		<div id="tablaP">
			<span class='titulo_tabla_clientes'>Tabla Proveedores</span>
			<table style='width: 100%' id='tProveedores' name='tProveedores' class='display'>	
				<thead>
					<th style='text-align:left; display:none;'>ID</th>
					<th class='nombre'>Nombre</th>
					<th class = 'direccion'>Direccion</th>
					<th class = 'localidad'>Localidad</th>
					<th class= 'ctrabajos'>Trabajos</th>
					<th class= 'cactivo'>Activo</th>
					<th class= 'ceditar'>Editar</th>
					<th class= 'cborrar'>Borrar</th>
				</thead>
				<tbody id='tbodyProveedores'>
				</tbody>
				<tfoot>
					<tr>
						<th style='text-align:left; display:none;'>ID</th>
						<th class='nombre'>Nombre</th>
						<th class = 'direccion'>Direccion</th>
						<th class = 'localidad'>Localidad</th>
						<th class= 'ctrabajos'>Trabajos</th>
						<th class= 'cactivo'>Activo</th>
						<th class= 'ceditar'>Editar</th>
						<th class= 'cborrar'>Borrar</th>
					</tr>
				</tfoot>
			</table>
		</div>
	</div>		
	</body>	
</html>
	
	

