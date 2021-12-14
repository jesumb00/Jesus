<?php
    require_once "../_com/__RequireOnceComunes.php";

    // Si NO viene id quieren CREAR una nueva entrada ($existe tomará false).
    // Sin embargo, si VIENE id quieren VER la ficha de una categoría existente
    // (y $existe tomará true).

?>



<html>

<head>
    <meta charset='UTF-8'>
</head>


<body>



<h1>Nuevo producto</h1>

<form method='post' action='productoGuardar.php'>


    <label for='nombre'>Nombre</label>
    <input type='text' id='nombre' name='nombre' value='nombre'/>

    <label for='precio'>Precio Unidad</label>
    <input type='text' id='precio' name='precio' value='precio Unidad'/>

    <label for='stock'>Stock</label>
    <input type='text' id='stock' name='stock' value='stock'/>

    <input type="submit" value="Enviar">
</form>

</body>

</html>