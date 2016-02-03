<?php
    if(isset($_POST['idioma'])){
        setcookie("idioma",$_POST['idioma'],time()+300);
        header('Location:usoDeCookies.php');
        /*switch ($_POST['idioma']) {
            case 'es':
                
                echo "Redirecionando...";
                break;
            case 'en':
                header('refresh:5; url=english.html');
                echo "Redirecting...";
                break;
            default:
                break;
        }*/
      }    
    

?>

<!DOCTYPE html>
<html>
    <head>
        
    </head>
    <body>
        <form action="" method="post">
            <select id="idioma" name="idioma">
                <option value="">Elija un idioma</option>
                <option value="es">Espa&ntilde;ol</option>
                <option value="en">Ingles</option>
            </select>
            <input type="submit" value="Cambiar Idioma" />
        </form>
    </body>
</html>