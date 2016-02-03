<?php
    include 'Conexion.php';
    //.escapar_caracteres($_POST['proveedor']).'".date("Y-m-d")."',". $_POST['total']."".$_POST['pedido'];
    $db = new Conexion();
    $query = "
                UPDATE 
                    pedido
                SET
                    proveedor=:proveedor,
                    fecha =:fecha,
                    totalpedido = :total
               WHERE
                    id = :id";
    
    $sentencia = $db->prepare_sql($query);
    $sentencia ->bindParam(":proveedor", $_POST['proveedor']);
    $sentencia ->bindParam(":fecha", date("Y-m-d"));
    $sentencia ->bindParam(":total", $_POST['total']);
    $sentencia ->bindParam(":id", $_POST['pedido']);
    
    if($db->ejecutarInsertUpdateDelete($sentencia)){
        echo "Pedido cerrado correctamente";
    }else{
        echo "Error a la hora de crear el pedido";
    }

?>