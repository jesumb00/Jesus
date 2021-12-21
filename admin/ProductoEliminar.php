<?php

require_once "../_com/__RequireOnceComunes.php";

salirSiSesionFalla();

$resultado = DAO::productoEliminarPorId($_REQUEST["id"]);

$traza=new Traza(1,"ProductoEliminar","Se ha eliminado un producto ", $_REQUEST["id"] ,date("F j, Y, g:i a"));
// OJO ----> en el 4 campo del constructor debe ponerse el id del creado ( $categoria->getId() ) , demomento no pongo asi porq es una beta
 

DAO::registrarAccion($traza);
echo json_encode($resultado);