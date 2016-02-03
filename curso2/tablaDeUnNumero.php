<?php
    $operacion ="";
    $resultado ="";
    
    for ($j = 0; $j<=10;$j++){
        echo "Tabla del ". $j ."<br />";
        echo "------------------------<br />";
        for($i=0;$i<=10;$i++){
            $operacion = "".$j."x".$i."";
            $resultado = $j*$i;
            
            echo $operacion . "=".$resultado."<br />";
        }
    }
?>