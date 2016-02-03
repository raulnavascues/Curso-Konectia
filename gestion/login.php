<?php
    include 'lib/Conexion.php';
    
    if(isset($_POST['usuario'])){
        $usuario = $_POST['usuario'];
        $pass = $_POST['pass'];
                
        $db = new Conexion();
        
        if ($resultado = $db->ejecutarSelect("SELECT * FROM login where usuario='". $usuario."' AND pass=sha1('".$pass."')")){
            if($resultado->rowCount() > 0){ 
                session_start();
                foreach ($resultado as $linea) {
                    $_SESSION['usuario'] = $usuario;
                    $_SESSION['nombre_usuario'] = recuperar_nombre_usuario($linea['id'],$db); 
                } 
                header("Location:index.php");
            }else{
                echo "Usuario o contrase&ntildea no valida";
            }
        } 
    }
    
    
    function recuperar_nombre_usuario($user_id,$db){
             $query ="SELECT concat(nombre, ' ', apellidos)as nombre FROM usuario where id=". $user_id;
             $resultado = $db->ejecutarSelect($nombre_usuario);
             if ($resultado = $db->ejecutarSelect($query)){
                if($resultado->rowCount() > 0){
                    foreach ($resultado as $linea) {
                        $nombre_usuario = $linea['nombre'];
                    }
                }
             }
             return $nombre_usuario;
        }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Inicio de sesi&oacute;n</title>
        <link href="css/bootstrap.min.css" rel="stylesheet" />
        <link href="css/material.css" rel="stylesheet" />
        <script src="js/jquery-2.1.4.js"></script>
        <script src="js/material.js"></script>
    </head>
    <body>
        <div class="well bs-component" style="width: 70%; margin: 0 auto;">
            <form class="form-horizontal" method="post" action="">
                <fieldset>
                    <legend>Iniciar Sesi&oacute;n</legend>
                    <div class="form-group">
                    <label for="usuario" class="col-lg-2 control-label">Usuario</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="usuario" name="usuario" value ="" placeholder="Nombre del usuario">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="pass" class="col-lg-2 control-label">Password</label>
                        <div class="col-lg-10">
                            <input type="password" class="form-control" id="pass" name="pass" value ="" placeholder="Pass del usuario">
                        </div>
                    </div>
                    <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                        <button type="submit" class="btn btn-material-grey">Enviar</button>
                    </div>
                </div>
                </fieldset>
            </form>
        </div>
    </body>
</html>