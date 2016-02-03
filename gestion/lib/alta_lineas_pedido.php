<?php
    include 'conexionDB.php';
        
    if(isset($_POST['cantidad'])){
            $pedido = $_POST['pedido'];
            $cantidad = $_POST['cantidad'];
            $producto = $_POST['producto'];
            $proveedor = "";
            if($_POST['proveedor']==0){
                $proveedor = seleccionarProveedor($producto);
            }else{
                $proveedor = $_POST['proveedor']; 
            }
            
            $precio = seleccionarPrecio($producto, $proveedor);
            //echo $proveedor;
            
            $precioTotalProducto = $precio * $cantidad;
            
            conectar();
            $query = "INSERT INTO
                             pedido_linea
                       (
                            idpedido, 
                            idproducto, 
                            cantidad,
                            precio,
                            fecha
                            
                       )VALUES(
                            ".escapar_caracteres($pedido).",
                            ".escapar_caracteres($producto).",
                            ".escapar_caracteres($cantidad).",
                            ".escapar_caracteres($precioTotalProducto).",
                            '".date("Y-m-d")."'
                       )";
            ejecutarQueryInsert($query);
            desconectar();
            
            echo $proveedor;
    }
    
    function seleccionarPrecio($producto,$proveedor){
        conectar();
        $resultado = ejecutarConsulta("
                                        SELECT 
                                            precio as precio
                                        FROM 
                                            producto_proveedor 
                                        WHERE 
                                            id_producto = $producto
                                        AND
                                            id_proveedor = $proveedor
                                        ORDER BY 
                                            precio
                                        LIMIT 
                                            1;");
        
        
        $linea = arrayAsociativo($resultado);
        desconectar();
        
        return $linea['precio'];
    }
    
    function seleccionarProveedor($producto){
        conectar();
        $resultado = ejecutarConsulta("
                                        SELECT 
                                            id_proveedor as proveedor
                                        FROM 
                                            producto_proveedor
                                        INNER JOIN
                                            proveedor ON proveedor.id = producto_proveedor.id_proveedor  
                                        WHERE 
                                            id_producto = $producto
                                        AND
                                            proveedor.activo = 1
                                        ORDER BY 
                                            precio,id_proveedor
                                        LIMIT 
                                            1;");
        
        
        $linea = arrayAsociativo($resultado);
        desconectar();
        
        return $linea['proveedor'];
    }
?>