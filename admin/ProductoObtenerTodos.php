<?php

require_once "_com/DAO.php";

//salirSiSesionFalla();

$resultado = DAO::productoObtenerTodos();
$traza=new Traza(1,"ProductoCrear","Se ha creado un producto ", 0 , date("F j, Y, g:i a"));
// OJO ----> en el 4 campo del constructor debe ponerse el id del creado ( $categoria->getId() ) , demomento no pongo asi porq es una beta

DAO::registrarAccion($traza);

echo json_encode($resultado);