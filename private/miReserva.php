<?php
    session_start();
    $nombre = $_SESSION['nombreuser'];
    $correo = $_SESSION['correouser'];
    $idusuario = $_SESSION['idusuario'];
    if(!isset($correo)){
        header("location: ../login.html");
    }
?>


<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <title>Hello, world!</title>
    </head>
    <body style="background-color:ivory;">
        <script src="../js/encabezado2.js"></script>
        <br><br>
        <div class="container">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">id Reservación</th>
                    <th scope="col">Reservado</th>
                    <th scope="col">Ingreso</th>
                    <th scope="col">Salida</th>
                    <th scope="col">Habitación</th>
                    <th scope="col">Tipo de Habitación</th>
                </tr>
            </thead>
            <tbody>

                <?php

                    require '../Acceso/conexion.php';
                    $consulta = "SELECT reservacion.id_reservacion, reservacion.fechaCreacion, reservacion.fechaIngreso, reservacion.fechaSalida, habitacion.num_habitacion, tipohabitacion.tipo_habitacion from reservacion 
                                    inner join habitacion ON reservacion.habitacion_id_habitacion=habitacion.id_habitacion
                                    inner join tipohabitacion ON habitacion.tipoHabitacion_id_tipoHabitacion=tipohabitacion.id_tipoHabitacion
                                    where usuario_id_usuario=$idusuario";

                    $resultado = mysqli_query($conexion, $consulta);

                    $numerador = 1; 
                    while($fila=mysqli_fetch_row($resultado)){
                        echo '
                            <tr>
                                <th scope="row">' . $numerador . '</th>
                                <td>' . $fila[0] . '</td>
                                <td>' . $fila[1] . '</td>
                                <td>' . $fila[2] . '</td>
                                <td>' . $fila[3] . '</td>
                                <td>' . $fila[4] . '</td>
                                <td>' . $fila[5] . '</td>
                            </tr>
                        ';
                        
                        $numerador++; 
                    }



                ?>

   







        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>