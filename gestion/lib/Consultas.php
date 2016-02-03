<?php
    class Consultas{
        public static $verpedidos = "SELECT * FROM pedido left join proveedor on proveedor.id = pedido.proveedor";
        public static $ver_productos = "SELECT * FROM producto WHERE activo = 1";
        public static $ver_proveedores = "SELECT * FROM proveedor WHERE activo = 1";
        public static $relaciones = "SELECT pdpv.id AS id_relacion, pd.nombre AS producto, pv.nombre AS proveedor, pdpv.precio FROM producto_proveedor pdpv INNER JOIN producto pd ON pd.id = pdpv.id_producto INNER JOIN proveedor pv ON pv.id = pdpv.id_proveedor";
       
    }
?>