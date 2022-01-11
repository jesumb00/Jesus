<?php

declare(strict_types=1);

define("ERROR_SESION", "NOSESION");

session_start();

// TODO Adaptar/quitar esta función.
function entrarSiSesionIniciada()
{
    if (comprobarRenovarSesion()) redireccionar("../admin/ProductosGestion.php");
}

function salirSiSesionFalla()
{
    if (!comprobarRenovarSesion()) redireccionar("../sesiones/SesionFormulario.php");
}

function devolverErrorSiSesionFalla()
{
    if (!comprobarRenovarSesion()) {
        echo json_encode(ERROR_SESION);
        exit;
    }
}

function comprobarRenovarSesion(): bool
{
    if (haySesionRAM()) {
        if (isset($_COOKIE["id"])) { // Basta con mirar si parece que viene cookie porque ya acabamos de validar la sesión RAM
            generarRenovarSesionCookie();
        }
        return true; // Esto es en todo caso
    } else { // NO hay sesión RAM
        $usuario = obtenerUsuarioPorCookie();
        if ($usuario) { // Equivale a if ($usuario != null)
            generarSesionRAM($usuario); // Canjear la sesión cookie por una sesión RAM.
            generarRenovarSesionCookie();
            return true;
        } else { // Ni RAM, ni cookie
            return false;
        }
    }
}

function haySesionRAM(): bool
{
    return isset($_SESSION["id"]);
}

function obtenerUsuarioPorCookie(): ?Usuario
{
    if (isset($_COOKIE["id"])) {
        return DAO::usuarioObtenerPorCookie($_COOKIE["id"], $_COOKIE["codigoCookie"]);
    } else {
        return null;
    }
}

function generarSesionRAM(Usuario $usuario)
{
    // Guardar el id es lo único indispensable.
    // El resto son por evitar accesos a la BD a cambio del riesgo
    // de que mis datos en sesión RAM estén obsoletos.
    $_SESSION["id"] = $usuario->getId();
    $_SESSION["identificador"] = $usuario->getIdentificador();
    $_SESSION["nombre"] = $usuario->getIdentificador();
    $_SESSION["tipoUsuario"] = $usuario->getTipoUsuario();
}

function generarRenovarSesionCookie()
{
    $codigoCookie = uniqid(); // Genera un código aleatorio "largo".

    $fechaCaducidad = time() + 24 * 60 * 60;
    $fechaCaducidadParaBD = date("Y-m-d H:i:s", $fechaCaducidad);

    // Anotar en la BD el codigoCookie y su caducidad.
    DAO::generarRenovarSesionCookie($codigoCookie, $fechaCaducidadParaBD, $_SESSION["id"]);

    // Crear (o renovar) las cookies.
    setcookie('id', strval($_SESSION["id"]), $fechaCaducidad);
    setcookie('codigoCookie', $codigoCookie, $fechaCaducidad);
}

function cerrarSesion()
{
    DAO::cerrarSesion($_SESSION["id"]);

    // Borrar las cookies.
    setcookie('id', "", time() - 3600);
    setcookie('codigoCookie', "", time() - 3600);

    // Destruir sesión RAM (implica borrar cookie de PHP "PHPSESSID").
    session_destroy();
}