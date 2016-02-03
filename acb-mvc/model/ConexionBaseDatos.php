<?php
    require_once '../objetos/Jugador.php';
    
    class ConexionBaseDatos{
        private $dataBase;
        
       function __construct(){
           $this->dataBase = new PDO('mysql:host=localhost;dbname=acb', 'konectia', 'konectia');
       }
       
       function get_conexion(){
           return $this->dataBase;
       }
       
       function ejecutarSelect($query){
           try {
                //connect as appropriate as above
                return   $this->dataBase->query($query);
           
           } catch(PDOException $ex) {
                echo "An Error occured!"; //user friendly message
                some_logging_function($ex->getMessage());
           }   
       }
       
       function ejecutarInsertUpdateDelete($sentencia){ 
            $sentencia->execute();
       }
       
       function desconectar(){
           $this->dataBase = null;
       }
    }
?>