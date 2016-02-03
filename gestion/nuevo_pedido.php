<?php
    include 'lib/conexionDB.php';
?>
<!DOCTYPE HTML>
<html lang="es">
    <head>
        <title>Realizar el pedido</title>
        <?php include 'lib/cabecera.php'; ?>
        
        <script>    
            var pedido;
            var proveedor;
            
            function cargar_combo(){
                $.ajax({
                    url: "lib/cargar_productos_combo.php",
                    type: "post",
                    dataType: 'html',
                    data:{
                        'proveedor': proveedor
                    },
                    async: true,
                    success : function(respuesta) {
                        $('#producto').html(respuesta);
                    }
                });
            }
            
            function recuperar_total(){
                $.ajax({
                    url: "lib/totalizar_pedido.php",
                    type: "post",
                    dataType: 'html',
                    data:{
                        'pedido': pedido
                    },
                    async: true,
                    success : function(respuesta) {
                        $('#total').val(respuesta);
                    }
                });
            }
            
            
            function recuperar_proveedor(){
                $.ajax({
                    url: "lib/seleccionar_proveedor.php",
                    type: "post",
                    dataType: 'html',
                    data:{
                        'proveedor': proveedor
                    },
                    async: true,
                    success : function(respuesta) {
                        $('#proveedor').val(respuesta);
                    }
                });
            }
            
            $(document).ready(function(){
                proveedor = 0; 
                $('table').DataTable();
                cargar_combo();
                
                $('#hacer_pedido').click(function(){
                   $.ajax({
                    url: "lib/alta_pedido.php",
                    type: "post",
                    data:{
                        'referencia': $("#referencia").val()
                    },
                    async: true,
                    success : function(respuesta) {
                        pedido = respuesta;
                    }
                });
            });
            
            $('#guardar_linea').click(function(){
                   $.ajax({
                    url: "lib/alta_lineas_pedido.php",
                    type: "post",
                    data:{
                        'pedido': pedido,
                        'cantidad':$('#cantidad').val(),
                        'producto': $('#producto').val(),
                        'proveedor': proveedor
                    },
                    async: true,
                    success : function(respuesta) {
                        proveedor = respuesta;
                        
                        $('#cantidad').val(0);
                        
                        cargar_combo();
                        //Cargar la tabla de las lineas 
                        $.ajax({
                            url: 'lib/cargar_lineas_pedido.php',
                            dataType : 'html',
                            type: 'post',
                            data:{
                                'pedido': pedido,
                                'proveedor': proveedor
                            },
                            success : function(respuesta) {
                                $('#proveedor_seleccionado').html(proveedor);
                                $('tbody').html(respuesta);
                            }
                        });
                        recuperar_total();
                        recuperar_proveedor();
                    }
                });
            });
            
            $('#finalizar_pedido').click(function(){
                $.ajax({
                    url: "lib/finalizar_pedido.php",
                    type: "post",
                    data:{
                        'pedido': pedido,
                        'proveedor': proveedor,
                        'total': $('#total').val()
                    },
                    async: true,
                    success : function(respuesta) {
                        //$(location).attr('href', 'gestion/ver_perdidos.php');
                    }
                });
            });
           });
        </script>
    </head>
    <body>
        <?php
            include 'lib/menu.php';
        ?>
        <div class="well bs-component" style="width: 70%; margin: 0 auto;">
            
            <div class="panel panel-material-red">
                <div class="panel-heading">
                    <h3 class="panel-title">1. Dar de alta un pedido</h3>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal">
                        <fieldset>
                            <div class="form-group">
                                <label class="col-lg-2 control-label">Nombre Pedido: </label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" name="referencia" id="referencia" placeholder="" />
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-10 col-lg-offset-2">
                                        <input type="button" id="hacer_pedido" value="Hacer pedido" class="btn btn-material-grey" />
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
            <div style="clear: both"></div>
            
            <div class="panel panel-material-blue">
                <div class="panel-heading">
                    <h3 class="panel-title">2. Seleccionar los articulos de un pedido</h3>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal">
                        <fieldset>
                            
                            <div class="form-group">
                                <label class="col-lg-2 control-label">Productos: </label>
                                <div class="col-lg-10">
                                    <select class="form-control" name="producto" id="producto"></select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label">Cantidad: </label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" name="cantidad" id="cantidad" placeholder="Introduzca una cantidad para el producto seleccionado" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-10 col-lg-offset-2">
                                    <input type="button" id="guardar_linea" value="Guardar Linea" class="btn btn-material-grey" />
                                </div>
                            </div>                    
                        </fieldset>
                    </form>
                        <div id="tabla" >
                            <table class='table table-striped table-hover'>
                                <thead>
                                    <th>Producto</th>
                                    <th>Cantidad</th>
                                    <th>Precio Unitario</th>
                                    <th>Precio</th>
                                    <th>Eliminar</th>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                    </div>
                </div>
            </div>
            
            
            <div class="panel panel-material-brown">
                <div class="panel-heading">
                    <h3 class="panel-title">3. Finalizar el pedido</h3>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal">
                <div class="form-group">
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Total del pedido: </label>
                        <div class="col-lg-10">
                            <input type="text" id="total" name ="total" class="form-control" readonly="readonly" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Proveedor del pedido: </label>
                        <div class="col-lg-10">
                            <input type="text" id="proveedor" name ="proveedor" class="form-control" readonly="readonly" />
                        </div>
                    </div>
                    <div class="col-lg-10 col-lg-offset-2">
                        <input type="button" id="finalizar_pedido" value="Finalizar pedido" class="btn btn-material-grey" />
                        <input type="button" id="finalizar_pedido" value="Enviar pedido" class="btn btn-material-grey" />
                    </div>
                </div>
            </form>
                </div>
            </div>
            
            <?php include 'lib/pie.php'; ?>
        </div>
        
    </body>
</html>