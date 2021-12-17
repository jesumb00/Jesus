<?php

require_once "../_com/__RequireOnceComunes.php";

$producto = DAO::productoCrear($_REQUEST["denominacion"], $_REQUEST["tipo"], $_REQUEST["precioUnidad"], $_REQUEST["stock"]);

echo json_encode($producto);