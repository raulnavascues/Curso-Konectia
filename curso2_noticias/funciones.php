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
            fwrite($file, $key.": ".$value."\n");
        }
        fclose($file);
        
    }
?>