<?php
    include('ficheros.php');
?>
<!DOCTYPE html>
<html>
      <head><title> datos en el fichero</title></head>
      <body>
            <?php include 'menu.php';
            if(!isset($_POST['fichero'])){ ?>
            <form action="insertar.php" method="post">
                <input type="text" id="numero" name="numero" />
                <input type="submit" value="Enviar" />
            </form>     
            <?php }?>
      </body>
</html>
  <?php
    if(isset($_POST['numero'])){
        insertarDato($_POST['numero'],"numeros.dat");
    }
?>

