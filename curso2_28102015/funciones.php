<?php
    function parOImpar($numero){
                
        if($numero%2==0){
            return 0;
        }else{
            return 1;
        }
    }
    
    function producto($numero1, $numero2){
        return $numero1*$numero2;
    }
    
    function mostrar(){
        $numeroArgumentos = func_num_args();
        
        for($i = 0; $i < $numeroArgumentos; $i++){
            $argumento = func_get_arg($i);
            echo "El argumento numero " . $i . ": tiene el valor " . $argumento . "<br />\r\n";
        }
        //echo "<br />\r\nTenemos " . $numeroArgumentos . " argumentos<br />\r\n";
    }
    
    function sumar($numero1,$numero2){
        return $numero1 + $numero2;
    }
    
    function meses(){
        $meses=array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
        $mes ="";
        for($i=0; $i<count($meses);$i++){
            $mes .= $meses[$i]."\n" ;
        }
         return $mes;
    }
    
    function calcularIVA($cantidad, $porIva){
        if ($porIva==0){
            return "IVA EXENTO";   
        }else{
            return (($cantidad*$porIva)/100);    
        }
        
    }
    
    function sumatorio($numero){
        $calculo = 0;    
        for($i=1; $i<=$numero;$i++){
            $calculo +=$i;
        }
        return $calculo;
    }
    
    function dividir($numero1, $numero2, $mod){
        switch ($mod) {
            case true:
                return $numero1 % $numero2;
                break;
            
            case false:
                return $numero1 / $numero2;
                break;
        }
        
    }
    
    
    /*Creamos la funcion con un bucle while*/
    function binario($dividendo)
    {
        $resultadoRestos=array(); /*Creamos un array para ir almacenando los restos*/
        while ($dividendo > 0)
        {
            $resultado=$dividendo/2; /*Calculamos el resultado*/
            $resto=$dividendo%2; /*Calculamos el resto de la division*/
            $resultadoRestos[]=$resto; /*Almacenamos el resto*/
            $dividendo=intval($resultado); /*Asignamos el numero entero resultante a la  variable dividendo de nuevo*/
        }
        /*Ordenamos el array por el indice descendente y creamos un bucle foreach para mostrar el valor*/
        krsort($resultadoRestos); 
        foreach ($resultadoRestos as $clave => $valor) 
        { 
            echo $valor; /*Imprimimos el valor*/
        } 
    }
    
    function potencias($numero,$potencia){
        return pow($numero,$potencia);
    }

    function cifras($numero){
       $contador=0;
        
        for ($i=0; $i<strlen($numero);$i++){
            $contador++;
        }
        
        return $contador;
    }
 
    function obtenerMedia($numero1,$numero2){
        return ($numero1+$numero2)/2;
    }
?>