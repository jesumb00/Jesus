<?php

require_once "../_com/__RequireOnceComunes.php";

$resultado = DAO::usuarioObtenerTodos();
$traza= new Traza(2, "usuarioObtenerTodos", "Se ha obtenido todos los usuarios", 0, date("F j, Y, g:i a"));

DAO::registrarAccion($traza);

echo json_encode($resultado);