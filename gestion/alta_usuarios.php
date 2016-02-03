<!DOCTYPE HTML>
<html>
    <head>
        <?php include 'lib/cabecera.php'; ?>
        <title>Dar de alta usuarios</title>
        
        <script>
            $(document).ready(function(){
                $('#alta_usuario').click(function(){
                    // 1. Dar de alta el usuario en la base de datos. Si todo ha ido bien damos de alta el usuario de inicio de sesion y la pass
                    $.ajax({
                        url:'',
                        data:{},
                        type:'post',
                        success:function(resultado){},
                        error: function(){}
                    });
                });
            });
        </script>
    </head>
    <body>
        <?php include 'lib/menu.php'; ?>
        <div class="well bs-component" style="width: 70%; margin: 0 auto;">
            <h1>Dar de alta usuarios</h1>
            <form class="form-horizontal">
                <fieldset>
                    <legend>Datos generales usuarios</legend>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Nombre: </label>
                        <div class="col-lg-10">
                            <input type="text" name="nombre" id="nombre" class="form-control" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Apellidos:</label>
                        <div class="col-lg-10">
                            <input type="text" name="apellidos" id="apellidos" class="form-control" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Email:</label>
                        <div class="col-lg-10">
                            <input type="text" name="email" id="email" class="form-control" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Pass email:</label>
                        <div class="col-lg-10">
                            <input type="text" name="pass_email" id="pass_email" class="form-control" />
                        </div>
                    </div>
                <legend>Datos de inicio de sesi&oacute;n</legend>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Usuario:</label>
                        <div class="col-lg-10">
                            <input type="text" name="user" id="user" class="form-control" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Pass Inicio sesion:</label>
                        <div class="col-lg-10">
                            <input type="text" name="pass" id="pass" class="form-control" />
                        </div>
                    </div>
                     <div class="col-lg-10 col-lg-offset-2">
                        <input type="button" id="alta_usuario" value="Alta Usuario" class="btn btn-material-grey" />
                    </div>
                </fieldset>
            </form>
            <?php include 'lib/pie.php'; ?>
        </div>
    </body>
</html>