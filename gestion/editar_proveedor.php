<?php
    include 'lib/Conexion.php';
        $db = new Conexion();
        
        $nombre = "";
        $direccion = "";
        $email = "";
        $telefono = "";
        $provincia = "";
        $activo=0;
        cargar_proveedor($nombre,$direccion,$email,$telefono,$provincia,$activo,$db);
        
        if (isset($_POST['nombre'])){
            $activo = 0;
            if(isset($_POST['activo'])) $activo = 1;
            
            $query = "
                        UPDATE 
                            proveedor
                        SET
                            nombre = :nombre,
                            direccion = :direccion,
                            email = :email,
                            telefono = :telefono,
                            provincia = :provincia,
                            activo = :activo
                        WHERE 
                            id = :id";
                            
            $sentencia = $db->prepare_sql($query);
                        
            $sentencia ->bindParam(":nombre", $_POST['nombre']);
            $sentencia ->bindParam(":direccion", $_POST['direccion']);
            $sentencia ->bindParam(":email", $_POST['email']);
            $sentencia ->bindParam(":telefono", $_POST['telefono']);
            $sentencia ->bindParam(":provincia", $_POST['provincia']);
            $sentencia ->bindParam(":activo", $activo);
            $sentencia ->bindParam(":id", $_POST['id']);
            
            /*
            echo "<pre>";
            print_r($sentencia);
            echo "</pre>";
            */
            if ($db->ejecutarInsertUpdateDelete($sentencia)){
                echo "Registro actualizado correctamente";
                cargar_proveedor($nombre,$direccion,$email,$telefono,$provincia,$activo,$db);
            }else{
                echo "Error a la hora de actualizar el registro seleccionado. Por favor revise los datos y vuelvalo a intentar mas tarde";
            }
    }
    
    function cargar_proveedor(&$nombre,&$direccion,&$email,&$telefono,&$provincia,&$activo,$db){ 
        $query = "SELECT * FROM proveedor WHERE id = ".$_GET['id']." AND activo = 1";
        //echo $query;
        
        
        if ($resultado = $db->ejecutarSelect($query)){
            if($resultado->rowCount()==1){
                foreach ($resultado as $linea){
                    $nombre = $linea['nombre'];
                    $direccion= $linea['direccion'];
                    $email= $linea['email'];
                    $telefono= $linea['telefono'];
                    $provincia= $linea['provincia'];
                    $activo = $linea['activo'];
                }
            }else{
                echo "El registro solicitado no se encuentra disponible";
            }
        }else{
            echo "Error a la hora de ejecutar la query";
        }
    }
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>Modificar un proveedor</title>
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
                        Modificar un proveedor
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
                        <label class="col-lg-2 control-label">Direcci&oacute;n: </label>
                        <div class="col-lg-10">
                            <input type="text" name="direccion" id="direccion" class="form-control" value="<?php echo $direccion;?>" />
                        </div>
                     </div>
                     <div class="form-group">
                         <label class="col-lg-2 control-label">E-mail: </label>
                        <div class="col-lg-10"> 
                            <input type="text" name="email" id="email" class="form-control" value="<?php echo $email;?>" />
                        </div>
                     </div>
                     <div class="form-group">
                         <label class="col-lg-2 control-label">Telefono: </label>
                        <div class="col-lg-10"> 
                            <input type="text" name="telefono" id="telefono" class="form-control" value="<?php echo $telefono;?>" />
                        </div>
                     </div>
                     <div class="form-group">
                         <label class="col-lg-2 control-label">Provincia: </label>
                        <div class="col-lg-10"> 
                            <input type="text" name="provincia" id="provincia" class="form-control" value="<?php echo $provincia;?>" />
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