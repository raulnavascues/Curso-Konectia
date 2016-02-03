<?php
    if(strlen($_FILES['fichero']['name'])){
        $nombreArchivo = $_FILES['fichero']['name'];
        if ($_FILES["fichero"]["error"]!=4 && 
            $_FILES["fichero"]["type"]=="image/jpeg" || 
            $_FILES["fichero"]["type"]=="image/gif"){
            echo "El formato no es correcto";
            echo "<a href='imagenes.html'>Volver</a>";
        }else{
            header('Location: imagenes.html');
        }
    }
?>