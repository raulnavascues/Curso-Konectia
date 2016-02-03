<?php
	include 'gestionDB.php';
	include 'funciones_comunes.php';
	
	$GLOBALS['activo']=true;
	
	$query ="
		SELECT 
			ID, 
			NOMBRE, 
			ACTIVO
		FROM
			TIPO_TRABAJO		
	";
	
	conectar();
	
	$resultado = ejecutarConsulta($query);
	$tabla = "";
	
	while ($linea = mysql_fetch_array($resultado, MYSQL_ASSOC)) {
		$tabla .= "<tr>";
		$tabla .="<td>".$linea["NOMBRE"]."</td>";
		$tabla .= "<td class='activo'>".activo($linea["ACTIVO"])."</td>";
		$tabla .= "<td class='editar'><a class'editar' href='ficha_nueva_clientes.php?nif=".$linea["ID"]."&opciones=editar'><img src='/conexionDB/images/doc.png' alt='Editar el contacto'  style='width:32px;height:32px;' /></a></td>";
		$tabla .= "<td class ='borrar'>";
		if ($GLOBALS['activo']==true) {
			$tabla .= "<a class='borrar'><img class='borrar' src='/conexionDB/images/delete.png' alt='Borrar el contacto'  style='width:32px;height:32px;' /></a>";
		}
		$tabla .= "</td>";
		$tabla .= "</tr>";
	}
	
	echo $tabla;
?>