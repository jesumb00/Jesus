<?php

require_once "../_com/__RequireOnceComunes.php";

$producto = new Producto($_REQUEST["id"], $_REQUEST["denominacion"], $_REQUEST["tipo"], $_REQUEST["precioUnidad"], $_REQUEST["stock"]);

$producto = DAO::productoActualizar($producto);

echo json_encode($producto);