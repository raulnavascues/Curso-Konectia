<?php
    echo "El total es: ". media(1,3,1,3,1,3);
    
    function media(){
        $numeroArgumentos = func_num_args();
        $contadorNumeros=0;
        $total =0;
        
        for($i = 0; $i < $numeroArgumentos; $i++){
            $argumento = func_get_arg($i);
            if (is_numeric($argumento)){
                $total += $argumento;
                $contadorNumeros++;
             }
         }
        return $total;
    }

?>