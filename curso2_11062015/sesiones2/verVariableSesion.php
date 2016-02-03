<?php
    session_start();
    
    $html ="<!DOCTYPE html>";
    $html .="<html>";
    $html .="<head>";
    $html .="<title>inicio de sesion</title>";
    $html .="</head>";
    $html .="<body>";
    $html .="<p><a href='verEnOtraPagina.php'>Ver en otra pagina</a></p>";
    $html .="<p>La variable de sesion contiene: <b>". $_SESSION['valor']."</b></p>";
    $html .="</body>";
    $html .="</html>";
    
    echo $html;
?>