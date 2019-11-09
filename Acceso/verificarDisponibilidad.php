<?php
    require 'conexion.php';
    session_start();

    
    $fechaInicio = $_POST['fechaInicio'];
    $fechaSalida = $_POST['fechaSalida'];
    $idHabitacion = $_POST['idHabitacion'];
    $precioHabitacion = $_POST['precioHabitacion'];
    $nombreUser = $_POST['nombreUser'];
    $cantCamas = $_POST['cantCamas'];
    $piso = $_POST['piso'];
    $capacidad = $_POST['capacidad'];
    $tipo = $_POST['tipo'];

    $imagen = $_POST['imagen'];

    $EstadoVerificacion = false;

    $consulta = "SELECT fechaIngreso, fechaSalida, cant_dias from reservacion where habitacion_id_habitacion=$idHabitacion";
    $resultado = mysqli_query($conexion, $consulta);

    if(mysqli_num_rows($resultado)==0){
        if($fechaInicio>$fechaSalida){
            echo "<script>alert('Intervalo de fechas incorrecto');</script>";
        }else{
            $hoy = date("Y-m-d");
            echo "fecha actual: " . $hoy . "<br>";
            if($fechaInicio<$hoy){
                echo "<script>alert('La Fecha de inicio seleccionada es una fecha pasada');</script>";
            }else{
                $EstadoVerificacion = true; 
            }
        }
    }else{

        while($fila=mysqli_fetch_row($resultado)){
        
            if($fechaInicio>$fechaSalida){
                echo "<script>alert('Intervalo de fechas incorrecto');</script>";
            }else{
                $hoy = date("Y-m-d");
                echo "fecha actual: " . $hoy . "<br>";
                if($fechaInicio<$hoy){
                    echo "<script>alert('La Fecha de inicio seleccionada es una fecha pasada');</script>";
                }else{

                    if($fechaInicio>=$fila[0] && $fechaInicio<=$fila[1]){
                        echo "<script>alert('La Fecha de inicio no se encuentra disponible');</script>";
                    }else{
                        if($fechaSalida>=$fila[0] && $fechaSalida<=$fila[1]){
                            echo "<script>alert('La fecha de salida no se encuentra disponible');</script>";
                        }else{
                            if($fila[0]>=$fechaInicio && $fila[0]<=$fechaSalida){
                                echo "<script>alert('Dentro del rango de fechas, se encuentran fechas indisponibles');</script>";
                            }else{
                                $EstadoVerificacion = true; 
                            }
                        }
                    }
                }
            }  
        }
    }

    if(!$EstadoVerificacion){
        header("location: ../private/crearReservacion.php");
    }



        $diaIngreso = substr($fechaInicio,8,2);
        $diaSalida = substr($fechaSalida,8,2);
        $mesIngreso = substr($fechaInicio, 5,2);
        $mesEgreso = substr($fechaSalida, 5,2);
        $dias = 0;
        if($mesIngreso!=$mesEgreso){
        if($mesIngreso==10){
            $dias = (31-($diaIngreso-1)) + $diasSalida;
        }
        if($mesIngreso==11){
            $dias = (30-($diaIngreso-1)) + $diaSalida;
        }
        if($mesIngreso==12){
            $dias = (30-($diaIngreso-1)) + $diaSalida;
        }
    }else{
        $dias = $diaSalida - ($diaIngreso-1);
    }

    $totalPago = $precioHabitacion * $dias;

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

        <div class="container">
            <div class="row justify-content-left">
                <div class="col-5 text-right">
                    <h4 class="text-secondary">DETALLES DE RESERVACIÓN</h4>
                </div>
                <div class="col-5 text-left">
                    Numero de Habitación: <?php echo $idHabitacion; ?> <br>
                    Tipo de habitación: <?php echo $tipo; ?> <br>
                    Precio Noche: Q<?php echo $precioHabitacion; ?> <br>
                    Camas: <?php echo $cantCamas; ?> <br>
                    Piso: <?php echo $piso; ?> <br>
                    Capacidad: <?php echo $capacidad; ?> <br>
                    Fecha Ingreso: <?php echo $fechaInicio; ?> <br>
                    Fecha Salida: <?php echo $fechaSalida; ?> <br>
                    Estancia: <?php echo $dias; ?> <br>
                    Total a pagar: Q<?php echo $totalPago; ?> <br>
                </div>
            </div>
        </div>

        <br><br><br>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-4 text-right">
                    <h4 class="text-secondary">
                        DETALLES DE PAGO
                    </h4>
                </div>
            <div class="col-6">
        <div class="container">
                <form method="POST" action="../private/realizarPagos.php">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="Numero">Numero de Tarjeta</label>
                            <input type="text" class="form-control" id="Numero" name="numero" placeholder="0000 0000 0000 0000">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="fecha">Fecha</label>
                            <input type="text" class="form-control" id="fecha" name="fecha" placeholder="00/00">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-2">
                            <label for="inputZip">Codigo</label>
                            <input type="text" class="form-control" id="codigo" name="codigo">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="direccion">Direccion</label>
                        <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Zona 1">
                    </div>    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="direccion">País</label>
                            <input type="text" class="form-control" id="pais" name="pais" placeholder="Guatemala">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="inputZip">Zip</label>
                            <input type="text" class="form-control" id="inputZip">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="inputZip">NIT</label>
                            <input type="text" class="form-control" id="inputZip" name="nit">
                        </div>
                    </div>
                    <input type="hidden" name="monto" value="<?php echo $totalPago ?>">
                    <input type="hidden" name="fechaInicio" value="<?php echo $fechaInicio ?>">
                    <input type="hidden" name="fechaSalida" value="<?php echo $fechaSalida ?>">
                    <input type="hidden" name="dias" value="<?php echo $dias ?>">
                    <input type="hidden" name="idHabitacion" value="<?php echo $idHabitacion ?>">
                    <button type="submit" class="btn btn-secondary">Pagar</button>
                </form>
            </div>
        </div>
        
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>

