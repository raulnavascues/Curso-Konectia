<?php
    $cadena ="Es un hecho estaBlecido hace demasiado tiempo que un lector se distraera con el contenido del texto de un sitio mientras que mira su diseno";
    echo "Cadena antes de quitarle 3 palabras: <b>". $cadena."</b><br />";
    $cadenaWrap = str_word_count($cadena, 1);
    $cadenaDestino= "";
    for($i=2;$i<count($cadenaWrap)-2;$i++){
        $cadenaDestino .= $cadenaWrap[$i]." "; 
    }
    
    
    echo "Cadena despues de quitarle 3 palabras: <b>". $cadenaDestino."</b>";

?>