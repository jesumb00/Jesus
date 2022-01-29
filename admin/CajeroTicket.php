<?php
require_once "../_com/__RequireOnceComunes.php";
require_once "../sesiones/_Sesion.php";

salirSiSesionFalla();
$traza = new Traza(1, "CajeroTicket.php", "Se ha entrado a cajeroTicket ", 0, date("F j, Y, g:i a"));
// OJO ----> en el 4 campo del constructor debe ponerse el id del creado ( $categoria->getId() ) , demomento no pongo asi porq es una beta

DAO::registrarAccion($traza);
?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../_com/Estilos.css">
    <title>Cajero</title>
</head>
<body>
    <main id="mainCaj">
        <section id="ticket">
            <h1 id="h1-caj" >TIENDA</h1>
            <article id="añadir-ticket">
               <select id="productos">


                <!--ESTE CAMPO ESTA PENSADO PARA AÑADIR "N" NUMERO DE ITEMS AL TICKET-->

               <!-- <input style="font-size: 1em" type="text"  id="cantidadProducto" placeholder="cantidadProducto"><br>-->

                <input type="number" id="cantidad"  min="1" max="20" placeholder="Cantidad">
                <input type="button" id="boton" value="Añadir">
               </select>
            </article>
        </section>
            <article id="posibleTicket">
                <h2>Factura de la tienda</h2>
                <p> Nombre-----------------Cantidad----------------Precio unitario</p>
                <div id='impreso'>

                </div>
                <div id='precio'>
                    <h4>Total-----------------------------<input type="number" id="numero"  style="border: none" value="0"></input></h4>
                </div>
            </article>
        </select>
    </main>
    <footer>
        <input type="button" id="continuar" disabled='true' value="Continuar">
    </footer>
    <script src="CajeroTicket.js"></script>
</body>
</html>