<?php
    
    require_once "funcionesArticulos.php";
    
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
        public function __construct($id,$denom,$notas,$stock,$prcompra,$prventa,$iva,$proveedor,$categoria,$usuario){
            $this->id_articulo=$id;
            $this->denom_articulo=$denom;
            $this->notas_articulo=$notas;
            $this->stock_articulo=$stock;
            $this->prcompra_articulo=$prcompra;
            $this->prventa_articulo=$prventa;
            $this->iva_articulo=$iva;
			$this->activo_articulo=1; //Por defecto la propiedad se activará al instanciar el objeto
			$this->id_proveedor=$proveedor;
			$this->id_categoria=$categoria;
			$this->id_usuario=$usuario;
        }
        
        function validarFormArticulos($denom_articulo){
            //var_dump($_POST);
            $denom_articulo=$_POST['denom_articulo'];
            
            $errores="";
            $cont=0;	
            
            if($denom_articulo==""){
                $errores.="<p style='color:white;background-color:black;border:1px solid black;text-align:center'>Debe introducir un artículo</p>";
                $cont++;	
            }
            
            if($cont>0){
                echo $errores;
                formArticulos();
                return false;
            }else{
                return true;
            }
        }//end fx Validar

        public function crearArticulo(){
			echo"<br><br><br><br><br><br><br><br><br><br>"; //ELIMINAR CUANDO ESTEN LOS ESTILOS
			$denom=$this->denom_articulo;
			$notas=$this->notas_articulo;
			$stock=$this->stock_articulo;
			$prcompra=$this->prcompra_articulo;
			$prventa=$this->prventa_articulo;
			$iva=$this->iva_articulo;
			$activo=$this->activo_articulo;
			$proveedor=$this->id_proveedor;
			$categoria=$this->id_categoria;
			$usuario=$this->id_usuario;
			
			//echo "<br><br><br><br><br><br> $denom Este ess el proveedor $proveedor y la categoria $categoria   "; //ELIMINAR CUANDO ESTEN LOS ESTILOS
			echo "<br><br><br><br><br><br> $denom $notas $stock $prcompra $prventa $iva $activo $proveedor $categoria $usuario  ";
			/*echo $prcompra;
			echo $usuario;
			*/
            $conn=conexion_puppiesdb();
            //$query="INSERT INTO 'articulos' ('denom_articulo','notas_articulo','stock_articulo','prcompra_articulo','prventa_articulo','iva_articulo','proveedores_id_proovedor','categorias_id_categoria','usuarios_id_usuario) VALUES ('$denom','$notas','$stock','$prcompra','$prventa','$iva','$proveedor','$categoria','$usuario')";
            $query='INSERT INTO articulos VALUES (NULL,"$denom","$notas","$stock","$prcompra","$prventa","$iva","$activo","$proveedor","$categoria","$usuario")';
            
            //DAVID:
            // $query = "INSERT INTO articulos VALUES (null,'$denom','$notas',$stock,$prcompra,$prventa,$iva,$activo,$proveedor,$categoria,$usuario);";
            // Los campos numericos (int-float-double-decimal-boolean) van sin comillas, las fechas y varchar o text van con comillas simples.
            // Ademas si inicias la asignacion a la cadena con comillas simples no se evaluan las variables.
			
			//Dando valores sí la inserta: $query="INSERT INTO articulos VALUES (NULL,'sergio','articulo prueba', 5000, 500.12, 500, 500, 1, 1, 1, 1)";
			
			$result=mysqli_query($conn,$query) or die ("Error SQL: ".mysqli_error($conn));
            mysqli_close($conn);
            echo "La fila ha sido insertada";
            
        }
        
        public function modificarArticulo(){
            echo "Se va a modificar un artículo";
        }
        
        public function buscarArticulo(){
            echo "Se va a buscar un artículo";
        }
        
    }
   