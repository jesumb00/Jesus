<?php
require_once "../_com/__RequireOnceComunes.php";



$resultado = DAO::usuarioEliminarPorId($_REQUEST["id"]);

$traza=new Traza(1,"usuarioEliminar","Se ha eliminado un usuario ", $_REQUEST["id"] ,date("F j, Y, g:i a"));

DAO::registrarAccion($traza);

echo json_encode($resultado);
