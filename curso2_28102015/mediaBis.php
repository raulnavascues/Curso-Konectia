<?php
    echo "La media es: ". media(1,3,array(1,3,"Hola",1),3,1,3);
    
    function media(){
        $numeroArgumentos = func_num_args();
        $contadorNumeros=0;
        $total =0;
        
        for($i = 0; $i < $numeroArgumentos; $i++){
            $argumento = func_get_arg($i);
            if (is_array($argumento)){
                for($j = 0; $j < count($argumento); $j++){
                    if (is_numeric($argumento[$j])){
                        $total += $argumento[$j];
                        $contadorNumeros++;
                    }
                }
            }else{
                if (is_numeric($argumento)){
                    $total += $argumento;
                    $contadorNumeros++;
                }
            }
        }
        
        return $total/$contadorNumeros;
    }
?>