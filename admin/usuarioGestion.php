<?php
require_once "../_com/__RequireOnceComunes.php";
require_once "../sesiones/_Sesion.php";


$traza = new Traza(1, "ProductoGestion", "Se ha entrado a ProductosGestion ", 0, date("F j, Y, g:i a"));
// OJO ----> en el 4 campo del constructor debe ponerse el id del creado ( $categoria->getId() ) , demomento no pongo asi porq es una beta

DAO::registrarAccion($traza);
?>



<html>

<head>
    <meta charset='UTF-8' />
    <link rel="shortcut icon" href="#">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../_com/Estilos.css">
    <script src='usuarioGestion.js'></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</head>

<body>


    <h1>Gestión de Trabajadores</h1>
<br><br>
    <nav>
        <ul class="menu">
            <li><a href="ProductosGestion.php">Gestión Producto</a></li>
            <li><a href="usuarioGestion.php">Gestión Usuario</a></li>
            <li><a href="#" id="btnCerrarSesion">Cerrar Sesion</a></li>

        </ul>
    </nav>
<br>

</section>
<br><br>
<section id="secTabla">
    <div id='divCabecera'>
        <div>
            <div>Identificador</div>
            <div>Nombre</div>
            <div>Apellidos</div>
            <div>Tipo Usuario</div>
            <div>Eliminar</div>
        </div>
    </div>
    <div id='divDatos'>
    </div>
</section>
<br>

<button id='btnCrearUsuario'>Crear Usuario Trabajador</button>

<br>
<br>

<section id="crearUsuario">
    <div id="iconoX">
        <i class="fa fa-times-circle"></i>
    </div>
    <label>Nombre </label>
    <input type='text' id='inpNombre' placeholder='Nombre' value=''/> <br><br>
    <label>Apellidos</label>
    <input type='text' id='inpApellidos' placeholder="Apellidos"/> <br><br>
    <label>Identificador</label>
    <input type='text' id='inpIdentificador' placeholder="Identificador"/> <br><br>
    <label>Contraseña</label>
    <input type='text' id='inpContrasenna' placeholder="Contraseña"  /> <br><br>

    <button id='btnCrear'>Crear</button>
</section> <br>

</body>

</html>