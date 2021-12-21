<?php

require_once "../_com/__RequireOnceComunes.php";

$resultado = DAO::productoObtenerFiltrados($_REQUEST["filtro"]);
$traza=new Traza(1,"ProductoObtenerFiltrado","Se ha filtrado ", 0 , date("F j, Y, g:i a"));
// OJO ----> en el 4 campo del constructor debe ponerse el id del creado ( $categoria->getId() ) , demomento no pongo asi porq es una beta

DAO::registrarAccion($traza);

echo json_encode($resultado);