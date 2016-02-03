<?php
    include 'lib/Conexion.php';
    include 'lib/Consultas.php';
    
    $db = new Conexion();
    
    $tabla = "";
    if ($resultado = $db->ejecutarSelect(Consultas::$ver_proveedores)){
        if($resultado->rowCount() > 0){
            foreach ($resultado as $linea) {
                $tabla .="<tr>";
                $tabla .="<td>".$linea['nombre']."</td>";
                $tabla .="<td>".$linea['direccion']."</td>";
                $tabla .="<td>".$linea['email']."</td>";
                $tabla .="<td><a class='btn btn-flat btn-success btn-xs' href='editar_proveedor.php?id=".$linea['id']."'>Editar</a></td>";
                $tabla .="<td><a class='btn btn-flat btn-danger btn-xs' href='borrar_proveedor.php?id=".$linea['id']."'>Borrar</a></td>";
                $tabla .="</tr>";
            }
        }else{
            echo "No hay proveedores";
        }
    }else{
        echo "Ha habido algun error a la hora de ejecutar la consulta";
    }
    
?>
<!DOCTYPE HTML>
<html>
    <head>
        <?php include 'lib/cabecera.php'; ?>
        <title>Listado de proveedores</title>
        <script src="js/jquery.dataTables.js"></script>
        <script src="js/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function() {
                $('table').DataTable();
             } );
        </script>
    </head>
    <body>
        <?php
            include 'lib/menu.php';
        ?>
        <div class="well bs-component" style="width: 70%; margin: 0 auto;">
            <table class="table table-striped table-hover">
                <thead>
                    <th>Nombre</th>
                    <th>Direccion</th>
                    <th>Email</th>
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