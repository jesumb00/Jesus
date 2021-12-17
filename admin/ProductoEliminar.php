<?php

require_once "../_com/__RequireOnceComunes.php";

salirSiSesionFalla();

$resultado = DAO::productoEliminarPorId($_REQUEST["id"]);

$traza=new Traza(1,"ProductoEliminar","Se ha eliminado un producto ", 0 ,date("F j, Y, g:i a"));
// OJO ----> en el 4 campo del constructor debe ponerse el id del creado ( $categoria->getId() ) , demomento no pongo asi porq es una beta
// Creo que la forma mas efectiva es : 1. obtener el id del producto en una variable  , 2. Eliminar el producto , 3. crear la traza con el id guardado de antes y seguidamente registrarlo
// ya que de este modo nos aseguramos que está borrado el producto y no creamos la traza antes del borrado. 

DAO::registrarAccion($traza);
echo json_encode($resultado);