
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">

    <title>Gestion de Carrito</title>
</head>
<body>



<!-- el navBar de la pagina-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <h2 style="color: red;"> Tienda Online </h2>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="modal" data-bs-target="#modal_cart" style="color: red;"><i class="fas fa-shopping-cart"></i></a>
                </li>
            </ul>
        </div>
    </div>
</nav>




<!-- Productos del carrito -->
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

                                <li class="list-group-item d-flex justify-content-between lh-condensed">
                                    <div class="row col-12" >
                                        <div class="col-6 p-0" style="text-align: left; color: #000000;"><h6 class="my-0">Cantidad: </h6>
                                        </div>
                                        <div class="col-6 p-0"  style="text-align: right; color: #000000;" >
                                            <span   style="text-align: right; color: #000000;">€</span>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item d-flex justify-content-between">
                                    <span  style="text-align: left; color: #000000;">Total (EUR)</span>
                                    <strong  style="text-align: left; color: #000000;"> €</strong>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

<!-- -->

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <a type="button" class="btn btn-primary" href="CarritoBorrar.php">Vaciar carrito</a>
            </div>
        </div>
    </div>
</div>






<!-- Aquí están los div de los productos-->
<div class="container mt-5">
    <div class="row" style="justify-content: center;">

        <div class="card m-4" style="width: 18rem;">
            <form id="formulario" name="formulario" method="post" action="CarritoAñadir.php">
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
            <form id="formulario" name="formulario" method="post" action="CarritoAñadir.php">
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
            <form id="formulario" name="formulario" method="post" action="CarritoAñadir.php">
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
            <form id="formulario" name="formulario" method="post" action="CarritoAñadir.php">
                <input name="precio" type="hidden" id="precio" value="30" />
                <input name="titulo" type="hidden" id="titulo" value="articulo 4" />
                <input name="cantidad" type="hidden" id="cantidad" value="1" class="pl-2" />
                <img src="../_img/carrito.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Producto 4</h5>
                    <p class="card-text">Descripción - Precio 50€</p>
                    <button class="btn btn-primary" type="submit" ><i class="fas fa-shopping-cart"></i> Añadir al carrito</button>
                </div>
            </form>
        </div>

        <div class="card m-4" style="width: 18rem;">
            <form id="formulario" name="formulario" method="post" action="CarritoAñadir.php">
                <input name="precio" type="hidden" id="precio" value="30" />
                <input name="titulo" type="hidden" id="titulo" value="articulo 4" />
                <input name="cantidad" type="hidden" id="cantidad" value="1" class="pl-2" />
                <img src="../_img/carrito.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Producto 4</h5>
                    <p class="card-text">Descripción - Precio 50€</p>
                    <button class="btn btn-primary" type="submit" ><i class="fas fa-shopping-cart"></i> Añadir al carrito</button>
                </div>
            </form>
        </div>
        <div class="card m-4" style="width: 18rem;">
            <form id="formulario" name="formulario" method="post" action="CarritoAñadir.php">
                <input name="precio" type="hidden" id="precio" value="30" />
                <input name="titulo" type="hidden" id="titulo" value="articulo 4" />
                <input name="cantidad" type="hidden" id="cantidad" value="1" class="pl-2" />
                <img src="../_img/carrito.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Producto 4</h5>
                    <p class="card-text">Descripción - Precio 50€</p>
                    <button class="btn btn-primary" type="submit" ><i class="fas fa-shopping-cart"></i> Añadir al carrito</button>
                </div>
            </form>
        </div>




    </div>
</div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/js/bootstrap.min.js"></script>
</html>