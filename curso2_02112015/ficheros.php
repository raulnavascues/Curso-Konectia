<?php
    include 'arrays.php';
    
    function insertarDato($dato, $fichero){
        if (!file_exists($fichero)){
            $file = fopen($fichero, "w");
            fclose($file);
        }            
       if(file_put_contents($fichero,$dato." ",FILE_APPEND)){
            echo "Archivo actualizado correctamente";   
       }else{
           echo "Error a la hora de actualizar el formulario";
       }
        
    }
    
    function borrarFichero($fichero){
        if (file_exists($fichero)){
            if (unlink($fichero)){
                echo "Archivo borrado correctamente";
            }else{
                echo "Error a la hora de borrar el archivo";
            }
        }else{
            echo "No existe el fichero";
        }
    }
    
    function mostrarContenido($fichero){
        if (!file_exists($fichero)){
            $file = fopen($fichero, "w");
            fclose($file);
        }       
       if (filesize($fichero)>0){
           $file = fopen($fichero, "r");
           $contenido = fread($file, filesize($fichero));
           fclose($file);
           
           return $contenido;
       }else{
           echo "No se puede leer ya que el fichero tiene longitud 0";
       }
    }
    
    
    function calcularSumatorio($fichero){
        $contenido = mostrarContenido($fichero);
        
        $arrayContenido = split(" ", $contenido);
        
        $suma = 0;
        
        for($i = 0; $i<count($arrayContenido);$i++){
            $suma += $arrayContenido[$i];
        }        
        
        return $suma;   
    }
    
    function ordenarFicheroASC($fichero){
        $contenido = mostrarContenido($fichero);
        
        echo "<p>El contenido antes de la ordenacion es: ". $contenido."</p>";
        
        $arrayContenido = split(" ", $contenido);
        
        ordenarArrayASC($arrayContenido);
        
        $contenido = "";
        for($i=0;$i<count($arrayContenido);$i++){
            $contenido .= $arrayContenido[$i]." "; 
        }
        return $contenido;
        
    }
    
    function mostrar_divisores($fichero){
         $contenido = mostrarContenido($fichero);
        
        $arrayContenido = split(" ", $contenido);
        
        for($j=0; $j<count($arrayContenido);$j++){
            $n = $arrayContenido[$j];
            
            for($i =1;$i <= $n;$i++){
                if($n % $i == 0){
                    echo "<p>".$i." es divisor de ".$n."</p>";
                }
            }
        }
    }
    
    function buscar_numero($fichero, $numero){
        $contenido = mostrarContenido($fichero);
        
        $arrayContenido = split(" ", $contenido);
        
        return buscar_en_array($arrayContenido, $numero);
    }
    
    
    function eliminar_ficheros($fichero){
        $contenido = mostrarContenido($fichero);
        
        $arrayContenido = split(" ", $contenido);
        
        return array_unique($arrayContenido);
    }
?>