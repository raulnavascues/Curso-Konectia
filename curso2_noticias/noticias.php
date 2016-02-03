<?php include 'promociones.php' ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Dar de alta noticias</title>
    </head>
    
    
    <body>
        <form action="opcionesNoticias.php" method="post">
            <fieldset>
                <legend>Insertar nueva noticia</legend>
                <div>
                    <input type="hidden" id="accion" name="accion" value="insertar" />
                </div>
                <div>
                    <span>Titulo:* </span>
                    <input type="text" id="titulo" name="titulo" />
                </div>
                <div>
                    <span>Texto:* </span>
                    <textarea id="texto" name="texto"></textarea>
                </div>
                <div>
                    <span>Categoria: </span>
                    <select name="categorias" id="categorias"><?php echo cargarPromociones(); ?></select>
                </div>
                <div>
                    <span>Imagen: </span>
                    <input type="file" id="imagen" name="imagen" />
                </div>
                <div>
                    <input type="submit" id="guardar" name="guardar" value="Insertar Noticia" />
                </div>
            </fieldset>
            <span>NOTA: Los datos marcados con (*) deben ser rellenados obligatoriamente</span>
        </form>
    </body>
</html>