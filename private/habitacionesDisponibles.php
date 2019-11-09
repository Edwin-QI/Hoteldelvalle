<?php
    require '../Acceso/conexion.php';
    session_start();
    $nombre = $_SESSION['nombreuser'];
    $correo = $_SESSION['correouser'];

    if(!isset($correo)){
        header("location: ../login.html");
    }

    $tipoHabitacion = $_POST["habitacionTipo"];
?>

<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
        <title>Reservar habitación</title>
    </head>
    <body style="background-color:ivory;">

        <script src="../js/encabezado2.js"></script>

                <?php

                    $consulta1 = "SELECT habitacion.id_habitacion, tipohabitacion.precio, tipohabitacion.camas, tipohabitacion.piso, tipohabitacion.capacidad from habitacion 
                                    inner join tipohabitacion ON habitacion.tipoHabitacion_id_tipoHabitacion=tipohabitacion.id_tipoHabitacion
                                    where tipohabitacion.tipo_habitacion='$tipoHabitacion'";
                    $resultado1 = mysqli_query($conexion, $consulta1);
                    
                    while($fila1 = mysqli_fetch_row($resultado1)){
                        $idHabitacion = $fila1[0];
                        $precio = $fila1[1];
                        $camas = $fila1[2];
                        $piso = $fila1[3];
                        $capacidad = $fila1[4];
                        $imagen = $tipoHabitacion . ".jpg";
                        
                        
                        echo '
                            <div class ="container">
                                <div class="row">
                                    <div class="col-5">
                                        <img src="../img/' . $imagen . '" width="100%">
                                    </div>
                                    <div class="col-5">
                                        <h3 class="text-secondary">' . $tipoHabitacion . ' ' . $idHabitacion . '</h3>
                                        <p>Alojamiento Q' . $precio . '<br>
                                        Ocupantes Max ' . $capacidad . '</p>
                                        <p>Fechas indisponibles</p>
                        ';

                        $consulta2 = "SELECT id_reservacion, fechaIngreso, fechaSalida, habitacion_id_habitacion, cant_dias from reservacion where habitacion_id_habitacion=$idHabitacion";
                        $resultado2 = mysqli_query($conexion, $consulta2);

                        while($fila2=mysqli_fetch_row($resultado2)){
                            $idReservacion = $fila2[0]; 
                            $fechaIngreso = $fila2[1];
                            $fechaEgreso = $fila2[2]; 
                            $idHabitacionOcupada = $fila2[3]; 
                            $cantidadDias = $fila2[4]; 
                            echo $fechaIngreso . ' - ' . $fechaEgreso . '<br>';
                        }

                        echo '
                                        <br>Ingrese Fechas a Reservar
                                        <form method="POST" name="reservar" action="../Acceso/verificarDisponibilidad.php">
                                            <div class="form-group">
                                                <input type="date" class="form-control" id="fechaInicio" name="fechaInicio" aria-describedby="emailHelp" placeholder="dd/mm/aaaa">
                                                <small id="emailHelp" class="form-text text-muted">Ingrese fecha de Ingreso</small>
                                                <input type="date" class="form-control" id="fechaSalida" name="fechaSalida" aria-describedby="emailHelp" placeholder="dd/mm/aaaa">
                                                <small id="emailHelp" class="form-text text-muted">Ingrese fecha de Salida</small>
                                                <input type="hidden" name="idHabitacion" value=" ' . $idHabitacion . '">
                                                <input type="hidden" name="precioHabitacion" value=" ' . $precio . '">
                                                <input type="hidden" name="nombreUser" value=" ' . $nombre . '">
                                                <input type="hidden" name="cantCamas" value=" ' . $camas . '">
                                                <input type="hidden" name="piso" value=" ' . $piso . '">
                                                <input type="hidden" name="capacidad" value=" ' . $capacidad . '">
                                                <input type="hidden" name="tipo" value=" ' . $tipoHabitacion . '">
                                                <input type="hidden" name="imagen" value ' . $imagen . '">
                                                <button type="submit" class="btn btn-secondary">Reservar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <br><br><br><br><br>
                        ';
                    }
                ?>
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>