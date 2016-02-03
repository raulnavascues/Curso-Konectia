<?php
    /**
     * Clase llamada conectar. Lo que hace es una conexion a Base de Datos
     */
	class Conectar{
	   private $dataBase;
        
	   public function __construct(){
	       $this->dataBase = new PDO('mysql:host=localhost;dbname=restaurante', 'konectia', 'konectia');
	   }
       
       
       public function consultarQuery($query){
           try {
                //connect as appropriate as above
                return   $this->dataBase->query($query);
           
           } catch(PDOException $ex) {
                echo "An Error occured!"; //user friendly message
                some_logging_function($ex->getMessage());
           }   
       }
       
       public function desconectar(){
           $this->dataBase = null;
       }
	}
?>