<?php
    include 'lib/Conexion.php';
    $db = new Conexion();
    
    if (isset($_POST['nombre'])){
        
        $insert = "INSERT INTO 
                            proveedor(
                                nombre,
                                direccion,
                                email,
                                telefono,
                                provincia
                            )VALUES(
                                :nombre,
                                :direccion,
                                :email,
                                :telefono,
                                :provincia
                            )";
                            
        $sentencia = $db->prepare_sql($insert);
        $sentencia ->bindParam(":nombre", $_POST['nombre']);
        $sentencia ->bindParam(":direccion", $_POST['direccion']);
        $sentencia ->bindParam(":email", $_POST['email']);
        $sentencia ->bindParam(":telefono", $_POST['telefono']);
        $sentencia ->bindParam(":provincia", $_POST['provincia']);
        
        if($db->ejecutarInsertUpdateDelete($sentencia)){
            echo "Proveedor dado de alta correctamente";
        }else{
            echo "Error a la hora de crear el proveedor";
        }
        
    }
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>Dar de alta un articulo</title>
        <?php
            include 'lib/cabecera.php';
        ?>
        <script>
            $(document).ready(function(){
               /*$.ajax({
                    url: "lib/cargar_articulos.php",
                    type: "post",
                    dataType: 'json',
                    async: true,
                    success : function(respuesta) {
                        var opciones="";
                        var elemento;
                        console.log(respuesta);
                        for(i = 0; i< respuesta.length;i++){
                            elemento = respuesta[i];
                            opciones +="<div><input type='checkbox' value='"+elemento.id+"'/><label>"+elemento.nombre+"</label><input class='form-control' type='text' name='cantidad"+elemento.id+"' /></div>";   
                            //opciones +="<option value='"+ elemento.id + "'>"+ elemento.nombre+"</option>";
                        }
                        $('#articulos').html(opciones);
                     }
                });*/ 
            });
        </script>
    </head>
    <body>
        <?php include 'lib/menu.php';?>
        
        <div class="well bs-component" style="width: 70%; margin: 0 auto;">
            <form class="form-horizontal" method="post" action="">
                <fieldset>
                    <legend>Dar de alta un proveedor</legend>
                     <div class="form-group">
                        <label class="col-lg-2 control-label">Nombre: </label>
                        <div class="col-lg-10">
                            <input type="text" name="nombre" id="nombre" class="form-control" />
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-lg-2 control-label">Direcci&oacute;n: </label>
                        <div class="col-lg-10">
                            <input type="text" name="direccion" id="direccion" class="form-control" />
                        </div>
                     </div>
                     <div class="form-group">
                         <label class="col-lg-2 control-label">E-mail: </label>
                        <div class="col-lg-10">
                            <input type="text" name="email" id="email" class="form-control" />
                        </div>
                     </div>
                     <div class="form-group">
                         <label class="col-lg-2 control-label">Tel&eacute;fono: </label>
                        <div class="col-lg-10">
                            <input type="text" name="telefono" id="telefono" class="form-control" />
                        </div>
                     </div>
                     <div class="form-group">
                         <label class="col-lg-2 control-label">Provincia: </label>
                        <div class="col-lg-10">
                            <input type="text" name="provincia" id="provincia" class="form-control" />
                        </div>
                     </div>
                     <!--<div class="form-group">
                         <label class="col-lg-2 control-label">Proveedores: </label>
                         <div  id="articulos" name="articulos" style='width:80%;float:left;'>
                             
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