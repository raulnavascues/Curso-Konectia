<!DOCTYPE html>
<html>
	<head>
		<title>Ejercicio con Arrays</title>
	</head>
	<body>
		<b>Con PHP Embebido en el codigo HTML</b>
		<?php
			$clientes[] = array('Raul 1','Mi direccion','Leioa','Bizkaia','1' );
			$clientes[] = array('Raul 2','Mi direccion','Leioa','Bizkaia','0' );
			$clientes[] = array('Raul 3','Mi direccion','Bilbao','Bizkaia','1' );
			$clientes[] = array('Raul 4','Mi direccion','Leioa','Bizkaia','1' );
			$clientes[] = array('Raul 5','Mi direccion','Leioa','Bizkaia','0' );
			
			$long = count($clientes);			
			$cadena ="";
			
			if($long==0){
				echo "<b>NO HAY DATOS</b>";	
			}else{
		?>
		<table>
			<thead>
				<tr>
					<th>Nombre</th>
					<th>Direccion</th>
					<th>Localidad</th>
					<th>Provincia</th>
					<th>Activo</th>
				</tr>
			</thead>
			<tbody>
				<?php
					
					
					for($i = 0; $i< $long; $i++){
						if ($clientes[$i][4] == "0"){
							$cadena .= "<tr style='background:#FE2E2E'>";
						}
						else{
							$cadena .= "<tr style='background:#9AFE2E'>";
						}
						for($j=0; $j<count($clientes[$i]);$j++){
							if($j == 4){
								$checkeado='';
								if($clientes[$i][$j] == 1) $checkeado ="checked";
								$cadena .= "<td><input type='checkbox' ". $checkeado ." disabled /></td>";
							}else{
								$cadena .= "<td>". $clientes[$i][$j]."</td>\n";
							}
						}
						$cadena .= "</tr>";
					}
					echo $cadena;
				}
				?>
			</tbody>		
		</table>	

		<?php
			$cadena = '';
			echo "<br /><br /><br /><b>Con HTML Embebido en el codigo PHP</b>"; 
			if($long==0){
				echo "<b>NO HAY DATOS</b>";	
			}else{
				$cadena .= "<table>";
				$cadena .= "	<tr>";
				$cadena .= "		<th>Nombre</th>";
				$cadena .= "		<th>Direccion</th>";
				$cadena .= "		<th>Localidad</th>";
				$cadena .= "		<th>Provincia</th>";
				$cadena .= "		<th>Activo</th>";
				$cadena .= "	</tr>";
				
				for($i = 0; $i< $long; $i++){
					if ($clientes[$i][4] == "0"){
						$cadena .= "<tr style='background:#FE2E2E'>";
					}
					else{
						$cadena .= "<tr style='background:#9AFE2E'>";
					}
						for($j=0; $j<count($clientes[$i]);$j++){
							if($j == 4){
								$checkeado='';
								if($clientes[$i][$j] == 1) $checkeado ="checked";
								$cadena .= "<td><input type='checkbox' ". $checkeado ." disabled /></td>";
							}else{
								$cadena .= "<td>". $clientes[$i][$j]."</td>";
							}
						}
						$cadena .= "</tr>";
					}							
					$cadena .= "</table>";
					
					echo $cadena;
		}
		
		?>
	</body>	
</html>