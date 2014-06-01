<?php
    function validar_email($email){
        $patron_email="/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/";
        return preg_match($patron_email,$email);
    }
    function validar_telefono($tfno){
        $patron_tfno="/^[6-9][[:digit:]]{8}$/";
        return preg_match($patron_tfno,$tfno);
    }
    function validar_nombre($nombre){
        $patron_nombre="/^[a-zñáéíóú]+(\s[a-zñáéíóúü]+)?$/i";
        return preg_match($patron_nombre,$nombre);
    }
    function validar_apellidos($apell){
        $patron_apellidos="/^[a-zñáéíóú]+(\s[a-zñáéíóúü]+)*$/i";
        return preg_match($patron_apellidos,$apell);
    }
    function validar_fecha($fecha){
        $patron_fecha="/^[0-3][0-9]\/[01][0-9]\/[12][019][0-9][0-9]$/";
        return preg_match($patron_fecha,$fecha);
    }
    function validar_nif($nif){
        $patron_nif="/^\d{8}[A-Z]$/";
        return preg_match($patron_nif,$nif);
    }
    function validar_direccion($direccion){
        if (strlen($direccion)==0){
            return false;
        } else {
            return true;
        }
    }
    function validar_cpostal($cpostal){
        $patron_cpostal="/^[01234]\d{4}$/";
        return preg_match($patron_cpostal,$cpostal);
    }
    function validar_chip($chip){
        $patron_chip="/^\d{15}$/";
        return preg_match($patron_chip,$chip);
    }
?>