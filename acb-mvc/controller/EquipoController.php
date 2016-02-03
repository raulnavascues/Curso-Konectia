<?php
    require_once '../model/ConexionBaseDatos.php';

    /**
     * 
     */
    class EquipoController{
        private $conexionDB;
        
        function __construct() {
            $this->conexionDB = new ConexionBaseDatos();       
        }
        
        
        function listar_equipos(){
            $consulta = "SELECT * FROM equipo";
            
            $resultado = $this->conexionDB->ejecutarSelect($consulta);
            
            return $resultado;
        }
    }
    

?>