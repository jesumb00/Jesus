<?php
require_once "./_com/__RequireOnceComunes.php";

$id = (int)$_REQUEST["id"];

$eliminadoCorrectamente=DAO:: productoEliminarPorId($id);

?>

<html>

<head>
    <meta charset='UTF-8'>
</head>


<body>



<?php if ($eliminadoCorrectamente) { ?>

    <h1>Eliminación completada</h1>
    <p>Se ha eliminado correctamente la categoría.</p>

<?php  } else { ?>

    <h1>Error en la eliminación</h1>
    <p>No se ha podido eliminar la categoría.</p>

<?php } ?>

<a href='Productos.php'>Volver</a>


</body>

</html>