<?php
    require_once 'Config/config.php';
    
    /**
     * Clase que gestiona la conexion a la Base de datos(Se utiliza PDO).
     */
    class Conexion{
        private $dataBase;
        function __construct(){
            $this->dataBase = new PDO("mysql:host=". Config::$SERVER .";dbname=".Config::$DATABASE, Config::$USER, Config::$PASS); 
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
       
       function ejecutarSelectPerpared($sentencia){
           try {
                //connect as appropriate as above
                $sentencia->execute();
                echo $sentencia->debugDumpParams();
                return $sentencia;
           
           } catch(PDOException $ex) {
                echo "An Error occured!"; //user friendly message
                some_logging_function($ex->getMessage());
           }   
       }
       
      function desconectar(){
          $this->dataBase = null;
      }
      
      function ejecutarInsertUpdateDelete($sentencia){ 
            return $sentencia->execute();
       }
      
      function get_conection(){
          return $this->dataBase;
      }
      
      function prepare_sql($sql){
          return $this->get_conection()->prepare($sql);
      }
    }
?>