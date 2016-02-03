<?php
    $fichero ='';
    if(isset($_POST['fichero'])){
        $fichero = $_POST['fichero'];
    }else{
        echo "error";
    }
    
    $permiso = substr(decoct(fileperms($fichero)),3);
    
    echo $permiso;

?>
