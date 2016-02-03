<?php
    include 'Conexion.php';
    //conectar();
    $query = "";
    
    if ($_POST['proveedor']<>0){
        $query = "
            SELECT 
                producto.* 
            FROM 
                producto 
            inner join 
                producto_proveedor on producto_proveedor.id_producto = producto.id 
            where 
                producto_proveedor.id_proveedor = ". $_POST['proveedor'];
     }else{
        $query = "SELECT * FROM producto;";
     }
                                    
     $db = new Conexion();
     $opciones ="";
     if ($resultado = $db->ejecutarSelect($query)){
        if($resultado->rowCount()>0){
            $opciones ="<option value=''>Seleccione un articulo</option>";
            foreach ($resultado as $linea) {
                $opciones .="<option value='".$linea['id']."'>".$linea['nombre']."</option>";
            }    
            
        }else{
            
        }
     }else{
         
     } 
     echo $opciones;
?>