<?php
    require_once "./_com/__RequireOnceComunes.php";

    // Se recogen los datos del formulario de la request, excepto id.
    $nombre = $_REQUEST["nombre"];
    $precio=$_REQUEST["precio"];
    $stock=$_REQUEST["stock"];
    

    
    

    $correcto=productoCrear( $nombre,  $precio, $stock);
    
?>



<html>

<head>
    <meta charset='UTF-8'>
</head>

<body>


    <?php if (!$correcto) { ?>
        <h1>Inserción completada</h1>
        <p>Se ha insertado correctamente la nueva entrada de <?= $categoria->getNombre(); ?>.</p>
    <?php } else { ?>
        <h1>Error/h1>
        <p>Se han guardado correctamente los nuevos datos de <?= $categoria->getNombre();} ?></p>


        <a href='Productos.php'>Productos</a>

</body>

</html>