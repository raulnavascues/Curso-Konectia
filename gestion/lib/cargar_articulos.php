<?php
    include 'Conexion.php';
    include 'Consultas.php';
    
    $db = new Conexion();   
    
    if ($resultado = $db->ejecutarSelect(Consultas::$ver_productos)){
        if($resultado->rowCount() > 0){
            foreach($resultado as $linea){
                $json[] = $linea; 
            }
        }
        echo json_encode($json);
    }
    
?>