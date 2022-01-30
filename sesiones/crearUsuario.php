<?php
require_once "../_com/__RequireOnceComunes.php";
require_once "_Sesion.php";

?>

<html>

<head>
    <meta charset='UTF-8'>
</head>
<body>

<form action="UsuarioCrear.php" id="form" method="post">
    <label for="nombre">Nombre</label> <br>
    <input type="text" name="inpNombreUsuario"> <br> <br>

    <label for="apellidos">Apellidos</label> <br>
    <input type="text" name="inpApellidosUsuario"> <br> <br>

    <label for="identificador">Identificador</label> <br>
    <input type="text" name="inpIdentificadorUsuario"> <br> <br>

    <label for="contrasenna">Contraseña</label> <br>
    <input type="password" name="inpContrasennaUsuario"> <br> <br>

    <label for="contrasenna2">Confirme su contraseña</label> <br>
    <input type="password" name="inpContrasenna2Usuario"> <br> <br>

    <input type="submit" name="btnRegistroUsuario" value="Crear Usuario">
    <br>
    <br>
    <h10>¿Ya tienes una cuenta? <a href="SesionFormulario.php">Iniciar sesión →</a></h10>
</form>

</body>

</html>
