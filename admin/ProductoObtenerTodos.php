<?php

require_once "../_com/__RequireOnceComunes.php";

$resultado = DAO::productoObtenerTodos();
echo (date("F j, Y, g:i a"));
echo ("_________________________");
echo json_encode($resultado);