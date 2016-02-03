<?php
    include 'funciones.php';
    
    $numero1 = rand(0,20);
    $numero2 = rand(0,20);
    
    echo"El producto de los numeros ". $numero1. " y el ".$numero2." es: ".producto($numero1, $numero2);
    
    
?>