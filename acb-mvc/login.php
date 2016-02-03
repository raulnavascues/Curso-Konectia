<?php
    require 'lib/conexionDB.php';
    
    if(isset($_POST['usuario'])){
        $usuario = $_POST['usuario'];
        $pass = $_POST['pass'];
        $query ="SELECT * FROM login where usuario='".$_POST['usuario']."' AND pass=sha1('".$_POST['pass']."')";
        conectar();
        $resultado = ejecutarConsulta($query);
        
        
        if(mysqli_num_rows($resultado)==1){//strtolower($usuario) =='admin' && strtolower($pass) == 'admin'){
            session_start();
            $_SESSION['usuario'] = $_POST['usuario'];
            header("Location:index.php");
            desconectar();
        }else{
            echo "Usuario o contrase&ntildea no valida";
            desconectar();
        }
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
                        <button type="submit" class="btn btn-black">Enviar</button>
                    </div>
                </div>
                </fieldset>
            </form>
        </div>
    </body>
</html>