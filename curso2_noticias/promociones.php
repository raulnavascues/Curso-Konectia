<?php 
    include 'funciones.php';
    
    function cargarPromociones(){
        $contenido = mostrarContenido("categorias.dat");
        
        $categorias = split("\n", $contenido);
        
        $selectCategoria ="<option>Seleccione una categoria</option>";
        for ($i=0;$i<count($categorias);$i++){
            $selectCategoria .="<option value='".$categorias[$i]."'>".$categorias[$i]."</option>";      
        }         
        return $selectCategoria;
    }
?>