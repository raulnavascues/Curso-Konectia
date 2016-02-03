<?php
    session_start();
    
    $color = $_SESSION['color'];
    
    $html ="<!DOCTYPE html>";
    $html .="<html>";
    $html .="<head>";
    $html .="<title>inicio de sesion</title>";
    $html .="</head>";
    $html .="<body>";
    $html .="<p><a href='uno.php'>Ir a pagina 1</a></p>";
    $html .="<p><a href='dos.php'>Ir a pagina 2</a></p>";
    $html .="<p><a href='logout.php'>Cerrar sesion</a></p>";
    
    $html .="<p>El codigo de la sesion es: <b>". session_id()."</b></p>";
    $html .="<p>El nombre de usuario es: <b>". $_SESSION['usuario']."</b></p>";
    $html .="<p>El color seleccionado es: <b>". $color."</b></p>";
    $html .="<h1 style='color:".$color."'>Pagina tres</h1>";
    $html .="</body>";
    $html .="</html>";
    
    echo $html;
?>