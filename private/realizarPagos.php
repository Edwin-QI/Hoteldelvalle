<?php
    require '../Acceso/conexion.php';
    session_start();
    $nombre = $_SESSION['nombreuser'];
    $correo = $_SESSION['correouser'];
    $idusuario = $_SESSION['idusuario'];

    if(!isset($correo)){
        header("location: ../login.html");
    }


    $numero = $_POST['numero'];
    $fecha = $_POST['fecha'];
    $codigo = $_POST['codigo'];
    $direccion = $_POST['direccion'];
    $pais = $_POST['pais'];
    $monto = $_POST['monto'];
    $nit = $_POST['nit'];
    $fechaInicio = $_POST['fechaInicio'];
    $fechaSalida = $_POST['fechaSalida'];
    $dias = $_POST['dias'];
    $idHabitacion = $_POST['idHabitacion'];
    echo $numero;
    echo $fecha;
    echo $codigo;
    echo $direccion;
    echo $pais;
    echo $monto;
    $consulta = "INSERT INTO pago(num_tarjeta, fecha_tarjeta, cod_tarjeta, monto, recargos, tipoPago_id_tipo_pago) values ('$numero', '$fecha', $codigo, $monto, 0, 1)";
    $resultado = mysqli_query($conexion, $consulta);

    $consulta = "SELECT id_detalles_pago from pago where num_tarjeta=$numero";
    $resultado = mysqli_query($conexion, $consulta);

    $fila = mysqli_fetch_row($resultado);

    $consulta = "INSERT INTO factura(nombre, fecha, direccion, nit, total, estado, pago_id_detalles_pago) values ('$nombre', now(), '$direccion', '$nit', $monto, 'pendiente', $fila[0])";
    $resultado = mysqli_query($conexion, $consulta);

    $consulta = "SELECT id_encabezado from factura where pago_id_detalles_pago=$fila[0]";
    $resultado = mysqli_query($conexion, $consulta);

    $fila = mysqli_fetch_row($resultado);

    $consulta = "INSERT INTO reservacion(fechaCreacion, fechaIngreso, fechaSalida, cant_dias, habitacion_id_habitacion, usuario_id_usuario, tipoReservacion_id_tipoReservacion, factura_id_encabezado) values (now(), '$fechaInicio', '$fechaSalida', $dias, $idHabitacion, $idusuario, 1, $fila[0])";
    $resultado = mysqli_query($conexion, $consulta);

    $consulta = "INSERT INTO detallesfactura(servicio, costo, factura_id_encabezado) values ('habitacion', $monto, $fila[0])";
    $resultado = mysqli_query($conexion, $consulta);

    header("location: miReserva.php");
    
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

   


        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>