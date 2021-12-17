<?php

require_once "../_com/__RequireOnceComunes.php";

$producto = DAO::productoCrear($_REQUEST["denominacion"], $_REQUEST["tipo"], $_REQUEST["precio"], $_REQUEST["stock"]);

echo json_encode($producto);