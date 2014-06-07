<?php
    
    require_once "./includes/database_functions.php";
	require_once "./includes/validation_functions.php";
    
    class Listado {
        //Atributos
		private $db;
        private $servidor;
        private $usuario;
		private $password;
        
        public static function clientes($datos){
			//var_dump($datos);
			//La invocamos como Listados::buscar_cliente($datos) siendo $datos los recogidos por el formulario.
			if(isset($datos['id_mascota'])){
				$query="SELECT * FROM clientes c, mascotas m WHERE 1";
			}elseif($datos['nombre_localidad']!=""){ //or $datos['provincia_localidad']
				$query="SELECT * FROM clientes c, localidades l WHERE 1";
			}else{
				$query="SELECT * FROM clientes WHERE 1";
			}
			if ($datos['cpostal_cliente']!=""){
				$query.=" AND cpostal_cliente LIKE '%{$datos['cpostal_cliente']}%'";
			}
			/*
			if ($datos['nombre_localidad']!=""){
				$query.=" AND nombre_localidad LIKE '%{$datos['nombre_localidad']}%'";
			}
			
			if (validar_fecha($datos['fnac_cliente'])){
				$query.=" AND fnac_cliente='".formatear_fecha($datos['fnac_cliente'])."'";
			}
			*/
			if (isset($datos['sexo_cliente'])){
				$query.=" AND sexo_cliente='{$datos['sexo_cliente']}'";
			}
			/*
			if (validar_fecha($datos['falta_cliente'])){
				$query.=" AND falta_cliente='".formatear_fecha($datos['falta_cliente'])."'";
			}
			*/
			
			if (isset($datos['tfno1_cliente'])){
				if($datos['tfno1_cliente']=="si"){
					$query.=" AND tfno1_cliente!=''";
				}else{
					$query.=" AND tfno1_cliente=''";
				}
			}
			if (isset($datos['email_cliente'])){
				if($datos['email_cliente']=="si"){
					$query.=" AND email_cliente!=''";
				}else{
					$query.=" AND email_cliente=''";
				}
			}
			if (isset($datos['mailing_cliente'])){
				if($datos['mailing_cliente']=="si"){
					$query.=" AND mailing_cliente=1";
				}else{
					$query.=" AND mailing_cliente=0";
				}
			}
			$query.=" AND activo_cliente=1;";
			var_dump($query);
			$conn=conexion_puppiesdb();
			$result=mysqli_query($conn,$query) or die ("Error en consulta: ".mysqli_error($conn));
			$resultados=array();    //Aqui iremos añadiendo cada una de las filas de la consulta.
			while ($fila=mysqli_fetch_assoc($result)){
				$resultados[]=$fila;
			}
			return $resultados;
			var_dump($resultados);
		}
		
		public static function mascotas($datos){
			$conn=conexion_puppiesdb();
			$query="SELECT mascotas.*,clientes.nombre_cliente,clientes.apellidos_cliente FROM mascotas,clientes WHERE clientes.id_cliente=mascotas.id_cliente";
			if ($datos['raza_mascota']!=""){
				$query.=" AND raza_mascota LIKE '%".mysqli_real_escape_string($conn,$datos['raza_mascota'])."%'";
			}
			if (isset($datos['genero_mascota'])){
				$query.=" AND genero_mascota='{$datos['genero_mascota']}'";
			}
			if (isset($datos['librovac_mascota'])){
				$query.=" AND librovac_mascota='{$datos['librovac_mascota']}'";
			}
			if (isset($datos['id_cliente'])){
				$query.=" AND id_cliente={$datos['id_cliente']}";
			}   
			$query.=" AND activo_mascota=1 ORDER BY mascotas.id_mascota ASC;";
			$result=mysqli_query($conn,$query) or die ("Error en consulta: ".mysqli_error($conn));
			$resultados=array();    //Aqui iremos añadiendo cada una de las filas de la consulta.
			while ($fila=mysqli_fetch_assoc($result)){
				$resultados[]=$fila;
			}
			mysqli_close($conn);
			return $resultados;
			// Devolvemos el array con los resultados.
			// Donde invoquemos a la funcion comprobaremos la longitud del array y tendremos el nº resultados.
			// Quiza tambien podriamos devolver solo un array con los ids.
			var_dump($query);
			var_dump($resultados);
		}
		
		public static function articulos($datos){
			$query="SELECT * FROM articulos WHERE 1";
			if ($datos['stock_articulo']!=""){
				$query.=" AND stock_articulo='{$datos['stock_articulo']}'";
			}
			if ($datos['prcompra_articulo']!=""){
				$query.=" AND prcompra_articulo='{$datos['prcompra_articulo']}'";
			}
			if ($datos['prventa_articulo']!=""){
				$query.=" AND prventa_articulo='{$datos['prventa_articulo']}'";
			}
			if ($datos['iva_articulo']!=""){
				$query.=" AND iva_articulo='{$datos['iva_articulo']}'";
			}
			if (isset($datos['id_categoria']) && $datos['id_categoria']!=0){
				$query.=" AND id_categoria='{$datos['id_categoria']}'";
			}
			if (isset($datos['id_proveedor']) && $datos['id_proveedor']!=0){
				$query.=" AND id_proveedor='{$datos['id_proveedor']}'";
			}
			$query.=" AND activo_articulo=1";
			$query.=";";
			$conn=conexion_puppiesdb();
			$result=mysqli_query($conn,$query) or die ("Error en consulta: ".mysqli_error($conn));
			$resultados=array();    //Aqui iremos añadiendo cada una de las filas de la consulta.
			while ($fila=mysqli_fetch_assoc($result)){
				$resultados[]=$fila;
			}
			return $resultados;
		}
	}
?>