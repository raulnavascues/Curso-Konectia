<html>
<head>
<title>Ejercicio Array</title>
</head>
<body>
	<?php
	$array = array();
	$array[] = array("Cliente 1", "Direccion 1", "Bilbao", "Bizkaia", 1);
	$array[] = array("Cliente 2", "Direccion 2", "Leioa", "Bizkaia", 1);
	$array[] = array("Cliente 3", "Direccion 3", "Donosti", "Gipuzkoa", 0);
	$array[] = array("Cliente 4", "Direccion 4", "Gasteiz", "Araba", 0);
	$array[] = array("Cliente 5", "Direccion 5", "Lesaka", "Nafarroa", 1);
	
	?>
	
	<table>
		<tr>
			<th>Cliente</th>
			<th>Direccion</th>
			<th>Localidad</th>
			<th>Provincia</th>
			<th>Activo</th>
		</tr>
		<?php
			$cant = count($array);
			if ($cant == 0)
			{
		?>
			<tr><td colspan="5">No hay datos</td></tr>
		<?php
			}
			else
			{
				for($i=0; $i<$cant; $i++)
				{
		?>
			<tr>
				<td><?php echo $array[$i][0];?></td>
				<td><?php echo $array[$i][1];?></td>
				<td><?php echo $array[$i][2];?></td>
				<td><?php echo $array[$i][3];?></td>
				<td><?php echo $array[$i][4];?></td>
			</tr>
		<?php
				}			
			}
		?>
		
	</table>
	
	
	

</body>
</html>