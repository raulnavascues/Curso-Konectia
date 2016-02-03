<?php
    /*echo "<pre>";
    print_r($_POST);
    echo "</pre>";*/
    
    if(isset($_POST['usuario']) && isset($_POST['color'])){
        $nombre = $_POST['usuario'];
        $color = $_POST['color'];
        
        echo $nombre;
        echo $color;
        
        session_start();
        
        $_SESSION['usuario'] = $nombre;
        $_SESSION['color'] = $color;
        
        //session_register($nombre,$color);
        
        header("Location:uno.php");
    }
?>