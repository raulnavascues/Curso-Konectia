<?php
    $cadena = "Bilbao";
    
    echo "Cadena antes de rellenarla con asteriscos: ".$cadena."<br />";
    echo "Cadena despues de rellenarla con asteriscos: ".str_pad($cadena,strlen($cadena)+10,"*",STR_PAD_BOTH);
?>
