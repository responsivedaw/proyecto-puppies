<?php

	require "../includes/database_functions.php";
	
	$cpostal=$_POST['cpostal'];
	
	if ($cpostal==""){
		$provincia="";
	} else {
		$localidades=get_localidades();
		$provincia=$localidades[$cpostal]['provincia_localidad'];	
	}
	
	echo utf8_encode($provincia);
	
?>