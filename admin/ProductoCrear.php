<?php

require_once "../_com/__RequireOnceComunes.php";

$categoria = DAO::categoriaCrear($_REQUEST["nombre"]);

echo json_encode($categoria);