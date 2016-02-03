<?php
    include 'funciones.php';
       
    $titulo=$_POST['titulo'];
    $texto =$_POST["texto"];
    $categorias=$_POST['categorias'];
    
     switch ($_POST['accion']) {
            case 'insertar':
                $datos = array('titulo'=>$titulo, 'texto'=>$texto,'categoria'=>$categorias);
                guardar_contenido("noticias.dat",$datos);            
                break;
            
            default:
                
                break;
        }
   
 

?>
