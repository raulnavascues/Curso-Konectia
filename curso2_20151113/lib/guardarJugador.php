<?php
    require 'conexionDB.php';


    $error_verificado = "";    

    if (150 > (int)$_POST['peso'] && (int)$_POST['peso'] > 40 ) {
        $peso = $_POST['peso'];
    }else{
        $error_verificado .= "Peso Incorrecto <br>";
    }
    if (80 > (int)$_POST['edad'] && (int)$_POST['edad'] >= 18 ) {
        $edad = $_POST['edad'];
    }else{
        $error_verificado .= "Edad Incorrecta <br>";
    }
    if (2.5 > (float)$_POST['altura'] && (float)$_POST['altura'] >= 1.5 ) {
        $altura = $_POST['altura'];
    }else{
        $error_verificado .= "Altura Incorrecta <br>";
    }
    if (strlen((string)$_POST['nombre'] < 3 )) {
        $nombre = $_POST['nombre'];
    }else{
        $error_verificado .= "Nombre demasiado corto<br>";
    }
    if (strlen((string)$_POST['apellidos'] < 3 )) {
        $apellidos = $_POST['apellidos'];
    }else{
        $error_verificado .= "Apellido demasiado corto<br>";
    }


    //echo $error_verificado;

    if (strlen($error_verificado)==0){
        $accion = $_POST['tarea'];
        //echo $accion;
        $id = $_POST['idJ'];
        $nombre = $_POST['nombre'];
        $apellidos = $_POST['apellidos'];
        $altura = $_POST['altura'];
        $peso = $_POST['peso'];
        $edad = $_POST['edad'];
        $equipo = $_POST['equipo'];
        //echo $_POST['equipo'];
        
        $query ="";
        switch (trim(strtolower($accion))){
            case 'editar':
                $query = "UPDATE jugador SET nombre='$nombre',apellidos = '$apellidos', altura=$altura, peso=$peso,edad=$edad,idequipo = $equipo WHERE id = $id";
                break;
            case 'insertar':
                $query = "INSERT INTO 
                                jugador (
                                    nombre, 
                                    apellidos, 
                                    altura, 
                                    peso, 
                                    edad, 
                                    idequipo
                                ) VALUES(
                                    '$nombre', 
                                    '$apellidos',
                                    $altura,
                                    $peso,
                                    $edad,
                                    $equipo
                                ) ";
                break;
        }
        echo $query;
        
         conectar();
         $resultado = ejecutarQuery($query);
         if ($resultado==1){
             echo "El registro se ha grabado correctamente<br />";
             echo "<a href='../index.php'>Volver a index</a>";
         }else{
            echo $resultado;    
         }
         
        desconectar();
    }else{
        echo $error_verificado;
        echo "<a href='../editar.php?id='".$_POST['idJ'].">Volver a atras</a>";
    }
?>
