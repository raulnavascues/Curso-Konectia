<?php
    include 'conexionDB.php';
    
    conectar();
    //Comprobar si la relacion entre el proveedor y el producto    
    $idRelacion = comprobar_relacion($_POST['productos'],$_POST['proveedores']);
    
    if ($idRelacion<>0){
        $query = "
                    UPDATE
                        producto_proveedor
                    SET
                        precio = ".$_POST['precio']."
                    WHERE
                        id = ". $idRelacion;
                        
       $resultado = ejecutarQueryUpdateDelete($query);
    }else{
        $query = "
                    INSERT INTO
                        producto_proveedor(
                            id_producto, 
                            id_proveedor, 
                            precio
                        )VALUES(
                        ".$_POST['productos'].", 
                        ".$_POST['proveedores'].",
                        ".$_POST['precio']."
                        )";
                        
        $resultado = ejecutarQueryInsert($query);
    }
    if ($resultado >0){
        echo 'OK';
    }else{
        echo 'Error';
    }
    
    desconectar();
    
    function comprobar_relacion($idprod, $idprove){
        $query = "SELECT * FROM producto_proveedor WHERE id_producto=".$idprod. " AND id_proveedor=".$idprove;
        
        $resultado = ejecutarConsulta($query);
        
        if (contar_registros($resultado)==1){
            return arrayAsociativo($resultado)['id'];
        }else{
            return 0;
        }
    
    }
    
?>