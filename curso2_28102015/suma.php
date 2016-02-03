<?php
    include 'funciones.php';
    
    $numero1 = rand(0,500);
    $numero2 = rand(0,500);
    
    echo "La suma de '".$numero1."' y de '".$numero2."' es: ". sumar($numero1,$numero2);
    
?>
