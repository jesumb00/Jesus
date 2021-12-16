<?php

require_once "_com/DAO.php";

$resultado = DAO::productoObtenerTodos();

echo json_encode($resultado);