<?php

    require_once "../_com/__RequireOnceComunes.php";
    require_once "_Sesion.php";

    salirSiSesionFalla();

    if(isset($_REQUEST["clickCerrar"]) && $_REQUEST["clickCerrar"]) {
        cerrarSesion();
    } else {
        echo "<script>window.history.back();</script>";
    }