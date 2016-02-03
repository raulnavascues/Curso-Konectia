<?php
    $GLOBALS["CONEXION_DB"]="";
	
	function conectar(){
		
		$GLOBALS["CONEXION_DB"] = mysqli_connect('localhost','konectia','konectia','');
		
		mysqli_select_db($GLOBALS["CONEXION_DB"],"gestion");
		
		if(!$GLOBALS["CONEXION_DB"]){
			die ("No hay conexion a la base de datos. Intentelo mas tarde por favor.<br />");
		}else{
			//echo 'Hay Conexion <br />';
		}
	}
	
	function desconectar(){
		mysqli_close($GLOBALS["CONEXION_DB"]);
	}
	
	
	function ejecutarConsulta($query){
		return mysqli_query($GLOBALS["CONEXION_DB"], $query);		
	}
	
	function liberarRecursos($result){
		mysqli_free_result($result);
	}
	
    function ejecutarQueryUpdateDelete($query){
        return mysqli_query($GLOBALS["CONEXION_DB"],$query) or die("<h1>Se ha producido un error a la hora de la insercion</h1>");
        
    }
	
	function ejecutarQueryInsert($query){
		mysqli_query($GLOBALS["CONEXION_DB"],$query) or die("<h1>Se ha producido un error a la hora de la insercion</h1>");
        
        return mysqli_insert_id($GLOBALS["CONEXION_DB"]);
		//mysql_insert_id();
	}
    
    function contar_registros($result){
        return mysqli_num_rows($result);
    }
    
    function arrayAsociativo($result){
        return mysqli_fetch_assoc($result);
    }
    
    function escapar_caracteres($string){
        return mysqli_real_escape_string($GLOBALS['CONEXION_DB'],$string);
    }
	//Tipos de lectura de los arrays de DB
	//MYSQL_NUM por numero de posicion
	//MYSQL_ASSOC por nombre de campo
	//MYSQL_BOTH por ambos(por nombre de campo o de posicion)
	
	//Liberar memoria MYSQL_FREE_RESULT($result);
	
?>