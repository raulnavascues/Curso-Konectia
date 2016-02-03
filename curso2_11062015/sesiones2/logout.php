<?php 
    session_start();
    session_unset('valor');
    session_destroy();
    header("Location: creacionVariable.php");
?>