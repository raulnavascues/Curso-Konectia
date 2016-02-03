<?php
    //include 'conexionDB.php';
    include 'Conexion.php';
    include 'Consultas.php';
    
    $db = new Conexion();
    
    if ($resultado = $db->ejecutarSelect(Consultas::$ver_proveedores)){
        if($resultado->rowCount() > 0){
            foreach($resultado as $linea){
                $json[] = $linea;
            }
           /* echo "<pre>";
            print_r($json);
            echo "</pre>"; */
        }else{
            $json = array();
        }
        //echo $json;
        echo json_encode($json); 
    }
    
?>