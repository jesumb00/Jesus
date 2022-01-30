<?php

require_once "../com/_RequireOnceComunes.php";


$usuarioAnt = DAO::usuarioObtenerPorId($_REQUEST['id']);

$usuarioAct = new Usuario($_REQUEST['id'], $_REQUEST['identificador'], $usuarioAnt->getContrasenna(), $usuarioAnt->getCodigoCookie(), $usuarioAnt->getCaducidadCodigoCookie(), $_REQUEST['tipo'], $_REQUEST['nombre'], $_REQUEST['apellidos']);
$usuario= DAO::usuarioActualizar($usuarioAct);



echo json_encode($usuario);