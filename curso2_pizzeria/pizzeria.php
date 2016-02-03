<?php
    include 'funciones.php';
        
    $nombre = $_POST['nombre'];
    $direccion = $_POST['direccion'];
    
    $jq = array('jamon_queso'=> 0);
    if(isset($_POST['jamon_queso'])){
        $jq = array('jamon_queso' =>$_POST['c_jamon_queso']);
    }
    
    $nap = array('napolitana'=> 0);
    if(isset($_POST['napolitana'])){
        $nap = array('napolitana' => $_POST['c_napolitana']);
    }
   
    $mozz = array('Mozzarella' =>0);
    if(isset($_POST['mozzarella'])){
        $mozz = array('mozzarella'=>$_POST['c_mozzarella']);
    }
    
    $pedido_pizzas = array('nombre'=>$nombre,'direccion'=>$direccion, $jq, $nap, $mozz);
    
    guardar_contenido("pedido_pizzas.dat", $pedido_pizzas);
    
?>