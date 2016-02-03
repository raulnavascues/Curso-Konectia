<?php
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
    
    function guardar_contenido($fichero, $guardar){
        
        $file = fopen($fichero, "a");
        foreach ($guardar as $key => $value) {
            if(is_array($value)){
                foreach ($value as $key1 => $value1) {
                    fwrite($file, $key1.":".$value1."\n");
                }
            }else{
                fwrite($file, $key.":".$value."\n");    
            }  
            
        }
        fwrite($file, "-FIN PEDIDO-\n");
        fclose($file);
        
    }
    
?>