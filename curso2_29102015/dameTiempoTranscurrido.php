<?php

    $fechaActual = date('Y/m/d H:i:s');
    $fechaComparar = new DateTime("2015/10/01 00:00:00");
    
    $diff=date_diff($fechaComparar, new DateTime($fechaActual));
    
    echo "Tiempo transcurrido entre 2015/10/01 00:00:00 a la fecha actual: <b>".$diff->format("%R%a dias")."</b>";    

?>