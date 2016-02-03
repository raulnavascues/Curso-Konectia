<?php
    $cadena = "Ejemplo para contar vocales y consonantes en PHP";
    $cadenaAComparar = "En un lugar de la mancha que hace contar vocales y consonantes en PHP";
    
    $arrayCadenaOrigen = str_word_count($cadena ,1);
    $numeroPalabrasOrigen = str_word_count($cadena ,0);
    
    $arrayCadenaDestino = str_word_count($cadenaAComparar ,1);
    $numeroPalabrasDestino = str_word_count($cadenaAComparar ,0);
    
    $palabrasEncontradas = "";
    
    for ($i = 0; $i < $numeroPalabrasOrigen; $i ++){
        for ($j = 0; $j < $numeroPalabrasDestino; $j ++){
            if (strnatcasecmp ($arrayCadenaOrigen[$i], $arrayCadenaDestino[$j]) == 0){
                $palabrasEncontradas .= $arrayCadenaOrigen[$i] . " ";
            }
        }
    }
    
    echo "Las palabras iguales encontradas en las frases. <br>";
    echo "Frase 1: " . $cadena . "<br>";
    echo "Frase 2: " . $cadenaAComparar . "<br>";
    echo "<b>".$palabrasEncontradas."</b>";
    echo "<hr>";
    
    
    
    
?>