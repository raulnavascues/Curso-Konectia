<?php
    $fichero = '';
    $permisos = 0;
    if (isset($_POST['fichero'])){
        $fichero =$_POST['fichero']; 
    }else{
        echo "Error";
    }
    
    if(isset($_POST['permisos'])){
        $permisos=$_POST['permisos'];
    }
    
    chmod($fichero, $permisos);
?>