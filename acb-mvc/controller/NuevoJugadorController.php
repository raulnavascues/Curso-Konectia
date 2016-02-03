<?php
    require_once 'EquipoController.php';
    require_once 'JugadorController.php';
    require_once '../objetos/Jugador.php';
    
    $archivo ="../view/nuevo_jugador.html";
    $vista = fopen($archivo, "r");
    $contenido = fread($vista, filesize($archivo));
    
    $archivo_menu =fopen('../lib/menu.php', "r");
    $contenido_menu =fread($archivo_menu, filesize('../lib/menu.php'));
    $equipo = new EquipoController();
    
    $res = $equipo->listar_equipos();
    
    $option = "<option value=''>Elija un equipo</option>";
    foreach ($res as $row) {
        $option .="<option value ='". $row['id']."'";
            if ($row['id'] == $equipo){
                $option .="selected='selected'";
            }
            $option .=">".$row['nombre']."</option>";
    }
    
    $contenido = str_replace("{menu}", $contenido_menu, $contenido);
    $contenido = str_replace("{equipos}",$option , $contenido);
    
    echo $contenido;
    /**
     * Aqui empieza la recogida de datos
     */
    $jugadorC = new JugadorController();
    $jugador = new Jugador();
    if(isset($_POST['nombre'])){
        $jugador->set_nombre($_POST['nombre']);
        $jugador->set_apellidos($_POST['apellidos']);
        $jugador->set_altura($_POST['altura']);
        $jugador->set_peso($_POST['peso']);
        $jugador->set_edad($_POST['edad']);
        $jugador->set_equipo($_POST['equipo']);
        
        $jugadorC->recoger_jugador($jugador);
    }
?>