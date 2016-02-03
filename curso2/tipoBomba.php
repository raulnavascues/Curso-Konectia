<?php

    $tipoBomba = rand(0, 4);
    $tipo ="";
    switch ($tipoBomba) {
        case 0:
            $tipo = "No hay bomba";
            break;
        case 1:
            $tipo = "Bomba de agua";
            break;
         case 2:
            $tipo = "Bomba de gasolina";
            break;
         case 3:
            $tipo = "Bomba de gasoil";
            break;
         case 4:
            $tipo = "Bomba de aceite";
            break;
        default:
            break;
    }    
    echo $tipo;
?>