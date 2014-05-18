<?php

    function conexion_puppiesdb(){
		$server='localhost';
		$user='root';
		$pwd='';
		$db='puppies_db';
		$conn=mysqli_connect($server,$user,$pwd,$db);
        mysqli_query($conn,"SET NAMES'utf8'");  // Para que me coja correctamente el charset utf8
		return $conn;
	}
    
    function buscar_ultimo_id_tabla($tabla, $indice_tabla){
        // Nos devuleve el ultimo id insertado en un a tabla.
        $conn=conexion_puppiesdb();
        $query="SELECT $indice_tabla FROM $tabla ORDER BY $indice_tabla DESC LIMIT 1;";
        $result=mysqli_query($conn,$query) or die ("Error SQL: ".mysqli_error($conn));
        mysqli_close($conn);
        if (mysqli_num_rows($result)!=0){
            $dato=mysqli_fetch_assoc($result);
            $ultimo_id=$dato[$indice_tabla];
            return $ultimo_id;
        } else {
            return false;
        }
    }

    function get_localidades(){
        // Nos devuleve un array con todas las localidades
        $conn=conexion_puppiesdb();
        $query="SELECT * FROM localidades ORDER BY nombre_localidad ASC;";
        $result=mysqli_query($conn,$query) or die ("Error en recuperacion de localidades:".mysqli_error($conn));
        $localidades=array();
        while ($localidad=mysqli_fetch_assoc($result)){
            $localidades[]=$localidad;
        }
        mysqli_close($conn);
        return $localidades;
    }

?>