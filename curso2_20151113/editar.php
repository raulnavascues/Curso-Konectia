<?php
    require 'lib/conexionDB.php';
    require 'lib/cargar_equipos.php';
        
    $idJugador = $_GET['id'];
    
    conectar();
    
    $result = ejecutarConsulta("SELECT * FROM jugador WHERE ID = $idJugador"); 
    
    $nombre="";
    $apellidos="";
    $altura ="";
    $peso="";
    $edad = "";
    $equipo = "";
    while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {
        $nombre = $row['nombre'];
        $apellidos = $row['apellidos'];
        $altura = $row['altura'];
        $peso = $row['peso'];
        $edad = $row['edad'];
        $equipo = $row['idequipo'];
    }
    desconectar();
?>

<!DOCTYPE html>
<html>
    <head>
        <link href="css/bootstrap.min.css" rel="stylesheet" />
        <link href="css/material.css" rel="stylesheet" />
        <script src="js/jquery-2.1.4.js"></script>
        <script src="js/material.js"></script>
        
        <script>
            $(document).ready(function(){
                $.material.init()
            });
        </script>
    </head>
    <body>
        <?php include 'lib/menu.php'?>
        <div class="well bs-component" style="width: 70%; margin: 0 auto;">
        <form class="form-horizontal" method="post" action="lib/guardarJugador.php">
            <fieldset>
                <legend>Editar un jugador</legend>
                <input type="hidden" id="idJ" name="idJ" value="<?php echo $idJugador; ?>" />
                <input type="hidden" id="tarea" name="tarea" value="editar" />
                <div class="form-group">
                    <label for="nombre" class="col-lg-2 control-label">Nombre</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" id="nombre" name="nombre" value ="<?php echo $nombre; ?>" placeholder="Nombre del jugador">
                    </div>
                </div>
                <div class="form-group">
                    <label for="apellidos" class="col-lg-2 control-label">Apellidos</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" id="apellidos" name="apellidos" value ="<?php echo $apellidos; ?>" placeholder="Apellidos del jugador">
                    </div>
                </div>
                <div class="form-group">
                    <label for="altrua" class="col-lg-2 control-label">Altura</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" id="altura" name="altura" value ="<?php echo $altura; ?>" placeholder="Altura del jugador">
                    </div>
                </div>
                <div class="form-group">
                    <label for="Peso" class="col-lg-2 control-label">Peso</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" id="peso" name="peso" value ="<?php echo $peso; ?>" placeholder="Peso del jugador">
                    </div>
                </div>
                <div class="form-group">
                    <label for="edad" class="col-lg-2 control-label">Edad</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" id="edad" name="edad" value ="<?php echo $edad; ?>" placeholder="Edad del jugador">
                    </div>
                </div>
                 <div class="form-group">
                    <label for="select" class="col-lg-2 control-label">Equipo</label>
                    <div class="col-lg-10">
                        <select class="form-control" id="equipo" name="equipo">
                            <?php
                                 $equipos = recuperarEquipos();
                                 $option = "<option value=''>Elija un equipo</option>";
                                 while ($linea = mysqli_fetch_assoc($equipos)) {
                                     $option .="<option value ='". $linea['id']."'";
                                     if ($linea['id'] == $equipo){
                                         $option .="selected='selected'";
                                     }
                                     $option .=">".$linea['nombre']."</option>";
                                 }
                                 echo $option;
                            ?>
                        </select>
                        </div>
                    </div>
                    
                <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                        <!--<button class="btn btn-default">Cancelar</button>-->
                        <button type="submit" class="btn btn-primary">Enviar</button>
                    </div>
                </div>
            </fieldset>
        </form>
        </div>
    </body>
</html>