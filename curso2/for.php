<?php
    echo "Del 0 al 100<br />";
    for ($i=0;$i<=100;$i++){
        echo $i." ";
    }
    
    echo "<br /><br />";
    for($i=0;$i<250;$i++){
        echo "-";
    }
    echo "<br /><br />";
    
    echo "Del 100 al 0<br />";
    for ($j=100;$j>=0;$j--){
        echo $j." ";
    }
    echo "<br /><br />";
    for($i=0;$i<250;$i++){
        echo "-";
    }
    echo "<br /><br />";
    echo "Del 1 al 100 de 2 en 2<br />";
    for($k=1; $k<=100; $k+=2){
        echo $k." ";
    }
    echo "<br /><br />";
    for($i=0;$i<250;$i++){
        echo "-";
    }
    echo "<br /><br />";    
    echo "<br />Tabla anidada<br />";
    for($i=1;$i<=5;$i++){
        for($j=1;$j<=5;$j++){
            echo $j." ";
        }
        echo "<br />";
    }
    
?>