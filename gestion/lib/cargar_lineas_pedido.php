<?php
    include 'conexionDB.php';
    //$proveedor;
    $query = "
                SELECT 
                    producto.nombre as producto, 
                    pedido_linea.cantidad as cantidad,
                    producto_proveedor.precio as precioU,
                    pedido_linea.precio as precio
                FROM 
                    pedido_linea 
                INNER JOIN 
                    producto ON producto.id = pedido_linea.idproducto 
                INNER JOIN
                    producto_proveedor ON(producto_proveedor.id_producto = pedido_linea.idproducto AND producto_proveedor.id_proveedor = ". $_POST['proveedor'].")
                WHERE 
                    idpedido = ". $_POST['pedido'];
        echo $query;
        
        conectar();
        $resultado = ejecutarConsulta($query);
        $tabla ="";
        while ($linea = arrayAsociativo($resultado)){
            $tabla .="<tr>";
            $tabla .="<td>".$linea['producto']."</td>";
            $tabla .="<td>".$linea['cantidad']."</td>";
            $tabla .="<td>".$linea['precioU']."</td>";
            $tabla .="<td>".$linea['precio']."</td>";
            $tabla .= "<td><a>Borrar</a></td>";
            $tabla .="</tr>";
        }
    
    desconectar();
    
    echo $tabla;
?>