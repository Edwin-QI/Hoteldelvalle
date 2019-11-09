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
        <?php

            require 'conexion.php';

            $nombre = $_GET["nombre"];
            $apellido = $_GET["apellido"];
            $correo = $_GET["correo"];            
            $password = $_GET["password"];   
            $fechanac = date('y-m-d', strtotime($_GET['fechanac'])); 
            $direccion = $_GET["direccion"];  
            $telefono = $_GET["telefono"];  
                
            $consulta = "INSERT INTO USUARIO(nombre, apellido, correo, pass, fechaNacimiento, telefono, direccion, TipoUsuario_id_tipoUsuario) VALUES ('$nombre', '$apellido', '$correo', '$password', '$fechanac', '$telefono', '$direccion', 2)";
            $resultado = mysqli_query($conexion, $consulta);

            if($resultado==false){
                echo "<script>alert('Error en la consulta');</script>";
            }else{
                echo '
                <script>alert("Felicidades, ya eres parte de la Familia del Valle");</script>
                <nav class="navbar navbar-expand-lg navbar-light bg-ivory">
                <a class="navbar-brand" href="#">
                    <img src="../img/logo.jpg" width="110" height="70" class="d-inline-block align-top" alt="">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-item nav-link" href="../index.html">REGRESAR</a>
                    </div>
                </div>
            </nav>
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