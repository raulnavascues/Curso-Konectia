<?php
    /**
     * 
     */
    class Jugador {
        private $id;
        private $nombre; 
        private $apellidos;
        private $altura;
        private $peso;
        private $edad;
        private $equipo;
        
        function __construct() {
            
        }
        
        function set_id($id){
            $this->id = $id;
        }
        
        function get_id(){
            return $this->id;
        }
        
        function set_nombre($nom){
            $this->nombre = $nom;
        }
        
        function get_nombre(){
            return $this->nombre;
        }
        
        function set_apellidos($apell){
            $this->apellidos = $apell;
        }
        
        function get_apellidos(){
            return $this->apellidos;
        }
        
        function set_altura($alt){
            $this->altura = $alt;
        }
        
        function get_altura(){
            return $this->altura;
        }
        
        function set_peso($pes){
            $this->peso = $pes;
        }
        
        function get_peso(){
            return $this->peso;
        }
        
        function set_edad($eda){
            $this->edad = $eda;
        }
        
        function get_edad(){
            return $this->edad;
        }
        
        function set_equipo($equi){
            $this->equipo = $equi;
        }
        
        function get_equipo(){
            return $this->equipo;
        }
    }
    
?>