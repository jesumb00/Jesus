<?php

require_once "../_com/__RequireOnceComunes.php";

$resultado = DAO::productoEliminarPorId($_REQUEST["id"]);

echo json_encode($resultado);