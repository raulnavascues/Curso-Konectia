<?php
    $seconds = rand(0,100000);

    $hours = floor($seconds / 3600);
    $mins = floor(($seconds - ($hours*3600)) / 60);
    $secs = floor($seconds % 60);
    
    
    echo "'". $seconds ."' segundos son: ". $hours."horas, ".$mins." minutos, ".$secs. " segundos";
?>