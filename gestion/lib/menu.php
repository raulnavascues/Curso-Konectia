	<div class="navbar navbar-material-grey">
	     <div class="navbar-header">
	        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	        </button>
	            <a class="navbar-brand" href="index.php">Home</a>
	     </div>
	     <div class="divider"></div>
	     <div><!-- class="navbar-collapse collapse navbar-responsive-collapse">-->
	         <ul class="nav navbar-nav">
	            <li class="dropdown">
	                <a href ="#" data-target="#" class="dropdown-toggle" data-toggle="dropdown">Productos <b class="caret"></b></a>
	                <ul class="dropdown-menu">
	                    <li><a href="ver_productos.php">Ver Productos</a></li>
	                    <li><a href="nuevo_articulo.php" class="mdi-editor-insert-drive-file">Nuevo Producto</a></li>
	                    <li><a href="asociar_articulos_proveedores.php">Asociar Articulos y proveedores</a></li>
	                </ul>
	            </li>
	         </ul>
	         
	         <ul class="nav navbar-nav">
	            <li class="dropdown">
	                <a href="#" data-toggle="dropdown" class="dropdown-toggle">Proveedores <b class="caret"></b></a>
	                <ul class="dropdown-menu">
	                    <li><a href="ver_proveedores.php">Ver Proveedores</a></li>
	                    <li><a href="nuevo_proveedor.php">Nuevo Proveedor</a></li>
	                    <li><a href="asociar_articulos_proveedores.php">Asociar Articulos y proveedores</a></li>
	                </ul>
	            </li>
	         </ul>
	     </div>
	     
	     <div><!-- class="navbar-collapse collapse navbar-responsive-collapse">-->
	         <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a href ="#" data-target="#" class="dropdown-toggle" data-toggle="dropdown">Pedidos <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="ver_pedidos.php">Ver Pedidos</a></li>
                        <li><a href="nuevo_pedido.php">Nuevo Pedido</a></li>
                    </ul>
                </li>
             </ul>
	     </div>
	     
	     <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href ="#" data-target="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $_SESSION['nombre_usuario']; ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <?php if(strtolower($_SESSION['usuario'])=='admin')?><li><a href="alta_usuarios.php">Altas de usuarios</a></li>
                        <li><a href="logout.php">Cerrar Sesion</a></li>
                    </ul>
                </li>
             </ul>
	</div>
	<?php //include 'lib/breadcrumb.php';?>