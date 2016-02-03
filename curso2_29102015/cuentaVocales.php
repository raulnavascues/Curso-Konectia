<?php
    $cadena ="Es un hecho estaBlecido hace demasiado tiempo que un lector se distraera con el contenido del texto de un sitio mientras que mira su diseno";
    $vocales = 0;
    $vocalesMayusculas = 0;
    $consonantes = 0;
    $consonantesMayusculas = 0;
    foreach (count_chars($cadena, 1) as $i => $val){
        if (preg_match('/[aeiouáéíóúü]/i',chr($i))){
            if (strtoupper(chr($i))==chr($i)){
                $vocalesMayusculas+=$val;
            }else{
                $vocales+=$val;
            }
        }else if (preg_match('/[a-z]/i',chr($i))){
            if (strtoupper(chr($i))==chr($i)){
                $consonantesMayusculas+=$val;
            }else{
                $consonantes+=$val;
            }
        }
    }
    echo "<br> Vocales: <b>".$vocales ."</b><br />Vocales mayusculas: <b>".$vocalesMayusculas."</b><br />Consonantes:<b>".$consonantes."</b><br />Consonantes Mayusculas: <b>".$consonantesMayusculas."</b><br />";
    
    
    
    //Sustituye vocal
    echo "Cadena antes de cambiar las 'a': '".$cadena."'";
    $cadenaCambiada = str_replace("a", "@", $cadena);
    echo "Cadena despues de cambiar las 'a': '".$cadenaCambiada."'";
    
    
    
?>