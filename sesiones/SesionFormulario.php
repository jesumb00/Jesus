<?php
    require_once "../_com/__RequireOnceComunes.php";
    require_once "_Sesion.php";

    entrarSiSesionIniciada();
?>

<html>

<head>
    <meta charset='UTF-8'>
</head>
<body>

<?php if (isset($_REQUEST["error"])) { ?>
    <p style="color: red">Error de autenticación, inténtelo de nuevo.</p>
<?php } ?>

<?php if (isset($_REQUEST["sesionCerrada"])) { ?>
    <p style="color: blue">Se ha cerrado correctamente la sesión.</p>
<?php } ?>

<form action='SesionComprobar.php' method='post'>
    <label for='identificador'>Identificador</label><br>
    <input type='text' name='identificador'><br><br>

    <label for='contrasenna'>Contraseña</label><br>
    <input type='password' name='contrasenna'><br><br>

    <input type='checkbox' name='recuerdame'>Recuérdame<br><br>

    <input type='submit' value='Iniciar sesión'>
</form>

<h10>¿Nuevo en Tienda? <a href="crearUsuario.php" style="text-decoration: none">Crear una cuenta</a> Tienda</h10>
</body>

</html>