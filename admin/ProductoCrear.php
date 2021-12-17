<?php

require_once "../_com/__RequireOnceComunes.php";



salirSiSesionFalla();



$producto = DAO::productoCrear($_REQUEST["denominacion"], $_REQUEST["precioUnidad"], $_REQUEST["stock"]);

echo json_encode($producto);



$traza=new Traza(1,"ProductoCrear","Se ha creado un producto ", 0 , date("F j, Y, g:i a"));
// OJO ----> en el 4 campo del constructor debe ponerse el id del creado ( $categoria->getId() ) , demomento no pongo asi porq es una beta
// TODO Como el otro

DAO::registrarAccion($traza);