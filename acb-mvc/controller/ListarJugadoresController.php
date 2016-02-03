<?php
    require_once 'EquipoController.php';
    require_once 'JugadorController.php';
    
    $jugador = new JugadorController();
    $archivo ="../view/listado_jugador.html";
    $vista = fopen($archivo, "r");
    $contenido = fread($vista, filesize($archivo));
    
    $archivo_menu =fopen('../lib/menu.php', "r");
    $contenido_menu =fread($archivo_menu, filesize('../lib/menu.php'));
    
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
    
    $res = $jugador->listar_jugador();
    foreach ($res as $row) {
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
        $tabla .= "<td><a href='EditarJugadorController.php?id=".$row["JugadorID"]."'>Editar</a></td>";
        $tabla .= "<td><a href='lib/borrar.php?id=".$row["JugadorID"]."'>Borrar</a></td>";
        $tabla .= "</tr>";
    }
    $tabla .= "</tbody>";
    $tabla .= "</table>";
    
    $contenido = str_replace("{menu}", $contenido_menu, $contenido);
    echo str_replace("{tabla}", $tabla, $contenido);
    
    
?>