<?php
    function ordenarArrayASC(&$array){
        echo "<pre>";
        print_r($array);
        echo "</pre>";
       
        /*for($i=0;$i<count($array);$i++){
            if(trim($array[$i]) == " "){
                $array1[$i] =array(parseInt($array[$i]));    
            }                
        }
      
        echo "<pre>";
        print_r(asort($array, SORT_NUMERIC));
        echo "</pre>";*/
        
      $array = asort($array, SORT_NUMERIC);
    
    }
    
    function sumarArray($array){
        return array_sum($array);
    }
    
    
    function buscar_en_array($arrayContenido, $numero){
        return array_search($numero, $arrayContenido); 
    }

?>
