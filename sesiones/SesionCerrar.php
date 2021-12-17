<?php

    require_once "../_com/__RequireOnceComunes.php";
    require_once "_Sesion.php";

    salirSiSesionFalla();

    cerrarSesion();

    redireccionar("SesionFormulario.php?sesionCerrada");