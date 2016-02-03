
<!DOCTYPE HTML>
<html>
    <head>
        <title>Asociar un producto a proveedor</title>
        <?php
            include 'lib/cabecera.php';
        ?>
        <script>
            function cargar_elementos(){
            	$.ajax({
                    url: "lib/cargar_relaciones.php",
                    type: "post",
                    dataType: 'json',
                    async: true,
                    success : function(respuesta) {
                        var opciones="";
                        var elemento;
                        for(i = 0; i< respuesta.length;i++){
                            elemento = respuesta[i];
                            opciones +="<tr>";
                            opciones +="<td>" + elemento.producto + "</td>";
                            opciones +="<td>" + elemento.proveedor + "</td>";
                            opciones +="<td>" + elemento.precio + "</td>";
                            opciones +="<td><a>Borrar</a></td>";
                            opciones +="</tr>";
                        }
                        $('#cuerpo').html(opciones);
                        $('#productos_proveedores').dataTable();
                     }
                });
            }
        
            $(document).ready(function(){
            	cargar_elementos();
    
                $('#guardar').click(function(){
                   $.ajax({
                    url: "lib/guardar_relacion.php",
                    type: "post",
                    //dataType: 'json',
                    data:{
                        'productos': $("#productos").val(),
                        'proveedores': $("#proveedores").val(),
                        'precio': $("#precio").val()
                    },
                    async: true,
                    success : function(respuesta) {
                        $("#notificaciones").addClass('alert alert-dismissable alert-success').html('Guardado correcto');
                        cargar_elementos();
                     },
                     error:function(){
                         $("#notificaciones").addClass('alert alert-dismissable alert-danger').html('Guardado correcto');
                     }
                }); 
                });
                
                $.ajax({
                    url: "lib/cargar_proveedores.php",
                    type: "post",
                    dataType: 'json',
                    async: false,
                    success : function(respuesta) {
                        var opciones="<option value=''>Elija un proveedor</option>";
                        var elemento;
                        for(i = 0; i< respuesta.length;i++){
                            elemento = respuesta[i];
                            opciones +="<option value='"+ elemento.id + "'>"+ elemento.id + " - " + elemento.nombre+"</option>";
                        }
                        $('#proveedores').html(opciones);
                     }
                });


               $.ajax({
                   url: "lib/cargar_articulos.php",
                   type: "post",
                   dataType: 'json',
                   async: true,
                   success : function(respuesta) {
                       var opciones="<option value=''>Elija un Articulo</option>";
                       var elemento;
                       for(i = 0; i< respuesta.length;i++){
                           elemento = respuesta[i];
                           opciones +="<option value='"+ elemento.id + "'>"+ elemento.id + " - " + elemento.nombre+"</option>";
                       }
                       $('#productos').html(opciones);
                    }
               });
               
               
              
            });
        </script>
    </head>
    <body>
    	<?php include 'lib/menu.php';?>
        <!--<div id="notificaciones">
            <button type="button" class="close" data-dismiss="alert">×</button>
        </div>-->
        <div class="well bs-component" style="width: 70%; margin: 0 auto;">
            <form class="form-horizontal">
                <fieldset>
                    <legend>Asociar un producto a proveedor</legend>
                    <div class="form-group">
                    	<label class="col-lg-2 control-label">Listado de productos:</label>
                    	<div class="col-lg-10">
                    		<select id="productos" name="productos" class="form-control"></select>
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="col-lg-2 control-label">Listado de proveedores:</label>
                    	<div class="col-lg-10">
                    		<select id="proveedores" name="proveedores" class="form-control"></select>
                    	</div>
                    </div>
                    <div class="form-group">
                    	<label class="col-lg-2 control-label">Precio de compra:</label>
                    	<div class="col-lg-10">
                    		<input type="text" name="precio" id = "precio" class="form-control" />
                    	</div>
                    </div>
                     <div class="form-group">
                         <input type="button" value="Guardar" id="guardar" class="btn btn-material-grey" />
                     </div>
                </fieldset>
            </form>
            
            <!-- Tabla de visualizacion de las nuevas relaciones entre producto y proveedor -->
            <table id="productos_proveedores" class="table table-striped table-hover">
            	<thead>
            		<th>Producto</th>
            		<th>Proveedor</th>
            		<th>Precio</th>
            		<th>Eliminar</th>
            	</thead>
            	<tbody id="cuerpo"></tbody>
            </table>
            
            <?php include 'lib/pie.php'; ?>
        </div>
    </body>
</html>