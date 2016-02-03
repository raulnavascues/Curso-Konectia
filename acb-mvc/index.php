<?php
    //require 'lib/conexionDB.php';

?>
<!DOCTYPE html>
<html>
    <head>
        <link href="css/bootstrap.min.css" rel="stylesheet" />
        <link href="css/material.css" rel="stylesheet" />
        <script src="js/jquery-2.1.4.js"></script>
        <script src="js/material.js"></script>
        <script src="js/ripples.js"></script>
        <script src="js/materialPreloader.js"></script>
        <title>Pagina principal</title>
        <script>
            $(document).ready(function(){
                $.material.init()
            });
        </script>
    </head>
    <body>
        <?php include 'lib/menu.php'?>
       <div class="well bs-component" style="width: 70%; margin: 0 auto;">
           <center><img src="images/Liga_ACB_logo.svg.png" style="width:250px;height: 400px; " /></center>
<!--<?php
    conectar();
    
    $result = ejecutarConsulta("
                        SELECT DISTINCT
                            jugador.id AS JugadorID,
                            CONCAT(jugador.nombre, ' ', jugador.apellidos) AS Nombre,
                            jugador.altura AS Altura,
                            jugador.peso AS Peso,
                            jugador.edad AS edad,
                            equipo.id AS idEquipo,
                            equipo.nombre AS Equipo,
                            (SELECT 
                                    SUM(jugador_partido.minutos)
                                FROM
                                    jugador_partido
                                WHERE
                                    jugador_partido.idjugador = JugadorID) AS minutos,
                            (SELECT 
                                    SUM(jugador_partido.puntos)
                                FROM
                                    jugador_partido
                                WHERE
                                    jugador_partido.idjugador = JugadorID) AS puntos,
                            (SELECT 
                                    SUM(jugador_partido.faltas)
                                FROM
                                    jugador_partido
                                WHERE
                                    jugador_partido.idjugador = JugadorID) AS faltas,
                            (SELECT 
                                    SUM(jugador_partido.rebotes)
                                FROM
                                    jugador_partido
                                WHERE
                                    jugador_partido.idjugador = JugadorID) AS rebotes
                        FROM
                            jugador
                                LEFT JOIN
                            jugador_partido ON jugador.id = jugador_partido.idjugador
                                LEFT JOIN
                            equipo ON jugador.idequipo = equipo.id
                        ");
    $tabla ="";
    $tabla .= "<table class='table table-striped table-hover'>";
    $tabla .= "<thead>";
    $tabla .= "<tr>";
    $tabla .= "<th>Nombre</th>";
    $tabla .= "<th>Equipo</th>";
    $tabla .= "<th>Edad</th>";
    $tabla .= "<th>Altura</th>";
    $tabla .= "<th>Peso(KG)</th>";
    $tabla .= "<th>Minutos</th>";
    $tabla .= "<th>Faltas</th>";
    $tabla .= "<th>Rebotes</th>";
    $tabla .= "<th>Puntos</th>";
    $tabla .= "<th>Editar</th>";
    $tabla .= "<th>Borrar</th>";
    $tabla .= "</tr>";
    $tabla .= "</thead>";
    $tabla .= "<tbody>";
    
    while ($row = mysqli_fetch_array($result,MYSQL_ASSOC)) {
        $tabla .= "<tr>";
        $tabla .= "<td style='text-align:left' class='nombre'>".$row["Nombre"]."</td>";
        $tabla .= "<td style='text-align:left' class='nombre'>".$row["Equipo"]."</td>";
        $tabla .= "<td style='text-align:left' class='nombre'>".$row["edad"]."</td>";
        $tabla .= "<td style='text-align:left' class='nombre'>".$row["Altura"]."</td>";
        $tabla .= "<td style='text-align:left' class='nombre'>".$row["Peso"]."</td>";
        $tabla .= "<td style='text-align:left' class='nombre'>".$row["minutos"]."</td>";
        $tabla .= "<td style='text-align:left' class='nombre'>".$row["puntos"]."</td>";
        $tabla .= "<td style='text-align:left' class='nombre'>".$row["faltas"]."</td>";
        $tabla .= "<td style='text-align:left' class='nombre'>".$row["rebotes"]."</td>";
        $tabla .= "<td><a href='editar.php?id=".$row["JugadorID"]."'>Editar</a></td>";
        $tabla .= "<td><a href='lib/borrar.php?id=".$row["JugadorID"]."'>Borrar</a></td>";
        $tabla .= "</tr>";
    }
    $tabla .= "</tbody>";
    $tabla .= "</table>";
    echo $tabla;
    desconectar();
?>-->
</div>
</body>
</html>