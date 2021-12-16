<?php

require_once "../_com/__RequireOnceComunes.php";

$resultado = DAO::productoObtenerTodos();
$traza=new Traza(1,"obtenerTodosProductos","Se ha obtenido todos los productos",0,date("F j, Y, g:i a"));
DAO::registrarAccion($traza);

echo ("_________________________");
echo json_encode($resultado);