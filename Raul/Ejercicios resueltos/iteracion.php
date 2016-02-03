<?php

$nombre = "iurgi";
$nombreParseado = trim($nombre);
$longitud = strlen($nombreParseado);
echo "Inicio FOR <br>";
for($i=0; $i<$longitud; $i++)
{
	if ($i == 0)
		echo strtoupper($nombreParseado[$i]); 
	else 
		echo strtolower($nombreParseado[$i]);
	
	if ($i < $longitud -1)
		echo "<br>";
	

}
echo "<br>Fin FOR <hr>";

echo "Inicio FOR Al reves <br>";
for($i=$longitud-1; $i>=0; $i--)
{
	if ($i == $longitud-1)
		echo strtoupper($nombreParseado[$i]); 
	else 
		echo strtolower($nombreParseado[$i]);
	
	if ($i > 0)
		echo "<br>";
	

}
echo "<br>Fin FOR Al reves <hr>";



echo "Inicio WHILE <br>";
$j = 0;
while($j<$longitud)
{
	echo $nombreParseado[$j]."<br>";
	$j++;
}
	
echo "Fin WHILE";

?>