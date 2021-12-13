<?php
require_once "./_com/__RequireOnceComunes.php";

$productos=DAO::productosObtenerTodas();

?>

<html>
  <head>
    <meta charset="UTF-8" />
    <link rel="shortcut icon" href="#" />
    <link rel="stylesheet" href="css/Estilos.css" />
    <script src="js/Scripts.js"></script>
  </head>

  <body>
    <h1>Productos</h1>

    <table border='1'>

    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>PrecioUnidad</th>
        <th>Stock</th>
        <th>Eliminar</th>
    </tr>

    <?php foreach ($productos as $producto) { ?>
        <tr>
            <td><p><?= $producto->getId();     ?> </p></td>
            <td><p><?= $producto->getNombre(); ?> </p></td>
            <td><p><?= $producto->getPrecio(); ?> </p></td>
            <td><p><?= $producto->getStock();  ?> </p></td>
            <td><a href="eliminarProducto.php?id=<?= $producto->getId();?>"> (X)</a></td>
        </tr>
    <?php } ?>

</table>

</body>
</html>
