<!DOCTYPE html>
<html>
    <head>
        <title>inicio de sesion</title>
    </head>
    <body>
        <?php if(isset($_SESSION['nombre'])) echo $_SESSION['nombre'];?>
        <form action="paginaCeroDeSesiones.php" method="post">
            <input type="text" name="usuario" id="usuario" />
            <select name="color" id="color">
                <option value="">Elija un color</option>
                <option value="green">Verde</option>
                <option value="blue">Azul</option>
                <option value="red">Rojo</option>
                <option value="black">Negro</option>
            </select>
            <input type="submit" value="Enviar" />
        </form>
    </body>
</html>