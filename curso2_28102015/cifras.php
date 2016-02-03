<?php
    include ('funciones.php');

    $numero = rand(0, 5000);
    
    echo "El numero ".$numero ." tiene ".cifras($numero)." cifras";
?>