<?php

require_once "../_com/__RequireOnceComunes.php";

$resultado = DAO::productoObtenerTodos();

echo json_encode($resultado);