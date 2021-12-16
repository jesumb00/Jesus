<?php

require_once "../_com/__RequireOnceComunes.php";

$categoria = new Categoria($_REQUEST["id"], $_REQUEST["nombre"]);
$traza=new Traza(1,"ProductoActualizar" , "Se ha actualizado un producto ", 0 ,date("F j, Y, g:i a"));
// OJO ----> en el 4 campo del constructor debe ponerse el id del creado ( $categoria->getId() ) , demomento no pongo asi porq es una beta


DAO::registrarAccion($traza);

$categoria = DAO::categoriaActualizar($categoria);

echo json_encode($categoria);