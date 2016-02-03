<?php
    $amigos = array(
                        array("nombre"=>"Raul", "direccion"=>"Gran Via 2","telefono"=>111111111),
                        array("nombre"=>"Aitor", "direccion"=>"Calle Mayor 2","telefono"=>222222222),
                        array("nombre"=>"Juan", "direccion"=>"La Avanzada 2","telefono"=>333333333)
                    );
                    
     $tabla = "<table border=1>";
     $tabla .= "<tr><th>Nombre</th><th>Direccion</th><th>Telefono</th></tr>";
      foreach ($amigos as $valor) {
          $tabla .="<tr>";
          foreach ($valor as $value) {
              $tabla .="<td>". $value."</td>";    
          }          
          $tabla .="</tr>";
      }
     $tabla .= "</table>";
     
     echo $tabla;
?>