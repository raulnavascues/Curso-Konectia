<?php
    include 'lib/Consultas.php';
    include 'lib/Conexion.php';
    
    $db = new Conexion();
    
    $tabla = "";
    if ($resultado = $db->ejecutarSelect(Consultas::$ver_productos)){
        if($resultado->rowCount() > 0){
            foreach ($resultado as $linea) {
                $tabla .="<tr>";
                $tabla .="<td>".$linea['nombre']."</td>";
                $tabla .="<td>".$linea['precio']."</td>";
                $tabla .="<td>".$linea['stock']."</td>";
                $tabla .="<td><a class='btn btn-flat btn-success btn-xs' href='editar_articulo.php?id=".$linea['id']."'>Editar</a></td>";
                $tabla .="<td><a class='btn btn-flat btn-danger btn-xs' href='borrar_producto.php?id=".$linea['id']."'>Borrar</a></td>";
                $tabla .="</tr>";
            }
        }else{
            echo "No hay productos";
        }
    }else{
        echo "Ha habido algun error a la hora de ejecutar la consulta";
    }
    
?>
<!DOCTYPE HTML>
<html>
    <head>
        <?php
            include 'lib/cabecera.php';
        ?>
        <title>Listado de proveedores</title>
        <script>
            $(document).ready(function() {
                $('#tabla_productos').DataTable();
             } );
        </script>
    </head>
    <body>
        <?php include 'lib/menu.php'; ?>
        <div class="well bs-component" style="width: 70%; margin: 0 auto;">
            <table id="tabla_productos" class="table table-striped table-hover">
                <thead>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Stock</th>
                    <th>Editar</th>
                    <th>Borrar</th>
                </thead>
                <tbody>
                    <?php echo $tabla; ?>
                </tbody>
            </table>
            <?php include 'lib/pie.php'; ?>
        </div>
    </body>
</html>