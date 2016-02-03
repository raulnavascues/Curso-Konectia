<?php
    include ('funciones.php');
    
    $cantidad = rand(15, 1000);
    $porIva = rand(0, 21);

    echo "El IVA (".$porIva."%) para el producto con precio ".$cantidad." es: ".calcularIVA($cantidad, $porIva);    
?>