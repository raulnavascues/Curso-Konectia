<?php

    include('funciones.php');
    /* Creamos la variable dividendo y la mostramos por pantalla */
    $dividendo=rand(0,256);
    echo 'El numero en decimal es: '.$dividendo;
     
    echo ' y en binario es: ';
    $binarios=binario($dividendo);
?>