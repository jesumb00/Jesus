<?php

require_once "../_com/__RequireOnceComunes.php";

salirSiSesionFalla();

$resultado = DAO::productoEliminarPorId($_REQUEST["id"]);

echo json_encode($resultado);