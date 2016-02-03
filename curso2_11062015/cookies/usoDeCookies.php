<?php
    if(isset($_COOKIE['idioma'])){
        switch ($_COOKIE['idioma']) {
            case 'es':
                header('refresh:5; url=spanish.html');
                echo "Redirecionando...";
                break;
            case 'en':
                header('refresh:5; url=english.html');
                echo "Redirecting...";
                break;
            default:
                break;
        }
    }else{
        header('Location: elegirIdioma.php');
    }

?>