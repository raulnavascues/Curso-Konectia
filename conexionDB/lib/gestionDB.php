<?php
	$GLOBALS["CONEXION_DB"]="";
	
	function conectar(){
		
		$GLOBALS["CONEXION_DB"] = mysql_connect('localhost','konectia','konectia');
		
		mysql_select_db("konectia");
		
		if(!$GLOBALS["CONEXION_DB"]){
			die ("No hay conexion a la base de datos. Intentelo mas tarde por favor.<br />");
		}else{
			//echo 'Hay Conexion <br />';
		}
	}
	
	function desconectar(){
		mysql_close($GLOBALS["CONEXION_DB"]);
	}
	
	
	function ejecutarConsulta($query){
		return mysql_query($query);		
	}
	
	function liberarRecursos($result){
		mysql_free_result($result);
	}
	
	
	function ejecutarQuery($query){
		return mysql_query($query) or die("<h1>Se ha producido un error a la hora de la insercion</h1>");
		//mysql_insert_id();
	}
	//Tipos de lectura de los arrays de DB
	//MYSQL_NUM por numero de posicion
	//MYSQL_ASSOC por nombre de campo
	//MYSQL_BOTH por ambos(por nombre de campo o de posicion)
	
	//Liberar memoria MYSQL_FREE_RESULT($result);
	
?>