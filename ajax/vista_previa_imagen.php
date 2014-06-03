<?php
    //var_dump($_FILES);
    //var_dump($_FILES);
    //var_dump($_FILES);
    sleep(rand(3,5));
    if (isset($_FILES['foto_mascota'])){
        $file=$_FILES['foto_mascota'];
        $nombre='preview.jpg';
        $tipo=$file['type'];
        $tam=$file['size'];
        $temp_path=$file['tmp_name'];
        $path="./images/mascotas/";
        if ($tipo!='image/jpeg' && $tipo!='image/png'){
            echo '0';
        } elseif ($tam>1024000){
            echo '1';
        } else {
            move_uploaded_file($temp_path,".".$path.$nombre);
            echo $path.$nombre;
        }
    }
?>