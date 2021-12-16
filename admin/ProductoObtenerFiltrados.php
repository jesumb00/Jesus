<?php

require_once "../_com/__RequireOnceComunes.php";

$resultado = DAO::productoObteneFiltrados($_REQUEST["filtro"]);

echo json_encode($resultado);