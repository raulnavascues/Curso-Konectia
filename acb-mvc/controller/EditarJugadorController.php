<?php
    require_once 'JugadorController.php';
    require_once 'EquipoController.php';
    
    $jugador = new JugadorController();
    $archivo ="../view/editar_jugador.html";
    $vista = fopen($archivo, "r");
    $contenido = fread($vista, filesize($archivo));
    
    $archivo_menu =fopen('../lib/menu.php', "r");
    $contenido_menu =fread($archivo_menu, filesize('../lib/menu.php'));
    
    $jugador = new JugadorController();
    $resultadojugador = $jugador->datos_un_jugador($_GET['id']);
    
    $idequipo = 0;
    $nombre = '';
    $apellidos = '';
    $peso = 0;
    $altura = 0;
    $edad = 0;
    foreach($resultadojugador as $linea){
        $idequipo = $linea['idequipo'];
        $nombre = $linea['nombre'];
        $apellidos = $linea['apellidos'];
        $peso = $linea['peso'];
        $altura = $linea['altura'];
        $edad = $linea['edad'];
    }
    
    $equipo = new EquipoController();
    $res = $equipo->listar_equipos();
    $option = "<option value=''>Elija un equipo</option>";
    foreach ($res as $row) {
        $option .="<option value ='". $row['id']."'";
            if ($row['id'] == $idequipo){
                $option .="selected = 'selected'";
            }
            $option .=">".$row['nombre']."</option>";
    }
    
    $contenido = str_replace("{menu}", $contenido_menu, $contenido);
    $contenido = str_replace("{nombre}", $nombre, $contenido);
    $contenido = str_replace("{apellidos}", $apellidos, $contenido);
    $contenido = str_replace("{altura}", $altura, $contenido);
    $contenido = str_replace("{edad}", $edad, $contenido);
    $contenido = str_replace("{peso}", $peso, $contenido);
    $contenido = str_replace("{equipos}",$option , $contenido);
     
    echo $contenido;
?>