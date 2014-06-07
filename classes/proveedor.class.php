<?php
    
    require_once "./includes/database_functions.php";
	require_once "./includes/validation_functions.php";
    
    class Proveedor {
        //Atributos
		private $id_proveedor;
        private $nombre_proveedor;
        private $nif_proveedor;
        private $direccion_proveedor;
        private $localidad_proveedor;
        private $tfno1_proveedor;
        private $tfno2_proveedor;
        private $fax_proveedor;
        private $email_proveedor;
        private $web_proveedor;
        private $contacto_proveedor;
		private $notas_proveedor;
        private $activo_proveedor;
        
        //Constructor
        public function __construct($data){
            $this->id_proveedor=($data['id_proveedor']!="")?$data['id_proveedor']:null;
            $this->nombre_proveedor=($data['nombre_proveedor']!="")?$data['nombre_proveedor']:null;
            $this->nif_proveedor=($data['nif_proveedor']!="")?$data['nif_proveedor']:null;
            $this->direccion_proveedor=($data['direccion_proveedor']!="")?htmlentities($data['direccion_proveedor']):null;
            $this->localidad_proveedor=($data['localidad_proveedor']!="")?$data['localidad_proveedor']:null;
            $this->tfno1_proveedor=($data['tfno1_proveedor']!="")?$data['tfno1_proveedor']:null;
            $this->tfno2_proveedor=($data['tfno2_proveedor']!="")?$data['tfno2_proveedor']:null;
            $this->email_proveedor=($data['email_proveedor']!="")?$data['email_proveedor']:null;
            $this->web_proveedor=($data['web_proveedor']!="")?$data['web_proveedor']:null;
            $this->contacto_proveedor=($data['contacto_proveedor']!="")?$data['contacto_proveedor']:null;
			$this->notas_proveedor=($data['notas_proveedor']!="")?htmlentities($data['notas_proveedor']):null;
            $this->activo_proveedor=(isset($data['activo_proveedor']))?$data['activo_proveedor']:1;
        }
        
        public function validar_proveedor(){   //Valido si mis datos de construccion son validos antes de hacer insert en DB.
            $validaciones['nombre_proveedor']=validar_nombre_proveedor($this->nombre_proveedor);
            $validaciones['nif_proveedor']=validar_cif($this->nif_proveedor);
            if ($this->direccion_proveedor!=""){
                $validaciones['direccion_proveedor']=validar_direccion($this->direccion_proveedor);
            }
			if ($this->localidad_proveedor!=""){
				$validaciones['localidad_proveedor']=validar_cpostal($this->localidad_proveedor);
			}
            if ($this->tfno1_proveedor!=""){
                $validaciones['tfno1_proveedor']=validar_telefono($this->tfno1_proveedor);
            }
            if ($this->tfno2_proveedor!=""){
                $validaciones['tfno2_proveedor']=validar_telefono($this->tfno2_proveedor);
            }
            if ($this->email_proveedor!=""){
                $validaciones['email_proveedor']=validar_email($this->email_proveedor);
            }
			if ($this->web_proveedor!=""){
                $validaciones['web_proveedor']=validar_web($this->web_proveedor);
            }
			if ($this->contacto_proveedor!=""){
                $validaciones['contacto_proveedor']=validar_apellidos($this->contacto_proveedor);
            }
            foreach ($validaciones as $value){
                if ($value==false){
                    return false;
                }
            }
            return true;
        }

        public function insertar_proveedor(){
            $query="INSERT INTO proveedores VALUES (";
            $query.="null,'$this->nombre_proveedor','".strtoupper($this->nif_proveedor)."','$this->direccion_proveedor',";
            $query.="'$this->localidad_proveedor','$this->tfno1_proveedor','$this->tfno2_proveedor',";
            $query.="'$this->fax_proveedor','$this->email_proveedor','$this->web_proveedor',";
            $query.="'$this->contacto_proveedor','$this->notas_proveedor',$this->activo_proveedor";
			$query.=");";
            $conn=conexion_puppiesdb();
			$result=mysqli_query($conn,$query) or die ("Error Insercion: ".mysqli_error($conn));
            $ultimo=mysqli_insert_id($conn);
            mysqli_close($conn);
            return $ultimo; 
        }

        public function modificar_proveedor(){
            $query="UPDATE proveedores SET";
            $query.=" nombre_proveedor='".$this->nombre_proveedor."'";
            $query.=" ,nif_proveedor='".$this->nif_proveedor."'";
            $query.=" ,direccion_proveedor='".$this->direccion_proveedor."'";
            $query.=" ,localidad_proveedor='".$this->localidad_proveedor."'";
            $query.=" ,tfno1_proveedor='".$this->tfno1_proveedor."'";
            $query.=" ,tfno2_proveedor='".$this->tfno2_proveedor."'";
            $query.=" ,fax_proveedor='".$this->fax_proveedor."'";
            $query.=" ,email_proveedor='".$this->email_proveedor."'";
            $query.=" ,web_proveedor='".$this->web_proveedor."'";
            $query.=" ,contacto_proveedor='".$this->contacto_proveedor."'";
			$query.=" ,notas_proveedor='".$this->notas_proveedor."'";
            $query.=" WHERE id_proveedor=".$this->id_proveedor.";";
            $conn=conexion_puppiesdb();
            $result=mysqli_query($conn,$query) or die ("Error en la actualizacion: ".mysqli_error($conn));
            mysqli_close($conn);
            return $this->id_proveedor;
        }

        public static function borrar_proveedor($id_proveedor){ 
            $query="UPDATE proveedores SET activo_proveedor=0 WHERE id_proveedor=$id_proveedor;";
            $conn=conexion_puppiesdb();
            $result=mysqli_query($conn,$query) or die ("Error en INACTIVO: ".mysqli_error($conn));
			mysqli_close($conn);
        }

        public static function buscar_proveedor($datos){
            $query="SELECT * FROM proveedores WHERE 1";
            if(!is_array($datos)){
                $query.=" AND id_proveedor={$datos}";
            }else{
				if ($datos['id_proveedor']!=""){
					$query.=" AND id_proveedor={$datos['id_proveedor']}";
				}
				if ($datos['nombre_proveedor']!=""){
					$query.=" AND nombre_proveedor LIKE '%{$datos['nombre_proveedor']}%'";
				}
				if ($datos['nif_proveedor']!=""){
					$query.=" AND nif_proveedor LIKE '%".strtoupper($datos['nif_proveedor'])."%'";
				}
				if ($datos['direccion_proveedor']!=""){
					$query.=" AND direccion_proveedor LIKE '%{$datos['direccion_proveedor']}%'";
				}
				//Cuidado con el codigo postal, la localidad y la provincia pq habra que hacer un JOIN con localidades
				if ($datos['localidad_proveedor']!=""){
					$query.=" AND localidad_proveedor='{$datos['localidad_proveedor']}'";
				}
				//if ($datos['provincia_proveedor']!=""){
				  //  $query.=" AND provincia_proveedor LIKE '%$datos['provincia_proveedor']%'";
				//}
				if ($datos['tfno1_proveedor']!=""){
					$query.=" AND tfno1_proveedor='{$datos['tfno1_proveedor']}'";
				}
				if ($datos['tfno2_proveedor']!=""){
					$query.=" AND tfno2_proveedor ='{$datos['tfno2_proveedor']}'";
				}
				if ($datos['fax_proveedor']!=""){
					$query.=" AND fax_proveedor LIKE '%{$datos['fax_proveedor']}%'";
				}
				if ($datos['email_proveedor']!=""){
					$query.=" AND email_proveedor LIKE '%{$datos['email_proveedor']}'";
				}
				if ($datos['web_proveedor']!=""){
					$query.=" AND web_proveedor LIKE '%{{$datos['web_proveedor']}%'";
				}
				if ($datos['contacto_proveedor']!=""){
					$query.=" AND contacto_proveedor LIKE '%{{$datos['contacto_proveedor']}%'";
				}
			}
            $query.=" AND activo_proveedor=1";
            $query.=";";
            $conn=conexion_puppiesdb();
            $result=mysqli_query($conn,$query) or die ("Error en consulta: ".mysqli_error($conn));
            $resultados=array();    
            while ($fila=mysqli_fetch_assoc($result)){
                $resultados[]=$fila;
            }
            return $resultados;
        }
		
		public function to_array(){
			//Convertimos un objeto en un array asociativo
			$datos=get_object_vars($this);
			return $datos;
		}
		
		public static function get_proveedor($id_proveedor){
            $conn=conexion_puppiesdb();
            $query="SELECT nombre_proveedor FROM proveedores WHERE id_proveedor=$id_proveedor;";
            $result=mysqli_query($conn,$query) or die ("Error SQL: ".mysqli_error($conn));
            $proveedor=mysqli_fetch_assoc($result);
			mysqli_close($conn);
			return $proveedor;	//Devolvemos todos los datos del proveedor seleccionado.    
        }
		
		public static function get_proveedores(){
			$conn=conexion_puppiesdb();
            $query="SELECT * FROM proveedores WHERE activo_proveedor=1";
            $result=mysqli_query($conn,$query) or die ("Error SQL: ".mysqli_error($conn));
            $proveedores=array();
			while ($fila=mysqli_fetch_assoc($result)){
                $proveedores[$fila['id_proveedor']]=$fila;
            }
			mysqli_close($conn);
            return $proveedores;
		}
    }
?>