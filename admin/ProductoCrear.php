<?php

require_once "../_com/__RequireOnceComunes.php";

$producto = DAO::productoCrear($_REQUEST["nombre"], $_REQUEST["precio"], $_REQUEST["stock"]);

echo json_encode($producto);