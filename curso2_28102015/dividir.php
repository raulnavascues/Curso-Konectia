<?php
    include('funciones.php');

    $numero1 = rand(1,200);
    $numero2 = rand(1, 200);
    
    echo "La division entre ".$numero1." y ".$numero2." es: ".dividir($numero1, $numero2, false)." y el resto es: ".dividir($numero1, $numero2, true);
    
?>