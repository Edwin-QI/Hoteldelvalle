<?php
    session_start();
    $nombre = $_SESSION['nombreuser'];
    $correo = $_SESSION['correouser'];

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
        <title>Habitaciones</title>
    </head>
    <body style="background-color:ivory;">
        <script src="../js/encabezado2.js"></script>
        <br><br>
        <center><h1 class="text-secondary">Habitaciones</h1></center><br><br>
        <!--habitacion 1-->
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <img src="../img/juniorSuite.jpg" width="100%">
                </div>
                <div class="col-6">
                    <h2 class="text-secondary">JUNIOR SUITE</h2>
                    <p class="text-secondary"></p>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-outline-secondary" data-toggle="modal" data-target="#habitacion1">
                        Detalles
                    </button>
                    <p class="text-secondary"></p>
                    <form method="post" name="reservar" action="crearReservacion.php">
                        <button type="submit" class="btn btn-outline-secondary">Reservar</button>
                    </form>
                </div>
            </div>
        </div>
        

        <!-- Modal -->
        <div class="modal fade" id="habitacion1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">JUNIOR SUITE</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row justify-content-center">
                            <div class="col text-justify">
                                <center><img src="../img/logo.jpg"><br></center><br>
                                Para disfrutar del máximo confort con una excelente relación calidad precio, nada mejor que optar por una de las Junior Suite 
                                del Hotel GHL LATAM Plaza Pradera Quetzaltenango durante los viajes de negocio o las vacaciones en pareja. Son espacios modernos 
                                de estilo contemporáneo (32 m2), llenos de luz natural divididos en dormitorio, baño y zona de estar. 
                                <BR><BR>
                                El equipamiento es el propio de una Junior Suite en Quetzaltenango de 5 estrellas: cama King Size, área especial de 
                                trabajo, TV LED 42”, cafetera, radio despertador, secadora de cabello, plancha y wifi de cortesía.
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-12">
                                <center><h4>Servicios</h4></center>
                            </div>
                            <div class="col-12">
                                <img src="../img/ahireAcondicionado.jpg">
                                <img src="../img/telefono.jpg">
                                <img src="../img/cajaFuerte.jpg">
                                <img src="../img/detectorHumo.jpg">
                                <img src="../img/ducha.jpg">
                                <img src="../img/luzNatural.jpg">
                                <img src="../img/plancha.jpg">
                                <img src="../img/secadora.jpg">
                                <img src="../img/setBaño.jpg">
                                <img src="../img/wifi.jpg">
                                <img src="../img/television.jpg">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>

        <BR>

        <!--habitacion 2-->
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <img src="../img/deluxeTwin.jpg" width="100%">
                </div>
                <div class="col-6">
                    <h2 class="text-secondary">DELUXE TWIN</h2>
                    <p class="text-secondary"></p>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-outline-secondary" data-toggle="modal" data-target="#habitacion2">
                        Detalles
                    </button>
                    <p class="text-secondary"></p>
                    <form method="post" name="reservar" action="crearReservacion.php">
                        <input type="hidden" name="tipohabitacion" value="deluxe twin">
                        <button type="submit" class="btn btn-outline-secondary">Reservar</button>
                    </form>
                </div>
            </div>
        </div>
                        
    
        <!-- Modal -->
        <div class="modal fade" id="habitacion2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">DELUXE TWIN</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        
                    
                    </div>
                    <div class="modal-body">
                        <div class="row justify-content-center">
                            <div class="col text-justify">
                                <center><img src="../img/logo.jpg"><br></center><br>
                                Ideales para familias o para compartir, las habitaciones Deluxe Twin del Hotel GHL LATAM Plaza Pradera 
                                Quetzaltenango reúnen todo el confort de una habitación de lujo con la funcionalidad de un espacio moderno 
                                y de estilo contemporáneo. Todas están equipadas con dos camas Queen Size, un baño completo, área especial 
                                de trabajo para los viajeros business, TV LED de 42”, cafetera, wifi de cortesía, secadora de cabello, kit 
                                de planchado… Y todo lo necesario para alojar hasta 3 adultos o 2 adultos y 2 niños. También se pueden elegir 
                                comunicadas con una sencilla.
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-12">
                                <center><h4>Servicios</h4></center>
                            </div>
                            <div class="col-12">
                                <img src="../img/ahireAcondicionado.jpg">
                                <img src="../img/telefono.jpg">
                                <img src="../img/cajaFuerte.jpg">
                                <img src="../img/detectorHumo.jpg">
                                <img src="../img/ducha.jpg">
                                <img src="../img/luzNatural.jpg">
                                <img src="../img/plancha.jpg">
                                <img src="../img/secadora.jpg">
                                <img src="../img/setBaño.jpg">
                                <img src="../img/wifi.jpg">
                                <img src="../img/television.jpg">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>

        <br>
        
        <!--habitacion 3-->
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <img src="../img/deluxeKing.jpg" width="100%">
                </div>
                <div class="col-6">
                    <h2 class="text-secondary">DELUXE KING</h2>
                    <p class="text-secondary"></p>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-outline-secondary" data-toggle="modal" data-target="#habitacion3">
                        Detalles
                    </button>
                    <p class="text-secondary"></p>
                    <form method="post" name="reservar" action="crearReservacion.php">
                        <button type="submit" class="btn btn-outline-secondary">Reservar</button>
                    </form> 
                </div>
            </div>
        </div>
                
        <!-- Modal -->
        <div class="modal fade" id="habitacion3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Detalles</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <p class="text-secondary"></p>
                    </div>
                    <div class="modal-body">
                        <div class="row justify-content-center">
                            <div class="col text-justify">
                                <center><img src="../img/logo.jpg"><br></center><br>
                                Disfrute de su espacio, de su intimidad y de la más absoluta tranquilidad reservando una de las habitaciones 
                                Deluxe King del Hotel GHL LATAM Plaza Pradera Quetzaltenango: son habitaciones de 25 m2 divididos en un gran 
                                dormitorio con baño y zona de trabajo. Siempre con un estilo moderno, urbano y contemporáneo, estas habitaciones 
                                sencillas combinan la mejor calidad precio en alojamiento para 1 ó 2 personas en Quetzaltenango con cómodos 
                                servicios: cama King Size, sofá, TV LED de 42”, cafetera, wifi gratuita, secadora de cabello y posibilidad de 
                                comunicar con una doble.
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-12">
                                <center><h4>Servicios</h4></center>
                            </div>
                            <div class="col-12">
                                <img src="../img/ahireAcondicionado.jpg">
                                <img src="../img/telefono.jpg">
                                <img src="../img/cajaFuerte.jpg">
                                <img src="../img/detectorHumo.jpg">
                                <img src="../img/ducha.jpg">
                                <img src="../img/luzNatural.jpg">
                                <img src="../img/plancha.jpg">
                                <img src="../img/secadora.jpg">
                                <img src="../img/despertador.jpg">
                                <img src="../img/setBaño.jpg">
                                <img src="../img/wifi.jpg">
                                <img src="../img/television.jpg">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>