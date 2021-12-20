<?php
    require_once "../_com/__RequireOnceComunes.php";
    require_once "../sesiones/_Sesion.php";

    salirSiSesionFalla();
?>

<html>

<head>
    <meta charset='UTF-8' />
    <link rel="shortcut icon" href="#">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../_com/Estilos.css">
    <script src='ProductosGestion.js'></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</head>

<body>

<h1>Gestión de Productos</h1>

<section id="secTabla">
    <div id='divCabecera'>
        <div>
            <div>Nombre</div>
            <div>Eliminar</div>
        </div>
    </div>
    <div id='divDatos'>
    </div>
</section>

<br>

<input type='text' id='inpNombre' placeholder='Categoria' value='' />
<button id='btnCrear'>Crear</button>

<br><br><br>

<button id="btnCerrarSesion"> Cerrar sesión </button>

</body>

</html>