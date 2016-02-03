<?php
    //require 'lib/comprobar_sesion.php';
    //comprobar_sesion();
?>
<div class="navbar navbar-info">
     <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
            <a class="navbar-brand" href="/acb-mvc">Home</a>
            <a class="navbar-brand" href="/acb-mvc/controller/ListarJugadoresController.php">Listado Jugador</a>
            <a class="navbar-brand" href="/acb-mvc/controller/NuevoJugadorController.php">Insertar Jugador</a>
     </div>
     
     <div class="nav navbar-nav navbar-right">
         <a class="navbar-brand" href="logout.php"><?php echo $_SESSION['usuario']; ?></a>
     </div>
     <?php
        if($_SESSION['usuario']=='admin'){
     ?>
     <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
            <a class="navbar-brand" href="/curso2_20151113">Listado Usuarios</a>
            <a class="navbar-brand" href="/curso2_20151113/nuevo_jugador.php">Nuevo Usuario</a>
     </div>
     <!--<div class="navbar-collapse collapse navbar-responsive-collapse">
        <ul class="nav navbar-nav">
            <li class="active"><a href="javascript:void(0)">Active</a></li>
            <li><a href="javascript:void(0)">Link</a></li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="javascript:void(0)">Nuevo Usuario</a></li>
                    <li><a href="javascript:void(0)">Listado usuarios</a></li>
                    <li><a href="javascript:void(0)">Something else here</a></li>
                    <li class="divider"></li>
                    <li class="dropdown-header">Dropdown header</li>
                    <li><a href="javascript:void(0)">Separated link</a></li>
                    <li><a href="javascript:void(0)">One more separated link</a></li>
                </ul>
            </li>
        </ul>
     </div>-->
     <?php
     }
    ?>
</div>