<?php
    require 'conexion.php';
    session_start();

    $correo = $_POST["correo"];
    $passUser = $_POST["password"];
 
    $consulta = "SELECT nombre, correo, pass, id_usuario from usuario where correo='$correo' and pass='$passUser'";
    $resultado = mysqli_query($conexion, $consulta);
    $fila = mysqli_fetch_row($resultado);

    if(mysqli_num_rows($resultado)==0){
       
        header('Location: ../login.html');
    }else{
        $_SESSION['correouser'] = $correo;
        $_SESSION['nombreuser'] = $fila[0];
        $_SESSION['idusuario'] = $fila[3];
        header('Location: ../private/index.php');
    }
?>