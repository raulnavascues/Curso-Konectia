<?php
	include 'gestionDB.php';


	conectar();
		
	$GLOBALS['activo']= true;
	$consulta = "
	SELECT 
		T.ID AS Id_Trabajo, 
		T.NOMBRE AS Nombre_Trabajo, 
		DATE_FORMAT(T.FECHA, '%d/%m/%Y') AS Fecha_Trabajo, 
		T.ACTIVO as Activo_Trabajo,
		P.NOMBRE AS Proveedor_Trabajo,
		TT.NOMBRE AS Tipo_Trabajo,
		T.PRECIO AS Precio_Trabajo
	FROM TRABAJOS T 
		LEFT JOIN CLIENTES C ON (T.ID_CLIENTE = C.ID)
		LEFT JOIN PROVEEDORES P ON (T.ID_PROVEEDOR = P.ID)
		LEFT JOIN TIPO_TRABAJO TT ON (T.ID_TIPO_TRABAJO = TT.ID)
	WHERE
		C.ID = ". $_GET['id'] ." AND
		T.ACTIVO = 1 
	ORDER BY
		T.ID ASC, T.FECHA ASC";
		
		
	//echo $consulta;
	
		$result = ejecutarConsulta($consulta);
		$tabla="";
		
		if(mysql_num_rows($result) > 0){
			while($rowC = mysql_fetch_array($result,MYSQL_ASSOC)){
		   		$rowsC[] = $rowC;
			}
			foreach ($rowsC as $row) {		
				$tabla .= "<tr>";
				$tabla .= "<td style='text-align:left' class='nombre'>".$row["Nombre_Trabajo"]."</td>";
				$tabla .= "<td style='text-align:left' class='nombre'>".$row["Proveedor_Trabajo"]."</td>";
				$tabla .= "<td style='text-align:left'>".$row["Fecha_Trabajo"]."</td>";
				$tabla .= "<td style='text-align:left'>".$row["Tipo_Trabajo"]."</td>";
				$tabla .= "<td style='text-align:right'>". number_format($row["Precio_Trabajo"], 2,",",".")."&#8364"."</td>";
				$tabla .= "<td style='text-align:right'>".activo($row["Activo_Trabajo"])."</td>";
				$tabla .= "<td style='text-align:right'><a class'editar' href='editar_trabajo.php?id=".$row["Id_Trabajo"]."&opciones=editar'><img src='images/doc.png' alt='Editar el contacto'  style='width:32px;height:32px;' /></a></td>";
				$tabla .= "<td style='text-align:right'>";
				if ($GLOBALS['activo']==true) {
					$tabla .= "<a><img class='borrar' src='images/delete.png' alt='Borrar el trabajo'  style='width:32px;height:32px;' /></a>";
				}
				$tabla .= "</td>";
				$tabla .= "</tr>";
			}
			echo $tabla;
		}else{
				echo "<span style='color: red; font-weight: bold;'>El cliente actual no tiene trabajos activos</span>";
			}
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