<?php
	include 'Conexion.php';
    include 'Consultas.php';
    
    $db = new Conexion();   
    
    if ($resultado = $db->ejecutarSelect(Consultas::$relaciones)){
        if($resultado->rowCount() > 0){
            foreach($resultado as $linea){
                $json[] = $linea; 
            }
        }else{
            $json = array();
        }
        echo json_encode($json);
    }
?>