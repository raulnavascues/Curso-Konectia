<?php
    function recuperarEquipos(){
        $query = "Select * from equipo";
    
        conectar();
        
        $result = ejecutarConsulta($query);
        
        desconectar();  
        
        return $result;  
    }
    
?>