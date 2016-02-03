<?php
    function comprobar_sesion(){
        session_start();
        if(!isset($_SESSION['usuario'])){
            session_destroy();
            header('Location: login.php');
        }    
    }
    
?>