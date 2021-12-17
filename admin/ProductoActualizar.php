<?php

require_once "../_com/__RequireOnceComunes.php";

salirSiSesionFalla();

$producto = new Producto($_REQUEST["id"], $_REQUEST["denominacion"], $_REQUEST["precioUnidad"], $_REQUEST["stock"]);

$producto = DAO::productoActualizar($producto);

$traza = new Traza(1, "ProductoActualizar" , "Se ha actualizado un producto ", $producto->getId() ,date("F j, Y, g:i a"));
// OJO ----> en el 4 campo del constructor debe ponerse el id del creado ( $categoria->getId() ) , demomento no pongo asi porq es una beta
// TODO Molaría que la traza hiciera un ->__toString() del Dato que recibe.

DAO::registrarAccion($traza);

echo json_encode($producto);