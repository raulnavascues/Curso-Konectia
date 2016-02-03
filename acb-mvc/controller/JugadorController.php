<?php
    /**
     * 
     */
     require_once '../model/ConexionBaseDatos.php';
     require_once '../objetos/Jugador.php';
     
    class JugadorController{
        private $conexionDB;
        
        function __construct() {
            $this->conexionDB = new ConexionBaseDatos();   
        }
        
        
        function listar_jugador(){
            $consulta = "SELECT DISTINCT
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
                            equipo ON jugador.idequipo = equipo.id";
                            
            $resultado = $this->conexionDB->ejecutarSelect($consulta);
            
            return $resultado;
        }
        
        
        function recoger_jugador(Jugador $jugador){
            //$this->conexionDB->ejecutarInsertJugador($jugador);
            $sentencia = $this->conexionDB->get_conexion()->prepare("INSERT INTO 
                                                    jugador (
                                                        nombre, apellidos, edad, altura, peso , idequipo
                                                    ) VALUES (
                                                        :nombre, :apellido, :edad, :altura, :peso, :equipo
                                                    )");
                                                    
            $sentencia->bindParam(':nombre',$jugador->get_nombre());
            $sentencia->bindParam(':apellido',$jugador->get_apellidos());
            $sentencia->bindParam(':edad',$jugador->get_edad());
            $sentencia->bindParam(':altura',$jugador->get_altura());
            $sentencia->bindParam(':peso',$jugador->get_peso());
            $sentencia->bindParam(':equipo',$jugador->get_equipo());
            
            
            $this->conexionDB->ejecutarInsert($sentencia);
        }


    function actualizar_jugador(Jugador $jugador){
            //$this->conexionDB->ejecutarInsertJugador($jugador);
            $sentencia = $this->conexionDB->get_conexion()->prepare("
                                                UPDATE 
                                                    jugador 
                                                SET
                                                    nombre=:nombre , 
                                                    apellidos=:apellido, 
                                                    edad=:edad, 
                                                    altura=:altura, 
                                                    peso=:peso, 
                                                    idequipo=:equipo
                                                WHERE 
                                                    id =:id");
                                                    
            $sentencia->bindParam(':nombre',$jugador->get_nombre());
            $sentencia->bindParam(':apellido',$jugador->get_apellidos());
            $sentencia->bindParam(':edad',$jugador->get_edad());
            $sentencia->bindParam(':altura',$jugador->get_altura());
            $sentencia->bindParam(':peso',$jugador->get_peso());
            $sentencia->bindParam(':equipo',$jugador->get_equipo());
            $sentencia->bindParam(':id',$jugador->get_id());
            
            $this->conexionDB->ejecutarInsertUpdateDelete($sentencia);
        }
        
        function datos_un_jugador($id){
            return $this->conexionDB->ejecutarSelect("SELECT * FROM jugador WHERE ID = ".$id);
        }
        
    }
    
?>