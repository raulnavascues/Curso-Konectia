<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Pagina principal</title>
		<script src="../js/jquery-1.11.3.js" type="text/javascript" language="JavaScript"></script>
		
		<link href="../css/menu.css" rel="stylesheet" />
		<link href="../css/layout.css" rel="stylesheet" />
		<!--<script src="js/jquery.dataTables.js" type="text/javascript" language="JavaScript"></script>
		<script src="js/dataTables.jqueryui.js" type="text/javascript" language="JavaScript"></script>
		<script src="js/dataTables.foundation.js" type="text/javascript" language="JavaScript"></script>
		
		<link href="css/dataTables.jqueryui.css" rel="stylesheet" />-->
		<link href="../css/botones.css" rel="stylesheet" />
		<link href="../css/styles.css" rel="stylesheet" />
		<script src="../js/scriptMenu.js" type="text/javascript" language="JavaScript"></script>
		<script>
			$(document).ready(function(){
				$.ajax({
					url :'../lib/cargar_tipos_trabajo.php',
					dataType: 'html',
					async: 'false',
					success: function(data){
						$('#b_tipos_trabajo').html(data);
					}
				});
			});
		</script>
	</head>
	<body>
		<!--Listar los tipos de trabajo -->
		<div class="centrar">
			<?php include '../include/menu.php'; ?>
			<table id="tabla_tipo_trabajo">
				<thead>
					<th>Nombre</th>
					<th>Activo</th>
					<th>Editar</th>
					<th>Borrar</th>
				</thead>
				<tbody id="b_tipos_trabajo"></tbody>
			</table>
		</div>
	</body>
</html>