<?php

require_once "../_com/__RequireOnceComunes.php";

//salirSiSesionFalla();

$resultado = DAO::productoObtenerTodos();

echo json_encode($resultado);