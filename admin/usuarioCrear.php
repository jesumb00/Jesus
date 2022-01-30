<?php

require_once "../_com/__RequireOnceComunes.php";

$usuario = DAO::usuarioCrear($_REQUEST["nombre"], $_REQUEST["apellidos"], $_REQUEST["identificador"], $_REQUEST["contrasenna"]);

$traza=new Traza(1,"usuarioCrear","Se ha creado un usuario ", $_REQUEST["id"] ,date("F j, Y, g:i a"));

DAO::registrarAccion($traza);

echo json_encode($usuario);
