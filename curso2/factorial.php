<?php

    factorial(0);
    
    function factorial($n){
        $x = 1;
        for($i=1; $i<=$n;$i++){
            $x*=$i;
            /*echo "$i";
            echo ($i==1)? "=":"x";*/
        }
        echo "<b>El factorial de $n es: $x</b>";
    }
?>