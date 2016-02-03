<?php
    include 'lib/Conexion.php';
    include 'lib/Consultas.php';
    
    
    $db = new Conexion();
    
    $tabla = "";
    if ($resultado = $db->ejecutarSelect(Consultas::$verpedidos)){
        if($resultado->rowCount() > 0){
            foreach ($resultado as $linea) {
                $tabla .="<tr>";
                $tabla .="<td>".$linea['referencia']."</td>";
                $tabla .="<td>".$linea['nombre']."</td>";
                $tabla .="<td>".$linea['fecha']."</td>";
                $tabla .="<td>".$linea['fecha_recepcion']."</td>";
                $tabla .="<td>".$linea['totalpedido']."</td>";
                $tabla .="<td><a class='btn btn-flat btn-info btn-xs'>Enviar</a></td>";
                $tabla .="<td><a class='btn btn-flat btn-success btn-xs'>Editar</a></td>";
                $tabla .="<td><a class='btn btn-flat btn-danger btn-xs' href='borrar.php'>Borrar</a></td>";
                $tabla .="</tr>";
            }    
        }else{
            echo "No hay pedidos";
        }
    }else{
        echo "Ha habido algun error a la hora de ejecutar la consulta";
    }
    $db->desconectar();    
?>
<!DOCTYPE HTML>
<html>
    <head>
        <?php
            include 'lib/cabecera.php';
        ?>
        <title>Listado de proveedores</title>
        <script src="js/jquery.dataTables.js"></script>
        <script src="js/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function() {
                $('table').DataTable({
                    "language": {
                        "lengthMenu": "Mostrar _MENU_ registros por pagina",
                        "zeroRecords": "Lo siento - Registros no encontrados",
                        "info": "Mostrando pagina _PAGE_ de _PAGES_",
                        "infoEmpty": "No hay resultados disponibles",
                        "infoFiltered": "(filtered from _MAX_ total records)",
                        "search":"Buscador: "
                    }
                });
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
                    <th>Proveedor</th>
                    <th>Fecha Emision</th>
                    <th>Fecha Recepcion</th>
                    <th>Total</th>
                    <th>Enviar</th>
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