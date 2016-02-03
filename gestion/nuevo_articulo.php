<?php
    include 'lib/conexionDB.php';
    if (isset($_POST['nombre'])){
        $insert = "INSERT INTO 
                            producto(
                                nombre,
                                precio,
                                stock
                            )VALUES(
                                '".mysql_real_escape_string($_POST['nombre'])."',
                                ".mysql_real_escape_string($_POST['precio']).",
                                ".mysql_real_escape_string($_POST['stock'])."
                            )";
        conectar();
        $producto_nuevo = ejecutarQueryInsert($insert);
        //echo $producto_nuevo;
        desconectar();
        
    }
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>Dar de alta un articulo</title>
        <?php
            include 'lib/cabecera.php';
        ?>
    </head>
    <body>
        <?php include 'lib/menu.php';?>
        
        <div class="well bs-component" style="width: 70%; margin: 0 auto;">
            <form class="form-horizontal" method="post" action="">
                <fieldset>
                    <legend>Dar de alta un articulo</legend>
                     <div class="form-group">
                        <label class="col-lg-2 control-label">Nombre: </label>
                        <div class="col-lg-10">
                            <input type="text" name="nombre" id="nombre" class="form-control" />
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-lg-2 control-label">Precio venta: </label>
                        <div class="col-lg-10">
                            <input type="text" name="precio" id="precio" class="form-control" />
                        </div>
                     </div>
                     <div class="form-group">
                         <label class="col-lg-2 control-label">Stock: </label>
                        <div class="col-lg-10">
                            <input type="text" name="stock" id="stock" class="form-control" />
                        </div>
                     </div>
                     <!--<div class="form-group">
                         <label class="col-lg-2 control-label">Proveedores: </label>
                         <div  id="proveedores" name="proveedores" style='width:80%;float:left;'>
                             
                         </div>
                     </div>-->
                     <div class="form-group">
                         <input type="submit" value="Guardar" class="btn btn-material-grey" />
                     </div>
                </fieldset>
            </form>
            <?php include 'lib/pie.php'; ?>
        </div>
    </body>
</html>