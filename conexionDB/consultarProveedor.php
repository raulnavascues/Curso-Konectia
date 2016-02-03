<!DOCTYPE html>
<html>
	<head>
		<title>Formulario de alta de clientes</title>
		<link href="css/formularios.css" rel="stylesheet" />
		<link href="css/styles.css" rel="stylesheet" />
		<link href="css/botones.css" rel="stylesheet" />
		<script src="js/jquery-2.1.4.js" type="text/javascript" language="JavaScript"></script>
		<script type="text/javascript" language="JavaScript">
				$(document).ready(function(){
					$('#btnActualizar').click(function(){
						if (validarDatos()){
							$.ajax({
								url: "actualizarProveedor.php",
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
				});
			function validarDatos(){
				nombre = document.getElementById("nombre").value;
				direccion = document.getElementById("direccion").value;
				localidad = document.getElementById("localidad").value;
				activar = true;
				if (nombre!="" && direccion != "" && localidad !=""){
					activar = true;	
				}else{
					activar = false;
					alert('Alguno de los datos obligatorios (nombre, direccion o localidad) estan en blanco. No se pueden dejar estos datos en blanco');
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
		if (ejecutarQuery("
						UPDATE 
							clientes 
						SET 
							ACTIVO = 0, 
							ULT_FECHA = '". date('Y-m-d H:i:s'). "' 
						WHERE ID=". $id
			)==1){
			echo "<h1>El Cliente seleccionado se ha dado de baja</h1><br />";
			echo "<a href='index.php' class='awesome medium red'>Volver a pagina principal</a>";
		}else{
			echo "<h1>Ha habido un problema que no se ha podido darle de baja</h1><br />";
			echo "<a href='index.php' class='awesome medium red'>Volver a pagina principal</a>";
		}
	}
	
	function editar($id){
		
		conectar();
		$result = ejecutarConsulta("SELECT * FROM PROVEEDORES WHERE ID=" . $id);
		
		if (mysql_num_rows($result)>0){
		while($rowC = mysql_fetch_array($result,MYSQL_ASSOC)){
		   $rowsC[] = $rowC;
		}
?>
		<form class="contact-form" id="contacto">
			<fieldset>
					<input type="hidden" id ="id" name="id" value=<?php echo $rowsC[0]['ID']; ?> />
					<input type="hidden" id ="tabla" name="tabla" value="clientes" />
					<input type="hidden" id ="activado" name="activado" value="" />
					<div style="float: left"><label>Activo</label><input type="checkbox" id="activo" name="activo" <?php if($rowsC[0]['ACTIVO']==1){ ?> checked <?php } ?> /></div>
					<div><label>Nombre</label><input  type="text" id="nombre" name="nombre" maxlength="255" placeholder="Introducir el nombre" value="<?php echo $rowsC[0]['NOMBRE']; ?>" /></div>
					<div><label>Direccion</label><input  type="text" id="direccion" name="direccion" maxlength="100" placeholder="Introducir la direccion" value="<?php echo $rowsC[0]['DIRECCION']; ?>" /></div>
					<div><label>Localidad</label><input  type="text" id="localidad" name="localidad" maxlength="100" placeholder="Introducir la localidad" value="<?php echo $rowsC[0]['LOCALIDAD']; ?>" /></div>
					<div><label>C.P.</label><input  type="text" id="cp" name="cp" maxlength="5" placeholder="Introducir el codigo postal" value="<?php echo $rowsC[0]['CP']; ?>" /></div>
					<div><label>Telefono</label><input  type="text" id="telefono" name="telefono" maxlength="20" placeholder="Introducir el telefono" value="<?php echo $rowsC[0]['TELEFONO']; ?>" /></div>
					<div><label>Fax</label><input  type="text" id="fax" name="fax" maxlength="20" placeholder="Introducir el fax" value="<?php echo $rowsC[0]['FAX']; ?>" /></div>
					<div><label>Contacto</label><input  type="text" id="contacto" name="contacto" maxlength="100" placeholder="Introducir el contacto" value="<?php echo $rowsC[0]['CONTACTO']; ?>" /></div>
					<div><label>Email</label><input  type="text" id="email" name="email"  maxlength="20" placeholder="Introducir el email con el formato: alguien@dominio.com" value="<?php echo $rowsC[0]['EMAIL']; ?>" /></div>
					<!--<div><label>Puntuacion</label><input  type="text" id="puntuacion" name="puntuacion" readonly /></div>-->
					<div><label>Observaciones</label><textarea  name="observaciones" id="observaciones"><?php echo $rowsC[0]['OBSERVACIONES']; ?></textarea></div>
					<input type="button" name="btnActualizar" id="btnActualizar" value="Actualizar" class="enviar" />
			</fieldset>
		</form>
<?php	
	
		}else{
			echo "<h1>Cliente no encontrado</h1><br />";
			echo "<a href='verdatos.php' class='awesome medium red'>Volver</a>";
		}
		desconectar();
	}
	
		
?>


<!-- Mostramos los datos del cliente en cuestion-->
	<?php
		conectar();
		
		$GLOBALS['activo']= true;
		$consulta = "
		SELECT 
			T.ID AS Id_Trabajo, 
			T.NOMBRE AS Nombre_Trabajo, 
			DATE_FORMAT(T.FECHA, '%d/%m/%Y') AS Fecha_Trabajo, 
			T.ACTIVO as Activo_Trabajo,
			C.NOMBRE AS Cliente_Trabajo,
			TT.NOMBRE AS Tipo_Trabajo,
			T.PRECIO AS Precio_Trabajo
		FROM TRABAJOS T 
			LEFT JOIN CLIENTES C ON (T.ID_CLIENTE = C.ID)
			LEFT JOIN PROVEEDORES P ON (T.ID_PROVEEDOR = P.ID)
			LEFT JOIN TIPO_TRABAJO TT ON (T.ID_TIPO_TRABAJO = TT.ID)
		WHERE
			P.ID = ". $_GET['id'] ." AND
			T.ACTIVO = 1 
		ORDER BY
			T.ID ASC, T.FECHA ASC";
		
		
		//echo $consulta."<br />";
		
		$result = ejecutarConsulta($consulta);
		
		$tabla="";
			
		if(mysql_num_rows($result) > 0){
			$tabla = "<span class='titulo_tabla_clientes'>Tabla de trabajos de un proveedor</span>";
			$tabla .= "<table style='width: 100%' id='tClientes' name='tClientes'>";
			$tabla .= "<thead>";
			$tabla .= "<th style='text-align:left; display:none;'>ID</th>";
			$tabla .= "<th style='text-align:left'>Nombre Trabajo</th>";
			$tabla .= "<th style='text-align:left'>Cliente</th>";
			$tabla .= "<th style='text-align:left'>Fecha</th>";
			$tabla .= "<th style='text-align:left'>Tipo</th>";
			$tabla .= "<th style='text-align:right'>Precio</th>";
			$tabla .= "<th style='text-align:right'>Activo</th>";
			$tabla .= "<th style='text-align:right'>Editar</th>";
			$tabla .= "<th style='text-align:right'>Borrar</th>";
			$tabla .="</thead>";
			$tabla .= "<tbody>";
			$tabla .= "</tbody>";
			while($rowC = mysql_fetch_array($result,MYSQL_ASSOC)){
		   		$rowsC[] = $rowC;
			}
			foreach ($rowsC as $row) {		
				$tabla .= "<tr>";
				$tabla .= "<td style='text-align:left' class='nombre'>".$row["Nombre_Trabajo"]."</td>";
				$tabla .= "<td style='text-align:left' class='nombre'>".$row["Cliente_Trabajo"]."</td>";
				$tabla .= "<td style='text-align:left'>".$row["Fecha_Trabajo"]."</td>";
				$tabla .= "<td style='text-align:left'>".$row["Tipo_Trabajo"]."</td>";
				$tabla .= "<td style='text-align:right'>". number_format($row["Precio_Trabajo"], 2,",",".")."&#8364"."</td>";
				$tabla .= "<td style='text-align:right'>".activo($row["Activo_Trabajo"])."</td>";
				$tabla .= "<td style='text-align:right'><a class'editar' href='editar_trabajo.php?id=".$row["Id_Trabajo"]."&opciones=editar'><img src='images/doc.png' alt='Editar el contacto'  style='width:32px;height:32px;' /></a></td>";
				$tabla .= "<td style='text-align:right'>";
				if ($GLOBALS['activo']==true) {
					$tabla .= "<a class='borrar'><img class='borrar' src='images/delete.png' alt='Borrar el contacto'  style='width:32px;height:32px;' /></a>";
				}
				$tabla .= "</td>";
				$tabla .= "</tr>";
			}
			$tabla .= "</table>";
		}else{
			$tabla ="<span style='color: red; font-weight: bold;'>El cliente actual no tiene trabajos activos</span>";
		}
		
		echo $tabla;
		desconectar();
		
		
		function activo($activo){
			if($activo== 1){
				$GLOBALS['activo']=true;
				$palAct ="<img src='images/activo.png' alt='Estado activo del cliente'  style='width:32px;height:32px;' />";
			}elseif($activo==0){
				$GLOBALS['activo']=false;
				$palAct ="<img src='images/no_activo.png' alt='Estado inactivo del cliente'  style='width:32px;height:32px;' />";
		}
		
		return $palAct;
	}
	?>
	
</div>
</body>
</html>