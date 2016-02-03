<?php

    require 'conexionDB.php';
    $id = $_GET["id"];
    $query = "DELETE FROM jugador where id = $id";
    echo $query;
    conectar();
    ejecutarQuery($query);
    echo "<a href='../index.php'>Volver a la pagina principal</a>";
    desconectar();
?>