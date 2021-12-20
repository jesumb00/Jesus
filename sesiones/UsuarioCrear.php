<?php

require_once "../_com/__RequireOnceComunes.php";

//salirSiSesionFalla();


        $usuario = DAO::usuarioCrear($_REQUEST["inpNombreUsuario"], $_REQUEST["inpApellidosUsuario"], $_REQUEST["inpIdentificadorUsuario"], $_REQUEST["inpContrasennaUsuario"]);

        echo json_encode($usuario);

        redireccionar("../admin/ProductosGestion.php");

