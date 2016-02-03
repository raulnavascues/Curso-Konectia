<?php
	function activo($activo){
			if($activo== 1){
				$GLOBALS['activo']=true;
				$palAct ="<img src='/conexionDB/images/activo.png' alt='Estado activo del cliente'  style='width:32px;height:32px;' />";
			}elseif($activo==0){
				$GLOBALS['activo']=false;
				$palAct ="<img src='/conexionDB/images/no_activo.png' alt='Estado inactivo del cliente'  style='width:32px;height:32px;' />";
		}
		
		return $palAct;
	}
?>