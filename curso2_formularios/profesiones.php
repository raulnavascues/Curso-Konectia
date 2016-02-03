<?php
    $value = $_POST['profesiones'];
    $profesiones  = array('Electricistas','Transportistas','Fontaneros','Aseguradores');
    echo "La opcion elegida es: <b>".$value."</b><br />";
    echo "Corresponde a la profesion: <b>". $profesiones[$value]."</b>";
?>