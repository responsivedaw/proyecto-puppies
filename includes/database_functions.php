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
        // Nos devuleve un array con todas las localidades. El indice se corresponde con el cpostal_localidad.
        $conn=conexion_puppiesdb();
        $query="SELECT * FROM localidades ORDER BY nombre_localidad ASC;";
        $result=mysqli_query($conn,$query) or die ("Error en recuperacion de localidades:".mysqli_error($conn));
        $localidades=array();
        while ($localidad=mysqli_fetch_assoc($result)){
            $localidades[$localidad['cpostal_localidad']]=$localidad;
        }
        mysqli_close($conn);
        return $localidades;
    }
	
	function usuario_autenticado($user,$pass){
		$conn=conexion_puppiesdb();
		$query="SELECT * FROM usuarios WHERE activo_usuario=1";
		$query.=" AND usuario='".mysqli_real_escape_string($conn,$user)."'";
		$query.=" AND pwd_usuario='".hash('sha1',$pass)."'";
		var_dump($query);
		$result=mysqli_query($conn,$query) or die ("ERROR en la consulta de usuraio: ".mysqli_error($conn));
		if (mysqli_num_rows($result)!=0){
			$fila=mysqli_fetch_assoc($result);
			return $fila;
		} else {
			return false;
		}
	}
	
	function get_cliente($id_cliente){
		$conn=conexion_puppiesdb();
		$query="SELECT * FROM clientes WHERE id_cliente={$id_cliente};";
		if ($result=mysqli_query($conn,$query)){
			$cliente=mysqli_fetch_assoc($result);
			mysqli_close($conn);
			return $cliente;
		} else {
			return 0;
		}
	}

?>