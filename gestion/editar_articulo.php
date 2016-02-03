<?php
    include 'lib/Conexion.php';
    
    $query = "SELECT * FROM producto WHERE id = ".$_GET['id']." AND activo = 1";
    //echo $query;
    $db = new Conexion();
    $nombre = "";
    $precio =0;
    $stock = 0;
    $activo = 0;
    if ($resultado = $db->ejecutarSelect($query)){
        if($resultado->rowCount()==1){
            foreach ($resultado as $linea){
                $nombre = $linea['nombre'];
                $precio = $linea['precio'];
                $stock= $linea['stock'];
                $activo = $linea['activo'];
            }
        }else{
            echo "El registro solicitado no se encuentra disponible";
        }
    }else{
        echo "Error a la hora de ejecutar la query";
    }
        
    if (isset($_POST['nombre'])){
        $activo = 0;
        if(isset($_POST['activo'])) $activo = 1;
        
        $query = "
                    UPDATE 
                        producto
                    SET
                        nombre = :nombre,
                        precio = :precio,
                        stock = :stock,
                        activo = :activo
                    WHERE 
                        id = :id";
                        
        $sentencia = $db->prepare_sql($query);
        $sentencia ->bindParam(":nombre", $_POST['nombre']);
        $sentencia ->bindParam(":precio", $_POST['precio']);
        $sentencia ->bindParam(":stock", $_POST['stock']);
        $sentencia ->bindParam(":activo", $activo);
        $sentencia ->bindParam(":id", $_POST['id']);
        
        if ($db->ejecutarInsertUpdateDelete($sentencia)){
            echo "Registro actualizado correctamente";
        }else{
            echo "Error a la hora de actualizar el registro seleccionado. Por favor revise los datos y vuelvalo a intentar mas tarde";
        }
    }
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>Modificar un articulo</title>
        <?php
            include 'lib/cabecera.php';
        ?>
    </head>
    <body>
        <?php include 'lib/menu.php';?>
        
        <div class="well bs-component" style="width: 70%; margin: 0 auto;">
            <form class="form-horizontal" method="post" action="">
                <fieldset>
                    <legend class="checkbox">
                        Modificar un articulo
                            <label>
                                <input type="checkbox" name="activo" class="" id="activo" <?php if ($activo){?>checked <?php }?> />
                            </label>
                    </legend>
                    
                    <input type="hidden" name ="id" value="<?php echo $linea['id']; ?>" />
                     <div class="form-group">
                        <label class="col-lg-2 control-label">Nombre: </label>
                        <div class="col-lg-10">
                            <input type="text" name="nombre" id="nombre" class="form-control" value ="<?php echo $nombre; ?>" />
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-lg-2 control-label">Precio venta: </label>
                        <div class="col-lg-10">
                            <input type="text" name="precio" id="precio" class="form-control" value="<?php echo $precio;?>" />
                        </div>
                     </div>
                     <div class="form-group">
                         <label class="col-lg-2 control-label">Stock: </label>
                        <div class="col-lg-10"> 
                            <input type="text" name="stock" id="stock" class="form-control" value="<?php echo $stock;?>" />
                        </div>
                     </div>
                     
                     <div class="form-group">
                         <input type="submit" value="Guardar" class="btn btn-material-grey" />
                     </div>
                </fieldset>
            </form>
        </div>
    </body>
</html>