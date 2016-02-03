<?php
	error_reporting(E_ALL);
	$nombre=trim("RAUL ");
	echo "Mi nombre es: " . $nombre . " y su longitud es: ". strlen($nombre) ."<br />";
	
	echo "<br /> <h1>Con Sentencia FOR</h1>";
	for($i=0;$i<strlen($nombre);$i++){
		if ($i<strlen($nombre)-1){
			if ($i==0)
				echo strtoupper($nombre[$i]) . "<br />";
			else
				echo strtolower($nombre[$i]) . "<br />";
		}else
			echo strtolower($nombre[$i]);
	}
	
	echo "<br /><h1> Con Sentencia WHILE </h1>";
	$i = strlen($nombre);
	while($i>0){
		$i--;
		if ($i>0){
			if($i == strlen($nombre)-1)
				echo strtoupper($nombre[$i]) . "<br />";
			else					
				echo strtolower($nombre[$i]) . "<br />";
		}else
			echo strtolower($nombre[$i]);
	}
?>