<?php
    $nombre = "";
    if (isset($_POST['nombre'])){
        $nombre= $_POST['nombre'];
    }
    
    $soltero = 0;
    if (isset($_POST['soltero'])){
        $soltero= 1;
    }
    
    $edad="";
    if (isset($_POST['radioedad'])){
        $edad= $_POST['radioedad'];
    }
    
    $mensaje = "Te llamas <b>".$nombre."</b>";
    if ($soltero){
        $mensaje .= " eres <b>soltero</b>";
    }
    $mensaje .= " y tu edad esta comprendida entre <b>".$edad."</b>";
    
    echo $mensaje;
?>