<?php

require_once "../_com/__RequireOnceComunes.php";

salirSiSesionFalla();

$producto = DAO::productoCrear($_REQUEST["denominacion"], $_REQUEST["precioUnidad"], $_REQUEST["stock"]);

echo json_encode($producto);