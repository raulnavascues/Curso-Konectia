<?php
     include 'funciones.php';


    $numeroComprobar = rand(0, 500);
    if (parOImpar($numeroComprobar)==0){
       echo "El numero a comprobar '".$numeroComprobar."' es par"; 
    }else{
       echo "El numero a comprobar '".$numeroComprobar."' es impar";
    }
    
    
    
?>