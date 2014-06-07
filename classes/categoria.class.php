<?php

    require_once "./includes/database_functions.php";
	require_once "./includes/validation_functions.php";

    class Categoria{
        private $id_categoria;
        private $denom_categoria;
        private $desc_categoria;
		private $notas_categoria;
        private $activo_categoria;
		
        public function __construct($data){
            $this->id_categoria=($data['id_categoria']!="")?$data['id_categoria']:null;
            $this->denom_categoria=($data['denom_categoria']!="")?$data['denom_categoria']:null;
            $this->desc_categoria=($data['desc_categoria']!="")?$data['desc_categoria']:null;
			$this->notas_categoria=($data['notas_categoria']!="")?$data['notas_categoria']:null;
            $this->activo_categoria=(isset($data['activo_categoria']))?$data['activo_categoria']:1;
        }
        
		public function validar_categoria(){
			$validaciones['denom_categoria']=validar_nombre($this->denom_categoria);
			if($validaciones['denom_categoria']==true){
				return true;
			}else{
				return false;
			}
		}
		
		public function insertar_categoria(){
			$query="INSERT INTO categorias VALUES (";
			$query.="null,'$this->denom_categoria',";
			$query.="'$this->desc_categoria',";
			$query.="'$this->notas_categoria',";
			$query.="$this->activo_categoria";
			$query.=");";
			$conn=conexion_puppiesdb();
			$result=mysqli_query($conn,$query) or die ("Error Insercion: "+mysqli_error($conn));
			$ultimo=mysqli_insert_id($conn);
			mysqli_close($conn);
			return $ultimo;
		}
		
		public function modificar_categoria(){
			$query="UPDATE categorias SET";
			$query.=" denom_categoria='".$this->denom_categoria."'";
			$query.=" ,desc_categoria='".$this->desc_categoria."'";
			$query.=" ,notas_categoria='".$this->notas_categoria."'";
			$query.=" WHERE id_categoria=".$this->id_categoria.";";
			$conn=conexion_puppiesdb();
			$result=mysqli_query($conn,$query) or die ("Error en la actualizacion: ".mysqli_error($conn));
			mysqli_close($conn);
			return $this->id_categoria;   
		}
		
		public static function borrar_categoria($id_categoria){ // La invocaremos como Categoria::borrar_categoria($id_categoria)
			$query="UPDATE categorias SET activo_categoria=0 WHERE id_categoria=$id_categoria;";
			$conn=conexion_puppiesdb();
			$result=mysqli_query($conn,$query) or die ("Error en INACTIVO: ".mysqli_error($conn));
			mysqli_close($conn);
		}
		
		public static function buscar_categoria($datos){
			//La invocamos como Categoria::buscar_categoria($datos) siendo $datos los recogidos por el formulario.
			$query="SELECT * FROM categorias WHERE 1";
			if(!is_array($datos)){
				$query.=" AND id_categoria={$datos}";
			}else{
				if ($datos['id_categoria']!=""){
					$query.=" AND id_categoria={$datos['id_categoria']}";
				}
				if ($datos['denom_categoria']!=""){
					$query.=" AND denom_categoria LIKE '%{$datos['denom_categoria']}%'";
				}
			}
			$query.=" AND activo_categoria=1";
			$query.=";";
			$conn=conexion_puppiesdb();
			$result=mysqli_query($conn,$query) or die ("Error en consulta: ".mysqli_error($conn));
			$resultados=array();    //Aqui iremos añadiendo cada una de las filas de la consulta.
			while ($fila=mysqli_fetch_assoc($result)){
				$resultados[]=$fila;
			}
			return $resultados;
			// Devolvemos el array con los resultados.
			// Donde invoquemos a la funcion comprobaremos la longitud del array y tendremos el nº resultados.
			// Quiza tambien podriamos devolver solo un array con los ids.
		}
		
        public function to_array(){
			//Convertimos un objeto en un array asociativo
			$datos=get_object_vars($this);
			return $datos;
		}
        
        public static function get_categoria($id_categoria){
            $conn=conexion_puppiesdb();
            $query="SELECT denom_categoria FROM categorias WHERE id_categoria=$id_categoria;";
            $result=mysqli_query($conn,$query) or die ("Error SQL: ".mysqli_error($conn));
            $categoria=mysqli_fetch_assoc($result);
			mysqli_close($conn);
			return $categoria;	//Devolvemos todos los datos del proveedor seleccionado.    
        }
		
		public static function get_categorias(){
			$conn=conexion_puppiesdb();
            $query="SELECT * FROM categorias WHERE activo_categoria=1";
            $result=mysqli_query($conn,$query) or die ("Error SQL: ".mysqli_error($conn));
            $categorias=array();
			while ($fila=mysqli_fetch_assoc($result)){
                $categorias[$fila['id_categoria']]=$fila;
            }
			mysqli_close($conn);
            return $categorias;
		}
    }

?>