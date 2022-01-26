<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Description" content="Enter your description here"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">

    <title>Gestion de compra online</title>
</head>
<body>


<?php

    $MiCarrito = $_SESSION['carrito'];
    $_SESSION['carrito'] = $MiCarrito;
// aquí calculamos el numero de productos que contiene nuestro carrito
if(isset($_SESSION['carrito'])){
    for($i=0; $i<=count($MiCarrito)-1; $i ++){
        if($MiCarrito[$i]!=NULL){
            $TotalProductos = $MiCarrito['cantidad'];
            $TotalProductos ++ ;
            $totalcantidad += $TotalProductos;
        }}}
?>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <h2 style="color: red;"> Tienda Online </h2>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="modal" data-bs-target="#modal_cart" style="color: red;"><i class="fas fa-shopping-cart"></i> <?php echo $totalcantidad; ?></a>
                </li>
            </ul>
        </div>
    </div>
</nav>




<!-- Div del carrito-->
<div class="modal fade" id="modal_cart" tabindex="-1"  aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">



                <div class="modal-body">
                    <div>
                        <div class="p-2">
                            <ul class="list-group mb-3">
                                <?php
                                if(isset($_SESSION['carrito'])){
                                    $total=0;
                                    for($i=0; $i<=count($MiCarrito)-1; $i ++){
                                        if($MiCarrito[$i]!=NULL){

                                            ?>
                                            <li class="list-group-item d-flex justify-content-between lh-condensed">
                                                <div class="row col-12" >
                                                    <div class="col-6 p-0" style="text-align: left; color: #000000;"><h6 class="my-0">Cantidad: <?php echo $MiCarrito[$i]['cantidad'] ?> : <?php echo $MiCarrito[$i]['titulo']; // echo substr($MiCarrito[$i]['titulo'],0,10); echo utf8_decode($titulomostrado)."..."; ?></h6>
                                                    </div>
                                                    <div class="col-6 p-0"  style="text-align: right; color: #000000;" >
                                                        <span   style="text-align: right; color: #000000;"><?php echo $MiCarrito[$i]['precio'] * $MiCarrito[$i]['cantidad'];    ?> €</span>
                                                    </div>
                                                </div>
                                            </li>
                                            <?php
                                            $total=$total + ($MiCarrito[$i]['precio'] * $MiCarrito[$i]['cantidad']);
                                        }
                                    }
                                }
                                ?>
                                <li class="list-group-item d-flex justify-content-between">
                                    <span  style="text-align: left; color: #000000;">Total (EUR)</span>
                                    <strong  style="text-align: left; color: #000000;"><?php
                                        if(isset($_SESSION['carrito'])){
                                            $total=0;
                                            for($i=0; $i<=count($MiCarrito)-1; $i ++){
                                                if($MiCarrito[$i]!=NULL){
                                                    $total=$total + ($MiCarrito[$i]['precio'] * $MiCarrito[$i]['cantidad']);
                                                }}}
                                        echo $total; ?> €</strong>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>



            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <a type="button" class="btn btn-primary" href="CarritoBorrar.php">Vaciar carrito</a>
            </div>
        </div>
    </div>
</div>






<!-- Productos -->
<div class="container mt-5">
    <div class="row" style="justify-content: center;">

        <div class="card m-4" style="width: 18rem;">
            <form id="formulario" name="formulario" method="post" action="CarritoAnadir.php">
                <input name="precio" type="hidden" id="precio" value="10" />
                <input name="titulo" type="hidden" id="titulo" value="articulo 1" />
                <input name="cantidad" type="hidden" id="cantidad" value="1" class="pl-2" />
                <img src="../_img/carrito.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Producto 1</h5>
                    <p class="card-text">Descripción - Precio 10€</p>
                    <button class="btn btn-primary" type="submit" ><i class="fas fa-shopping-cart"></i> Añadir al carrito</button>
                </div>
            </form>
        </div>



        <div class="card m-4" style="width: 18rem;">
            <form id="formulario" name="formulario" method="post" action="CarritoAnadir.php">
                <input name="precio" type="hidden" id="precio" value="20" />
                <input name="titulo" type="hidden" id="titulo" value="articulo 2" />
                <input name="cantidad" type="hidden" id="cantidad" value="1" class="pl-2" />
                <img src="../_img/carrito.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Producto 2</h5>
                    <p class="card-text">Descripción - Precio 20€</p>
                    <button class="btn btn-primary" type="submit" ><i class="fas fa-shopping-cart"></i> Añadir al carrito</button>
                </div>
            </form>
        </div>


        <div class="card m-4" style="width: 18rem;">
            <form id="formulario" name="formulario" method="post" action="CarritoAnadir.php">
                <input name="precio" type="hidden" id="precio" value="30" />
                <input name="titulo" type="hidden" id="titulo" value="articulo 3" />
                <input name="cantidad" type="hidden" id="cantidad" value="1" class="pl-2" />
                <img src="../_img/carrito.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Producto 3</h5>
                    <p class="card-text">Descripción - Precio 30€</p>
                    <button class="btn btn-primary" type="submit" ><i class="fas fa-shopping-cart"></i> Añadir al carrito</button>
                </div>
            </form>
        </div>

        <div class="card m-4" style="width: 18rem;">
            <form id="formulario" name="formulario" method="post" action="CarritoAnadir.php">
                <input name="precio" type="hidden" id="precio" value="20" />
                <input name="titulo" type="hidden" id="titulo" value="articulo 4" />
                <input name="cantidad" type="hidden" id="cantidad" value="1" class="pl-2" />
                <img src="../_img/carrito.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Producto 4</h5>
                    <p class="card-text">Descripción - Precio 30€</p>
                    <button class="btn btn-primary" type="submit" ><i class="fas fa-shopping-cart"></i> Añadir al carrito</button>
                </div>
            </form>
        </div>

        <div class="card m-4" style="width: 18rem;">
            <form id="formulario" name="formulario" method="post" action="CarritoAnadir.php">
                <input name="precio" type="hidden" id="precio" value="20" />
                <input name="titulo" type="hidden" id="titulo" value="articulo 5" />
                <input name="cantidad" type="hidden" id="cantidad" value="1" class="pl-2" />
                <img src="../_img/carrito.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Producto 5</h5>
                    <p class="card-text">Descripción - Precio 5€</p>
                    <button class="btn btn-primary" type="submit" ><i class="fas fa-shopping-cart"></i> Añadir al carrito</button>
                </div>
            </form>
        </div>

        <div class="card m-4" style="width: 18rem;">
            <form id="formulario" name="formulario" method="post" action="CarritoAnadir.php">
                <input name="precio" type="hidden" id="precio" value="20" />
                <input name="titulo" type="hidden" id="titulo" value="articulo 6" />
                <input name="cantidad" type="hidden" id="cantidad" value="1" class="pl-2" />
                <img src="../_img/carrito.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Producto 6</h5>
                    <p class="card-text">Descripción - Precio 5€</p>
                    <button class="btn btn-primary" type="submit" ><i class="fas fa-shopping-cart"></i> Añadir al carrito</button>
                </div>
            </form>
        </div>


    </div>
</div>



<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/js/bootstrap.min.js"></script>
</body>
</html>