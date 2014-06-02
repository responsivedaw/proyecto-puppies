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
        $query.="'".mysqli_real_escape_string($conn,$this->nombre_mascota)."',";
        $query.="'".mysqli_real_escape_string($conn,$this->raza_mascota)."',";
        $query.="'".mysqli_real_escape_string($conn,$this->chip_mascota)."',";
        $query.="'".formatear_fecha($this->fnac_mascota)."',";
        $query.="'".formatear_fecha($this->falta_mascota)."',";
        $query.=mysqli_real_escape_string($conn,$this->peso_mascota).",";
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
    public static function buscar($datos){
        //var_dump($datos);
        //La invocamos como Mascota::buscar($datos) siendo $datos los recogidos por el formulario.
        $conn=conexion_puppiesdb();
        $query="SELECT mascotas.*,clientes.nombre_cliente,clientes.apellidos_cliente FROM mascotas,clientes WHERE clientes.id_cliente=mascotas.id_cliente";
        //Si le pasamos un array hacemos una busqueda normal, pero hacemos que podamos pasar solo un id para la busqueda.
        if (!is_array($datos)){
            $query.=" AND id_mascota={$datos}";
        } else {
            if ($datos['id_mascota']!=""){
                $query.=" AND id_mascota=".mysqli_real_escape_string($conn,$datos['id_mascota']);
            }
            if ($datos['nombre_mascota']!=""){
                $query.=" AND nombre_mascota LIKE '%".mysqli_real_escape_string($conn,$datos['nombre_mascota'])."%'";
            }
            if ($datos['raza_mascota']!=""){
                $query.=" AND raza_mascota LIKE '%".mysqli_real_escape_string($conn,$datos['raza_mascota'])."%'";
            }
            if ($datos['chip_mascota']!=""){
                $query.=" AND chip_mascota='".mysqli_real_escape_string($conn,$datos['chip_mascota'])."'";
            }
            if (validar_fecha($datos['fnac_mascota'])){
                $query.=" AND fnac_mascota='".formatear_fecha($datos['fnac_mascota'])."'";
            }
            if (validar_fecha($datos['falta_mascota'])){
                $query.=" AND falta_mascota='".formatear_fecha($datos['falta_mascota'])."'";
            }
            if (isset($datos['genero_mascota'])){
                $query.=" AND genero_mascota='{$datos['genero_mascota']}'";
            }
            if (isset($datos['librovac_mascota'])){
                $query.=" AND librovac_mascota='{$datos['librovac_mascota']}'";
            }
            if ($datos['id_cliente']!=""){
                $query.=" AND id_cliente={$datos['id_cliente']}";
            }
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
    }
    public function modificar(){
        //echo 'modificamos';
        //Previamente construimos un objeto cliente con los datos del formulario.
        //Si los datos son válidos, llamamos a este método.
        $conn=conexion_puppiesdb();
        $query="UPDATE mascotas SET";
        $query.=" nombre_mascota='".mysqli_real_escape_string($conn,$this->nombre_mascota)."'";
        $query.=" ,raza_mascota='".mysqli_real_escape_string($conn,$this->raza_mascota)."'";
        $query.=" ,chip_mascota='".mysqli_real_escape_string($conn,$this->chip_mascota)."'";
        $query.=" ,fnac_mascota='".formatear_fecha($this->fnac_mascota)."'";
        $query.=" ,falta_mascota='".formatear_fecha($this->falta_mascota)."'";
        $query.=" ,id_cliente=".$this->id_cliente;
        $query.=" ,genero_mascota='".$this->genero_mascota."'";
        $query.=" ,librovac_mascota='".$this->librovac_mascota."'";
        $query.=" ,peso_mascota=".mysqli_real_escape_string($conn,$this->peso_mascota);
        $query.=" ,notas_mascota='".mysqli_real_escape_string($conn,$this->notas_mascota)."'";
        $query.=" ,id_usuario=".$_SESSION['id_usuario'];
        $query.=" WHERE id_mascota=".$this->id_mascota.";";
        //var_dump($query);
        $result=mysqli_query($conn,$query) or die ("Error en la actualizacion: ".mysqli_error($conn));
        mysqli_close($conn);
        if (isset($_FILES['foto_mascota'])){
            if ($_FILES['foto_mascota']['size']<=1024000 && $_FILES['foto_mascota']['type']=="image/jpeg"){
                $origen=$_FILES['foto_mascota']['tmp_name'];
                $destino=self::$url_fotos.$this->id_mascota.".jpg";
                move_uploaded_file($origen,$destino);
            }
        }
        return $this->id_cliente;   //Lo devolvemos para cargar de nuevo el formulario con los datos actualizados.
    }
    public static function borrar($id_cliente){ // La invocaremos como Cliente::borrar_cliente($id_cliente)
        // Version DELETE
        // $query="DELETE FROM clientes WHERE id_cliente=$id_cliente;";
        // Version pasamos a inactivo.
        // Actualizamos tambien el id_usuario que realiza la modificacion para el tema de los triggers.
        $query="UPDATE mascotas SET activo_mascota=0,id_usuario={$_SESSION['id_usuario']} WHERE id_mascota=$id_cliente;";
        $conn=conexion_puppiesdb();
        $result=mysqli_query($conn,$query) or die ("Error en INACTIVO: ".mysqli_error($conn));
        mysqli_close($conn);
    }
    public function to_array(){
        //Convertimos un objeto en un array asociativo
        $datos=get_object_vars($this);
        return $datos;
    }
}
?>