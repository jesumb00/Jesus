<?php

require_once "../_com/__RequireOnceComunes.php";

$categoria = new Categoria($_REQUEST["id"], $_REQUEST["nombre"]);

$categoria = DAO::categoriaActualizar($categoria);

echo json_encode($categoria);