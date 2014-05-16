<?php

    require_once "./includes/functions.php";
    require_once "./includes/database_functions.php";
    require_once "./includes/validation_functions.php";

    session_start();
    $_SESSION['id_usuario']=3;
    
    // Prueba de insercion en DB. ********************************
    /*$datos = array(
        'id_cliente' => '5',
        'nif_cliente' => '08931836q',
        'nombre_cliente' => 'Pedro',
        'apellidos_cliente' => 'Gomez',
        'fnac_cliente' => '10/12/2011',
        'falta_cliente' => '10/12/2014',
        'email_cliente' => 'email@email.com',
        'tfno1_cliente' => '999999999',
        'tfno2_cliente' => '',
        'direccion_cliente' => 'Calle Palomo 7',
        'cpostal_cliente' => '28000',
        'notas_cliente' => 'Esto son notas ....'
    );
    $cliente=new Cliente($datos);
    var_dump($cliente);
    $ultimo=$cliente->insertar_cliente();
    var_dump($ultimo);*/

    //Prueba busqueda ***********************************
    /*$datos_busqueda=array(
        'id_cliente' => '',
        'nombre_cliente' => 'Pedro',
        'apellidos_cliente' => '' ,
        'tfno1_cliente' => '' ,
        'tfno2_cliente' => '' ,
        'email_cliente' => '',
        'nif_cliente' => '',
        'fnac_cliente' => '',
        'falta_cliente' => '',
        'direccion_cliente' => '',
        'cpostal_cliente' => '',
        'provincia_cliente' => ''
    );
    $resultados_busqueda=Cliente::buscar_cliente($datos_busqueda);
    var_dump($resultados_busqueda);*/

    //Prueba modificar *******************************************
    /*$datos_mod = array(
        'id_cliente' => '5',
        'nif_cliente' => '08931836q',
        'nombre_cliente' => 'Pedro',
        'apellidos_cliente' => 'Gomez',
        'fnac_cliente' => '10/12/2011',
        'falta_cliente' => '10/12/2014',
        'email_cliente' => 'email@email.com',
        'tfno1_cliente' => '999999999',
        'tfno2_cliente' => '',
        'direccion_cliente' => 'Calle Palomo 7',
        'cpostal_cliente' => '28000',
        'notas_cliente' => 'Esto son notas ....',
        'mailing_cliente' => 1
    );
    $cliente2=new Cliente($datos_mod);
    var_dump($cliente2);
    $modificado=$cliente2->modificar_cliente();
    var_dump($modificado);*/

    //Prueba eliminar ********************************************
    // Eliminamos un cliente modificando su estado activo=0 y luego sacamos un listado de inactivos.
   /* $id_cliente=24;
    $query="SELECT * FROM clientes WHERE activo_cliente=0";
    
    $conn=conexion_puppiesdb();

    // Vemos los inactivos antes de ..
    $result=mysqli_query($conn,$query) or die ("Error en consulta inactivos: ".mysqli_error($conn));
    $inactivos1=array();
    while ($fila=mysqli_fetch_array($result)){
        $inactivos1[]=$fila;
    }
    var_dump($inactivos1);

    Cliente::borrar_cliente($id_cliente);
    
    // Vemos los inactivos despues de ..
    $result=mysqli_query($conn,$query) or die ("Error en consulta inactivos: ".mysqli_error($conn));
    $inactivos2=array();
    while ($fila=mysqli_fetch_array($result)){
        $inactivos2[]=$fila;
    }
    var_dump($inactivos2);

    mysqli_close($conn); */    

?>