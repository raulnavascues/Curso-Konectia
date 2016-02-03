<?php 
    session_start();
    session_destroy();
    session_unset();
    header('refresh: 20; url=login.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width-device-width, initial-scale-1.0" />
        <link href="css/bootstrap.min.css" rel="stylesheet" />
        <link href="css/material.css" rel="stylesheet" />
        <link href="css/material-wfont.css" rel="stylesheet" />
        <link href="css/ripples.css" rel="stylesheet" />
                
        <script src="js/jquery-1.11.3.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/material.js"></script>
        <script src="js/snackbar.min.js"></script>
        <script src="js/ripples.js"></script>
        
        <script src="js/jquery.dataTables.js"></script>
        <script src="js/dataTables.bootstrap.js"></script>
        
        <script>
            $(document).ready(function(){
                $.material.init();
             });
        </script>
        <title>Cierre de sesi&oacute;n</title>
    </head>
    <body>
        <div class="well bs-component" style="width: 70%; margin: 0 auto;">
            <img src="images/ico-ij-salir.png" style="" />
            <h2 style="display: inline-block;">Gracias por usar el sistema de gesti&oacute;n</h2>
            <?php include 'lib/pie.php'; ?>
        </div>
    </body>
</html>