<?php

require_once "__RequireOnceComunes.php";

class Linea extends Producto
{
    use Identificable;

    private int $cantidad;

    public function __construct($ticketId, $productoId, $cantidad, $precio)
    {
        $this->ticketId = $ticketId;
        $this->productoId=$productoId;
        $this->setCantidad($cantidad);
        $this->precio=$precio;
    }

    public function getCantidad(){
        return $this->cantidad;
    }

    public function setCantidad($cantidad){
        $this->cantidad = $cantidad;
    }
}