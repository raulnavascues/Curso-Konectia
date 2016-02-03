<?php
    include("funciones.php");
    
    $numeroAElevar = rand(0, 50);
    $potencia = rand(0, 9);
    echo "El resultado de elevar el numero '". $numeroAElevar."' al la potencia ".$potencia ." es: " . potencias($numeroAElevar,$potencia);
    
    
?>