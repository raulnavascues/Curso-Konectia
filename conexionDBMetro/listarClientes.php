<?php
	include 'lib/gestionDB.php';
	
	conectar();
	
	$GLOBALS['activo']= true;
	$registros = -1;
	
	$result = ejecutarConsulta("select count(1) as contador from clientes");
	
	while($rowC = mysql_fetch_array($result,MYSQL_ASSOC)){
		   $rowsC[] = $rowC;
	}
	
	foreach ($rowsC as $rowS) {
		$registros = $rowS['contador'];
	}
	
	$query = "
		SELECT 
			C.ID AS ID, 
			C.NOMBRE AS NOMBRE, 
			C.DIRECCION AS DIRECCION, 
			C.LOCALIDAD AS LOCALIDAD, 
			COUNT(T.ID) AS NUM_TRABAJO, 
			C.ACTIVO AS ACTIVO
		FROM
			CLIENTES C
		LEFT JOIN 
			TRABAJOS T ON(C.ID = T.ID_CLIENTE AND T.ACTIVO = 1)
		GROUP BY
			C.ID
		ORDER BY
			NOMBRE ASC
	";
	
	
	$resultado = mysql_query($query);
	$tabla = "";
	/*$tabla = "<span class='titulo_tabla_clientes'>Tabla Clientes</span>";
	$tabla .= "<table style='width: 100%' id='tClientes' name='tClientes'>";
	$tabla .= "<thead>";
	$tabla .= "<th style='text-align:left; display:none;'>ID</th>";
	$tabla .= "<th class='nombre'>Nombre</th>";
	$tabla .= "<th class = 'direccion'>Direccion</th>";
	$tabla .= "<th class = 'localidad'>Localidad</th>";
	$tabla .= "<th class= 'ctrabajos'>Trabajos</th>";
	$tabla .= "<th class= 'cactivo'>Activo</th>";
	$tabla .= "<th class= 'ceditar'>Editar</th>";
	$tabla .= "<th class= 'cborrar'>Borrar</th>";
	$tabla .="</thead>";
	$tabla .= "<tbody>";*/
	
	while($row = mysql_fetch_array($resultado,MYSQL_ASSOC)){
		   $rows[] = $row;
	}
	
	$colorLinea="";
	foreach ($rows as $rowF) {
		if($rowF['NUM_TRABAJO']==0){
			$colorLinea = "class='rojo'";
		}elseif($rowF["NUM_TRABAJO"]>1){
			$colorLinea = "class='verde'";
		}else{
			$colorLinea = "class='blanco'";
		}
		$tabla .= "<tr " .$colorLinea.">";
		$tabla .= "<td class='id'>".$rowF["ID"]."</td>";
		$tabla .= "<td class='nombre'>".$rowF["NOMBRE"]."</td>";
		$tabla .= "<td class = 'direccion'>".$rowF["DIRECCION"]."</td>";
		$tabla .= "<td class = 'localidad'>".$rowF["LOCALIDAD"]."</td>";
		$tabla .= "<td class='trabajo'>".$rowF["NUM_TRABAJO"]."</td>";
		$tabla .= "<td class='activo'>".activo($rowF["ACTIVO"])."</td>";
		$tabla .= "<td class='editar'><a class'editar' href='consultar.php?id=".$rowF["ID"]."&opciones=editar'><img src='images/doc.png' alt='Editar el contacto'  style='width:32px;height:32px;' /></a></td>";
		$tabla .= "<td class ='borrar'>";
		if ($GLOBALS['activo']==true) {
			$tabla .= "<a class='borrar'><img class='borrar' src='images/delete.png' alt='Borrar el contacto'  style='width:32px;height:32px;' /></a>";
		}
		$tabla .= "</td>";
		$tabla .= "</tr>";
	}
	/*$tabla .= "</tbody>";
	$tabla .= "<tfoot>";
	$tabla .= "<th style='text-align:left; display:none;'>ID</th>";
	$tabla .= "<th class='nombre'>Nombre</th>";
	$tabla .= "<th class = 'direccion'>Direccion</th>";
	$tabla .= "<th class = 'localidad'>Localidad</th>";
	$tabla .= "<th class= 'ctrabajos'>Trabajos</th>";
	$tabla .= "<th class= 'cactivo'>Activo</th>";
	$tabla .= "<th class= 'ceditar'>Editar</th>";
	$tabla .= "<th class= 'cborrar'>Borrar</th>";
	$tabla .="</thead>";
	$tabla .= "</table>";*/
	
	desconectar();
	//href='consultar.php?id=".$rowF["ID"]."&opciones=eliminar'
	
	echo $tabla;
	
	//echo "La tabla clientes tiene: " . $registros. "<br />";
	
	
	
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
</html>