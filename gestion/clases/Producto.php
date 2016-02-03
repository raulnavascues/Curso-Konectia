<?php   
    /**
     * 
     */
    class Producto{
        /**
         * Aqui va la definicion de los atributos de la clase 
         */ 
        private $id;
        private $nombre;
        private $precio;
        private $stock;
        
    	function __construct($idT,$nombreT,$precioT) {
    		setId($idT);
            setNombre($nombreT);
            setPrecio($precioT);
    	}
        
        function getId(){
            return $this->id;
        }
        
        function setId($idT){
            $this->id = $idT;
        }
        
        function getNombre(){
            return $this->nombre;
        }
        
        function setNombre($nombreT){
            $this->nombre = $nombreT;
        }
        
        function getPrecio(){
            return $this->precio;
        }
        
        function setPrecio($precioT){
            $this->precio = $precioT;
        }
        
        function getStock(){
            return $this->stock;
        }
        
        function setStock($stockT){
            $this->stock = $stockT;
        }
    }
?>