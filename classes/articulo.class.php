<?php
    
    require_once "./includes/database_functions.php";
	require_once "./includes/validation_functions.php";
    
    class Articulo {
        //Atributos
		private $id_articulo;
        private $denom_articulo;
        private $notas_articulo;
        private $stock_articulo;
        private $prcompra_articulo;
        private $prventa_articulo;
        private $iva_articulo;
        private $activo_articulo;
        private $id_proveedor;
        private $id_categoria;
        private $id_usuario;
        
        //Constructor
        public function __construct($data){
			$this->id_articulo=($data['id_articulo']!="")?$data['id_articulo']:null;
			$this->denom_articulo=($data['denom_articulo']!="")?htmlentities($data['denom_articulo']):null;
			$this->notas_articulo=($data['notas_articulo']!="")?htmlentities($data['notas_articulo']):null;
            $this->stock_articulo=($data['stock_articulo']!="")?$data['stock_articulo']:0;
            $this->prcompra_articulo=($data['prcompra_articulo']!="")?$data['prcompra_articulo']:0;
            $this->prventa_articulo=($data['prventa_articulo']!="")?$data['prventa_articulo']:0;
            $this->iva_articulo=($data['iva_articulo']!="")?$data['iva_articulo']:0;
            $this->activo_articulo=(isset($data['activo_articulo']))?$data['activo_articulo']:1;
			$this->id_proveedor=($data['id_proveedor']!="")?$data['id_proveedor']:null;
			$this->id_categoria=($data['id_categoria']!="")?$data['id_categoria']:null;
			$this->id_usuario=(isset($data['id_usuario']))?$data['id_usuario']:$_SESSION['id_usuario'];
        }
        
        public function validar_articulo(){   
			$validaciones['denom_articulo']=validar_direccion($this->denom_articulo);
			
			if ($this->stock_articulo!=""){
				$validaciones['stock_articulo']=validar_precio($this->stock_articulo);
			}
			if ($this->prcompra_articulo!=""){
				$validaciones['prcompra_articulo']=validar_precio($this->prcompra_articulo);
			}
			if ($this->prventa_articulo!=""){
				$validaciones['prventa_articulo']=validar_precio($this->prventa_articulo);
			}
			if ($this->iva_articulo!=""){
				$validaciones['iva_articulo']=validar_entero($this->iva_articulo);
			}
			foreach ($validaciones as $value){
				if ($value==false){
					return false;
				}
			}
			return true;
		}

        public function insertar_articulo(){
			$query="INSERT INTO articulos VALUES (";
			$query.="null,'$this->denom_articulo',";
			$query.="'$this->notas_articulo',$this->stock_articulo,$this->prcompra_articulo,";
			$query.="$this->prventa_articulo,$this->iva_articulo,$this->activo_articulo,";
			$query.="$this->id_proveedor,$this->id_categoria,$this->id_usuario";
			$query.=");";
			$conn=conexion_puppiesdb();
			$result=mysqli_query($conn,$query) or die ("Error Insercion: "+mysqli_error($conn));
			$ultimo=mysqli_insert_id($conn);
			mysqli_close($conn);
			return $ultimo;
		}
		public function modificar_articulo(){
			$query="UPDATE articulos SET";
			$query.=" denom_articulo='".$this->denom_articulo."'";
			$query.=" ,notas_articulo='".$this->notas_articulo."'";
			$query.=" ,stock_articulo=".$this->stock_articulo;
			$query.=" ,prcompra_articulo=".$this->prcompra_articulo;
			$query.=" ,prventa_articulo=".$this->prventa_articulo;
			$query.=" ,iva_articulo=".$this->iva_articulo;
			$query.=" ,id_proveedor=".$this->id_proveedor;
			$query.=" ,id_categoria=".$this->id_categoria;
			$query.=" ,id_usuario=".$_SESSION['id_usuario'];
			$query.=" WHERE id_articulo=".$this->id_articulo.";";
			$conn=conexion_puppiesdb();
			$result=mysqli_query($conn,$query) or die ("Error en la actualizacion: ".mysqli_error($conn));
			mysqli_close($conn);
			return $this->id_articulo;   
		}
		public static function borrar_articulo($id_articulo){ // La invocaremos como Articulo::borrar_articulo($id_articulo)
			$query="UPDATE articulos SET activo_articulo=0,id_usuario={$_SESSION['id_usuario']} WHERE id_articulo=$id_articulo;";
			$conn=conexion_puppiesdb();
			$result=mysqli_query($conn,$query) or die ("Error en INACTIVO: ".mysqli_error($conn));
			mysqli_close($conn);
		}
		public static function buscar_articulo($datos){
			//La invocamos como Articulo::buscar_articulo($datos) siendo $datos los recogidos por el formulario.
			$query="SELECT * FROM articulos WHERE 1";
			if(!is_array($datos)){
				$query.=" AND id_articulo={$datos}";
			}else{
				if ($datos['id_articulo']!=""){
					$query.=" AND id_articulo={$datos['id_articulo']}";
				}
				if ($datos['denom_articulo']!=""){
					$query.=" AND denom_articulo LIKE '%{$datos['denom_articulo']}%'";
				}
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
			// Devolvemos el array con los resultados.
			// Donde invoquemos a la funcion comprobaremos la longitud del array y tendremos el nº resultados.
			// Quiza tambien podriamos devolver solo un array con los ids.
		}
		
		public function to_array(){
			//Convertimos un objeto en un array asociativo
			$datos=get_object_vars($this);
			return $datos;
		}
	}
?>