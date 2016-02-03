<?php
    include ("funciones.php");
    
    $numero1 =rand(0, 500); 
    $numero2 =rand(0, 500);
    
    echo "La media entre ".$numero1." y el ".$numero2." es: ".obtenerMedia($numero1, $numero2);
?>