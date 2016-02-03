<a href="pizzeria.html">Nuevo pedido</a>
<?php
    include 'funciones.php';
    
    $contenido = mostrarContenido("pedido_pizzas.dat");
    
    $pedidos = split("-FIN PEDIDO-", $contenido);
            
    $tabla ="<table border=1>";
    $tabla .="<tr>";
    $tabla .="  <th>Nombre</th>";
    $tabla .="  <th>Direccion</th>";
    $tabla .="  <th>Jamon y Queso</th>";
    $tabla .="  <th>Napolitana</th>";
    $tabla .="  <th>Mozzarella</th>";
    $tabla .="</tr>";
    foreach ($pedidos as $key => $value) {
        $tabla .="<tr>";
        if ($value!=""){
            $pedido = split("\n", $value);
            if (is_array($pedido)){
                foreach($pedido as $value1){
                    if ($value!=""){
                        $tabla .="<td>".split(":", $value1)[1]."</td>";
                    }
                }
            }
        }
        $tabla .="</tr>";
    }
    $tabla .="</table>";
    
    echo $tabla;
?>