<?php

require_once "./includes/database_functions.php";
require_once "./includes/validation_functions.php";
require_once "./includes/functions.php";

class Cliente{
    private $id_cliente;
    private $nif_cliente;
    private $nombre_cliente;
    private $apellidos_cliente;
    private $fnac_cliente;
    private $falta_cliente;
    private $sexo_cliente;
    private $direccion_cliente;
    private $cpostal_cliente;
    private $tfno1_cliente;
    private $tfno2_cliente;
    private $email_cliente;
    private $mailing_cliente;
    private $notas_cliente;
    private $activo_cliente;
    private $id_usuario;    // Usuario que realizara el registro que lo cogemos de $_SESSION['id_usuario'] la primera vez.
    
    public function __construct($data){
        // El parametro recibido es un array asociativo con los datos.
        $this->id_cliente=($data['id_cliente']!="")?$data['id_cliente']:null;
        $this->nif_cliente=($data['nif_cliente']!="")?strtoupper($data['nif_cliente']):null;
        $this->nombre_cliente=($data['nombre_cliente']!="")?$data['nombre_cliente']:null;
        $this->apellidos_cliente=($data['apellidos_cliente']!="")?$data['apellidos_cliente']:null;
        $this->fnac_cliente=($data['fnac_cliente']!="")?$data['fnac_cliente']:null;
        date_default_timezone_set('Europe/Madrid');    //Fijamos zona horaria
        $this->falta_cliente=($data['falta_cliente']!="")?$data['falta_cliente']:date('d/m/Y');
        $this->sexo_cliente=(isset($data['sexo_cliente']))?$data['sexo_cliente']:null;
        $this->direccion_cliente=($data['direccion_cliente']!="")?htmlentities($data['direccion_cliente']):null;
        $this->cpostal_cliente=($data['cpostal_cliente']!="")?$data['cpostal_cliente']:null;
        $this->tfno1_cliente=($data['tfno1_cliente']!="")?$data['tfno1_cliente']:null;
        $this->tfno2_cliente=($data['tfno2_cliente']!="")?$data['tfno2_cliente']:null;
        $this->email_cliente=($data['email_cliente']!="")?$data['email_cliente']:null;
        $this->mailing_cliente=(isset($data['mailing_cliente']))?$data['mailing_cliente']:0;
        $this->notas_cliente=($data['notas_cliente']!="")?htmlentities($data['notas_cliente']):null;
        $this->activo_cliente=(isset($data['activo_cliente']))?$data['activo_cliente']:1;
        $this->id_usuario=(isset($data['id_usuario']))?$data['id_usuario']:$_SESSION['id_usuario'];
        //Si viene del formulario no existe y lo cogemos de la variable de sesion pero si viene de la DB si tiene valor.
    }
    public function validar(){   //Valido si mis datos de construccion son validos antes de hacer insert en DB.
        $validaciones['nombre_cliente']=validar_nombre($this->nombre_cliente);
        $validaciones['apellidos_cliente']=validar_apellidos($this->apellidos_cliente);
        $validaciones['nif_cliente']=validar_nif($this->nif_cliente);
        if ($this->tfno1_cliente!=""){
            $validaciones['tfno1_cliente']=validar_telefono($this->tfno1_cliente);
        }
        if ($this->tfno2_cliente!=""){
            $validaciones['tfno2_cliente']=validar_telefono($this->tfno2_cliente);
        }
        if ($this->email_cliente!=""){
            $validaciones['email_cliente']=validar_email($this->email_cliente);
        }
        $validaciones['sexo_cliente']=($this->sexo_cliente=="f" || $this->sexo_cliente=="m")?true:false;
        if ($this->direccion_cliente!=""){
            $validaciones['direccion_cliente']=validar_direccion($this->direccion_cliente);
            $validaciones['cpostal_cliente']=validar_cpostal($this->cpostal_cliente);
        }
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
        $query="INSERT INTO clientes VALUES (";
        $query.="null,'$this->nif_cliente','$this->nombre_cliente','$this->apellidos_cliente',";
        $query.="'".formatear_fecha($this->fnac_cliente)."',";
        $query.="'".formatear_fecha($this->falta_cliente)."',";
        $query.="'$this->sexo_cliente','".$this->direccion_cliente."','$this->cpostal_cliente','$this->tfno1_cliente','$this->tfno2_cliente',";
        $query.="'$this->email_cliente',$this->mailing_cliente,'".$this->notas_cliente."',$this->activo_cliente,$this->id_usuario";
        $query.=");";
        echo $query;
        $result=mysqli_query($conn,$query) or die ("Error Insercion: "+mysqli_error($conn));
        $ultimo=mysqli_insert_id($conn);
        // Recuperamos el valor ID de la ultima insercion
        // Nos puede interesar para redirigir el flujo a la pagina clientes.php con ese ID y que nos cargue esa ficha.
        mysqli_close($conn);
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