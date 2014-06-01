<?php

require_once "./includes/database_functions.php";
require_once "./includes/validation_functions.php";
require_once "./includes/functions.php";

class Mascota{
    public static $url_fotos="./images/mascotas/";
    private $id_mascota;
    private $nombre_mascota;
    private $raza_mascota;
    private $chip_mascota;
    private $fnac_mascota;
    private $falta_mascota;
    private $genero_mascota;
    private $peso_mascota;
    private $notas_mascota;
    private $librovac_mascota;
    private $foto_mascota;
    private $activo_mascota;
    private $id_cliente;
    private $id_usuario;    // Usuario que realizara el registro que lo cogemos de $_SESSION['id_usuario'] la primera vez.
    
    public function __construct($data){
        // El parametro recibido es un array asociativo con los datos.
        date_default_timezone_set('Europe/Madrid');    //Fijamos zona horaria
        $this->id_mascota=($data['id_mascota']!="")?$data['id_mascota']:null;
        $this->nombre_mascota=($data['nombre_mascota']!="")?$data['nombre_mascota']:null;
        $this->raza_mascota=($data['raza_mascota']!="")?$data['raza_mascota']:null;
        $this->chip_mascota=($data['chip_mascota']!="")?strtoupper($data['chip_mascota']):null;
        $this->fnac_mascota=($data['fnac_mascota']!="")?$data['fnac_mascota']:null;
        $this->peso_mascota=($data['peso_mascota']!="")?$data['peso_mascota']:null;
        $this->genero_mascota=(isset($data['genero_mascota']))?$data['genero_mascota']:null;
        $this->notas_mascota=($data['notas_mascota']!="")?htmlentities($data['notas_mascota']):null;
        $this->librovac_mascota=(isset($data['librovac_mascota']))?$data['librovac_mascota']:0;
        $this->foto_mascota=(isset($data['foto_mascota']))?$data['foto_mascota']:'no_photo.jpg';
        $this->falta_mascota=($data['falta_mascota']!="")?$data['falta_mascota']:date('d/m/Y');
        $this->activo_mascota=(isset($data['activo_mascota']))?$data['activo_mascota']:1;
        $this->id_cliente=($data['id_cliente']!="")?$data['id_cliente']:null;
        $this->id_usuario=(isset($data['id_usuario']))?$data['id_usuario']:$_SESSION['id_usuario'];
        //Si viene del formulario no existe y lo cogemos de la variable de sesion pero si viene de la DB si tiene valor.
    }
    public function validar(){
        //Valido si mis datos de construccion son validos antes de hacer insert en DB.
        $validaciones['nombre_mascota']=validar_nombre($this->nombre_mascota);
        $validaciones['chip_mascota']=validar_chip($this->chip_mascota);
        $validaciones['raza_mascota']=validar_nombre($this->raza_mascota);
        $validaciones['genero_mascota']=($this->genero_mascota=="hembra" || $this->genero_mascota=="macho")?true:false;
        $validaciones['fnac_mascota']=validar_fecha($this->fnac_mascota);     
        //var_dump($validaciones);
        foreach ($validaciones as $value){
            if ($value==false){
                //var_dump($validaciones);
                return false;
            }
        }
        return true;
    }
    public function insertar(){
        $conn=conexion_puppiesdb();
        $query="INSERT INTO mascotas VALUES (null,";
        $query.="'{$this->nombre_mascota}',";
        $query.="'{$this->raza_mascota}',";
        $query.="'{$this->chip_mascota}',";
        $query.="'".formatear_fecha($this->fnac_mascota)."',";
        $query.="'".formatear_fecha($this->falta_mascota)."',";
        $query.="{$this->peso_mascota},";
        $query.="'{$this->genero_mascota}',";
        $query.="'".htmlentities($this->notas_mascota)."',";
        $query.="{$this->librovac_mascota},";
        $query.="null,";    //No insertamos la foto aun, primero necesitamos el ID de la mascota.
        $query.="{$this->activo_mascota},";
        $query.="{$this->id_cliente},";
        $query.="{$this->id_usuario}";
        $query.=");";
        //var_dump($query);
        $result=mysqli_query($conn,$query) or die ("Error Insercion: "+mysqli_error($conn));
        $ultimo=mysqli_insert_id($conn);
        // Recuperamos el valor ID de la ultima insercion, con ese ID construimos un archivo con la imagen si existe.
        $query2="UPDATE mascotas SET foto_mascota='{$ultimo}.jpg' WHERE id_mascota={$ultimo};";
        mysqli_query($conn,$query2) or die ("Error en insercion foto: ".mysqli_error($conn));
        mysqli_close($conn);
        if (isset($_FILES['foto_mascota'])){
            if ($_FILES['foto_mascota']['size']<=1024000 && $_FILES['foto_mascota']['type']=="image/jpeg"){
                $origen=$_FILES['foto_mascota']['tmp_name'];
                $destino=self::$url_fotos.$ultimo.".jpg";
                move_uploaded_file($origen,$destino);
            }
        }
        return $ultimo;
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    public function modificar(){
        //echo 'modificamos';
        //Previamente construimos un objeto cliente con los datos del formulario.
        //Si los datos son válidos, llamamos a este método.
        $conn=conexion_puppiesdb();
        $query="UPDATE clientes SET";
        $query.=" nombre_cliente='".$this->nombre_cliente."'";
        $query.=" ,apellidos_cliente='".$this->apellidos_cliente."'";
        $query.=" ,nif_cliente='".$this->nif_cliente."'";
        $query.=" ,fnac_cliente='".formatear_fecha($this->fnac_cliente)."'";
        $query.=" ,falta_cliente='".formatear_fecha($this->falta_cliente)."'";
        $query.=" ,direccion_cliente='".$this->direccion_cliente."'";
        $query.=" ,cpostal_cliente='".$this->cpostal_cliente."'";
        $query.=" ,sexo_cliente='".$this->sexo_cliente."'";
        $query.=" ,tfno1_cliente='".$this->tfno1_cliente."'";
        $query.=" ,tfno2_cliente='".$this->tfno2_cliente."'";
        $query.=" ,email_cliente='".$this->email_cliente."'";
        $query.=" ,mailing_cliente=$this->mailing_cliente";
        $query.=" ,notas_cliente='".$this->notas_cliente."'";
        $query.=" ,id_usuario=".$_SESSION['id_usuario'];
        $query.=" WHERE id_cliente=".$this->id_cliente.";";
        //var_dump($query);
        $result=mysqli_query($conn,$query) or die ("Error en la actualizacion: ".mysqli_error($conn));
        mysqli_close($conn);
        return $this->id_cliente;   //Lo devolvemos para cargar de nuevo el formulario con los datos actualizados.
    }
    public static function borrar($id_cliente){ // La invocaremos como Cliente::borrar_cliente($id_cliente)
        // Version DELETE
        // $query="DELETE FROM clientes WHERE id_cliente=$id_cliente;";
        // Version pasamos a inactivo.
        // Actualizamos tambien el id_usuario que realiza la modificacion para el tema de los triggers.
        $query="UPDATE clientes SET activo_cliente=0,id_usuario={$_SESSION['id_usuario']} WHERE id_cliente=$id_cliente;";
        $conn=conexion_puppiesdb();
        $result=mysqli_query($conn,$query) or die ("Error en INACTIVO: ".mysqli_error($conn));
        mysqli_close($conn);
    }
    public static function buscar($datos){
        //var_dump($datos);
        //La invocamos como Cliente::buscar_cliente($datos) siendo $datos los recogidos por el formulario.
        $query="SELECT * FROM clientes WHERE 1";
        //Si le pasamos un array hacemos una busqueda normal, pero hacemos que podamos pasar solo un id para la busqueda.
        if (!is_array($datos)){
            $query.=" AND id_cliente={$datos}";
        } else {
            if ($datos['id_cliente']!=""){
                $query.=" AND id_cliente={$datos['id_cliente']}";
            }
            if ($datos['nombre_cliente']!=""){
                $query.=" AND nombre_cliente LIKE '%{$datos['nombre_cliente']}%'";
            }
            if ($datos['apellidos_cliente']!=""){
                $query.=" AND apellidos_cliente LIKE '%{$datos['apellidos_cliente']}%'";
            }
            if ($datos['nif_cliente']!=""){
                $query.=" AND nif_cliente='{$datos['nif_cliente']}'";
            }
            if (validar_fecha($datos['fnac_cliente'])){
                $query.=" AND fnac_cliente='".formatear_fecha($datos['fnac_cliente'])."'";
            }
            if (validar_fecha($datos['falta_cliente'])){
                $query.=" AND falta_cliente='".formatear_fecha($datos['falta_cliente'])."'";
            }
            if (isset($datos['sexo_cliente'])){
                $query.=" AND sexo_cliente='{$datos['sexo_cliente']}'";
            }
            if (isset($datos['mailing_cliente'])){
                $query.=" AND mailing_cliente='{$datos['mailing_cliente']}'";
            }
            if ($datos['direccion_cliente']!=""){
                $query.=" AND direccion_cliente LIKE '%{$datos['direccion_cliente']}%'";
            }
            //Cuidado con el codigo postal, la localidad y la provincia pq habra que hacer un JOIN con localidades
            if ($datos['cpostal_cliente']!=""){
                $query.=" AND cpostal_cliente LIKE '%{$datos['cpostal_cliente']}%'";
            }
            if ($datos['tfno1_cliente']!=""){
                $query.=" AND tfno1_cliente LIKE '%{$datos['tfno1_cliente']}%'";
            }
            if ($datos['tfno2_cliente']!=""){
                $query.=" AND tfno2_cliente LIKE '%{$datos['tfno2_cliente']}%'";
            }
            if ($datos['email_cliente']!=""){
                $query.=" AND email_cliente='{$datos['email_cliente']}'";
            }
        }       
        $query.=" AND activo_cliente=1;";
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