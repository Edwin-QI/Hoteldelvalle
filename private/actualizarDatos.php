<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <title>Crear Usuario</title>
    </head>
    <body style="background-color:ivory;">

        <nav class="navbar navbar-expand-lg navbar-light bg-ivory">
            <a class="navbar-brand" href="#">
                <img src="../img/logo.jpg" width="110" height="70" class="d-inline-block align-top" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-item nav-link" href="index.php">REGRESAR</a>
                </div>
            </div>
        </nav>

<?php
    session_start();
    require '../Acceso/conexion.php';
    $idUsuario = $_SESSION['idusuario'];

    $consulta = "SELECT nombre, apellido, correo, pass, fechaNacimiento, telefono, direccion from usuario where id_usuario=$idUsuario";

    $resultado = mysqli_query($conexion, $consulta);

    $fila = mysqli_fetch_row($resultado);

    if($resultado==false){
        echo "<script>alert('Error en la consulta');</script>";
    }else{
        echo '
        <div class="container">
        <div class="col-12 text-secondary">
            <center><H1>Actualizar Cuenta</H1></center>
        </div>
        <br><br>
        <div class="row justify-content-center">
        <form method="GET" action="../Acceso/ActualizarUsuario.php" name="nuevoUsuario">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" value="'.$fila[0].'">
                </div>
                <div class="form-group col-md-6">
                    <label for="apellido">Apellido</label>
                    <input type="text" class="form-control" id="apellido" name="apellido" value="'.$fila[1].'">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="correo">Correo</label>
                    <input type="email" class="form-control" id="correo" name="correo" value="'.$fila[2].'">
                </div>
                <div class="form-group col-md-6">
                    <label for="password">Contraseña</label>
                    <input type="password" class="form-control" id="password" name="password" value="'.$fila[3].'">
                </div>
            </div>
            <div class="form-group">
                <label for="fechanac">Fecha de Nacimiento</label>
                <input type="date" class="form-control" id="fechanac" name="fechanac" value="'.$fila[4].'">
            </div>
            <div class="form-group">
                <label for="direccion">Dirección</label>
                <input type="text" class="form-control" id="direccion" name="direccion" value="'.$fila[6].'">
            </div>
            <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="telefono">Telefono</label>
                        <input type="text" class="form-control" id="telefono" name="telefono" value="'.$fila[5].'">
                    </div>
                </div>
            <button type="submit" class="btn btn-secondary">Ingresar</button>
        </form>
    </div>
    </div>
        ';
    }       
    mysqli_close($conexion);
?>


        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>