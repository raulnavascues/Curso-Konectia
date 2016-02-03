<?php
    include 'ficheros.php';
    include 'menu.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Buscar un numero en el fichero</title>
    </head>
    <body>
        <form action="buscar.php" method="post">
            <input type="text" name="numero_a_buscar" />
            <input type="submit" value="Buscar" />
        </form>
    </body>
</html>
<?php
  if (isset($_POST['numero_a_buscar'])){
        $busqueda = $_POST['numero_a_buscar'];
        
        if ((int)($busqueda) == $busqueda){
            echo "El numero '".(int)($busqueda)."' esta en la posicion '". buscar_numero("numeros.dat",(int)($busqueda))."'";
        }
    }
?>