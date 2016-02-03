<?php
    if(isset($_POST['valor'])){
        session_start();
        $_SESSION['valor'] = $_POST['valor'];
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>inicio de sesion</title>
    </head>
    <body>
        <form action="" method="post">
            Valor de la variable de sesion: <input type="text" name="valor" id="valor" value="<?php if (isset($_SESSION['valor'])) echo $_SESSION['valor'];?>"/>
            <input type="submit" value="Crear variable de sesion" />
        </form>
        <a href="verVariableSesion.php">Ver valor variable de sesion</a>
    </body>
</html>