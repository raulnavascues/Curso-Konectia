<?php
    include 'lib/Conexion.php';
    
    if(isset($_POST['id'])){
        $query = "UPDATE producto SET activo = 0 WHERE id=:id";
        $db = new Conexion();
        
        $sentencia = $db->prepare_sql($query);
        $sentencia->bindParam(':id',$_GET['id']);
        
        if ($db->ejecutarInsertUpdateDelete($sentencia)){
            echo "El articulo seleccionado se ha dado de baja correctamente";
            header('refresh: 5; url=ver_productos.php');
        }else{
            echo "Error a la hora de dar de baja el producto";
        }
    }
?>
<!DOCTYPE HTML>
<html>
    <head>
        <?php include 'lib/cabecera.php';?>
        <title>Borrado de productos</title>
    </head>
    <body>
       <div class="well bs-component" style="width: 70%; margin: 0 auto;">
           <form action="" method="post">
               <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>" />
               <span>¿Desea borrar el producto seleccionado?</span>
               <input type="submit" class="btn btn-danger" value="Borrar" />
               <a href="ver_productos.php" class="btn btn-success">Cancelar</a>
           </form>
       </div>
    </body>
</html>