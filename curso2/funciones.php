<?php

    echo "Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto.<br />";
    echo suma(5,7)."<br />";
    echo "Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto.<br />";
    echo suma(15,20)."<br />";
    
    echo producto(5, 6)."<br />";
    
    function suma($valor1, $valor2){
        return "La suma de ". $valor1 ." y ".$valor2." es: ".($valor1 + $valor2);
    }

    function producto($valor1, $valor2){
        return "El producto de ". $valor1 ." y ". $valor2. "es: ". ($valor1 * $valor2);
    }
?>