<?php
    include 'Conexion.php';

   $query = "SELECT * FROM proveedor WHERE id = ".$_POST['proveedor']." AND activo = 1";
   
   $db = new Conexion();
   $nombre = "";
   if ($resultado = $db->ejecutarSelect($query)){
       if ($resultado->rowCount()){
           foreach ($resultado as $linea){
                $nombre = $linea['nombre']; 
           }
       }
   } 
   
   echo $nombre;
?>
