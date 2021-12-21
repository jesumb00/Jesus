<?php

require_once "../_com/__RequireOnceComunes.php";

$resultado = DAO::productoObtenerFiltrados($_REQUEST["filtro"]);

echo json_encode($resultado);