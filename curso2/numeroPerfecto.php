<?php

    for ($i=0;$i<=100;$i++){
        numeroPerfecto($i);
    }
    
    
    function numeroPerfecto($numero){
        $sum = 0;
        for($i=1;$i<$numero;$i++){
            $residuo=$numero%$i;
            if($residuo==0){
                $sum=$i+$sum;
            }
        }
        
        if($sum==$numero){
            echo("<span style='border: 1px solid #000000; background:#00ff00;'>El numero ". $numero ." es perfecto</span> <br />");
            return 1;
        }/*else{
            echo("<span style='border: 1px solid #000000;background:#ff0000;'>El numero ". $numero ." no es perfecto</span> <br />");
            return 0;
         }*/
    }
?>