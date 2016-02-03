<?php
    include("funciones.php");
    
    $numeroAElevar = rand(0, 50);
    
    echo "El resultado de elevar el numero '". $numeroAElevar."' al cuadrado es: " . potencias($numeroAElevar,2);
?>