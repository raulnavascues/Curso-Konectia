<?php
    include 'Conexion.php';
    
    $query = "SELECT SUM(precio) as precio from pedido_linea where idpedido = ". $_POST['pedido'];
    $precio = 0;
    $db = new Conexion();
    
    if($resultado = $db->ejecutarSelect($query)){
        if ($resultado->rowCount()==1){
            foreach($resultado as $linea){
                $precio = $linea['precio'];
            }
        }
    }
    echo $precio;
?>