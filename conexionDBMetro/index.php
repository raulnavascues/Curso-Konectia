<?php //include 'lib/gestionDB.php'; ?>

<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Pagina principal</title>
		
		<link href="css/styles.css" rel="stylesheet" />
		<!--<link href="css/menu.css" rel="stylesheet" />
		<link href="css/layout.css" rel="stylesheet" />-->
		<link href="css/reset.css" rel="stylesheet" />
		<link href="css_metro/metro.css" rel="stylesheet" />
		<link href="css/botones.css" rel="stylesheet" />
		<script src="js-Mio/jquery-1.11.3.js" type="text/javascript" language="JavaScript"></script>
		<!--<script src="js-Mio/scriptMenu.js" type="text/javascript" language="JavaScript"></script>-->
		<script src="js/metro.js" type="text/javascript" language="JavaScript"></script>
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
		<?php
			include 'include/menu.php';
		?>
		<div id="tablaC">
			<span class='titulo_tabla_clientes'>Tabla Clientes</span>
			<table style='width: 100%' id='tClientes' name='tClientes' class='table striped hovered border bordered'>	
				<thead>
					<tr>
						<th style='text-align:left; display:none;'>ID</th>
						<th class='nombre sortable-column'>Nombre</th>
						<th class = 'direccion sortable-column'>Direccion</th>
						<th class = 'localidad sortable-column'>Localidad</th>
						<th class= 'ctrabajos sortable-column'>Trabajos</th>
						<th class= 'cactivo sortable-column'>Activo</th>
						<th class= 'ceditar sortable-column'>Editar</th>
						<th class= 'cborrar sortable-column'>Borrar</th>
					</tr>
				</thead>
				<tbody id='tbodyClientes'>
				</tbody>
			</table>
		</div>
		
		<div id="tablaP">
			<span class='titulo_tabla_clientes'>Tabla Proveedores</span>
			<table style='width: 100%' id='tProveedores' name='tProveedores' class='table striped hovered border bordered'>	
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
				<tbody id='tbodyProveedores'></tbody>
			</table>
		</div>
	</body>	
</html>
	
	

