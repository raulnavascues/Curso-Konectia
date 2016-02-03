<?php
    require_once '../model/conectar.php';
    
    $cont = new PlatosController();
    
    echo $cont->recuperarPlatos();
    
    class PlatosController{
        var $conexion;
        
        public function __construct(){
            $this->conexion = new Conectar();
        }
        
        public function recuperarPlatos(){
            $resultado = $this->conexion->consultarQuery("SELECT * FROM plato where disponible=1");
            $this->conexion->desconectar();
            $archivo ="../view/view.html";
            $vista = fopen($archivo, "r");
            $contenido = fread($vista, filesize($archivo));
            
            $tabla = "";
            foreach ($resultado as $row) {
                $tabla .= "<tr>";
                $tabla .= "<td>".$row['nombre']."</td>";
                $tabla .= "<td>".$row['precio']."</td>";
                $tabla .= "</tr>";
            }
            
            return str_replace("{menu}", $tabla, $contenido);
        }
    }
?>