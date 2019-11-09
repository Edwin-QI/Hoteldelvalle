<?php

    $host="127.0.0.1";
    $user="root";
    $password="";
    $dbname="as_hotel";

    $conexion=mysqli_connect($host,$user,$password);
    
    if(mysqli_connect_errno()){
        echo "Fallo en la conexion ";
        exit();
    }else{
        //echo "conectado correctamente";
    }
    
    mysqli_select_db($conexion, $dbname) or die ("No se encontro la BBDD");
    mysqli_set_charset($conexion, "utf8");

?>