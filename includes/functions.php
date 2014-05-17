<?php
	function __autoload($classname) {
		$filename = "./classes/". strtolower($classname) .".class.php";
		include_once($filename);
	}
	function formatear_fecha($fecha){
		if (preg_match("/^\d{2}\/\d{2}\/\d{4}$/",$fecha)){
			//Recibimos una fecha en nuestro formato y la convertimos a formato MySQL
			$array_fecha=explode("/",$fecha);
			// Construyo una fecha del tipo YYYY-MM-DD
			$fecha_inv=$array_fecha[2]."-".$array_fecha[1]."-".$array_fecha[0];
		} else {
			//Recibimos una fecha en formato MySQL y la convertimos a nuestro formato
			$array_fecha=explode("-",$fecha);
			// Construyo una fecha del tipo DD/MM/YYYY
			$fecha_inv=$array_fecha[2]."/".$array_fecha[1]."/".$array_fecha[0];
		}
		return $fecha_inv;
	}
?>