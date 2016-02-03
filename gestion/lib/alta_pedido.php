<?php
    include 'conexionDB.php';

    if(isset($_POST['referencia'])){
        $query = "INSERT INTO pedido (referencia, fecha) VALUES ('".$_POST['referencia']."','".date("Y-m-d")."' )";
        
        //echo $query;
        
        conectar();
        $pedido = ejecutarQueryInsert($query);
         
        echo $pedido;
        desconectar();
        
    }
    
?>