<?php
session_start();
// aquí se cogen los datos del producto( nombre, precio y la cantidad y se crea un array con estos datos del producto si la session esta iniciada
if (isset($_SESSION['carrito'])) {
    $MiCarrito = $_SESSION['carrito'];
    if (isset($_POST['titulo'])) {
        $titulo = $_POST['titulo'];
        $precio = $_POST['precio'];
        $cantidad = $_POST['cantidad'];
        $num = 0;
        $MiCarrito[] = array("titulo" => $titulo, "precio" => $precio, "cantidad" => $cantidad);
    }
} else {
    $titulo = $_POST['titulo'];
    $precio = $_POST['precio'];
    $cantidad = $_POST['cantidad'];
    $MiCarrito[] = array("titulo" => $titulo, "precio" => $precio, "cantidad" => $cantidad);
}


$_SESSION['carrito'] = $MiCarrito;


header("Location: " . $_SERVER['HTTP_REFERER'] . "");
