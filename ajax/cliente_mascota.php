<?php
    sleep(2);
    require "../includes/database_functions.php";
    $id_cliente=$_POST['id_cliente'];
    $cliente=get_cliente($id_cliente);
    if ($cliente==0){
        echo $cliente;
    } else {
        echo json_encode($cliente, JSON_UNESCAPED_UNICODE);
    }
?>