<?php

require_once "__RequireOnceComunes.php";

class Producto extends Dato
{
    use Identificable;

    private string $denominacion;
    private string $precio;
    private string $stock;
    private ?Producto $producto = null;

    public function __construct($id, $denominacion, $precio, $stock)
    {
        $this->id = $id;
        $this->denominacion= $denominacion;
        $this->precio= $precio;
        $this->stock= $stock;
    }

    public function getDenominacion(): string
    {
        return $this->denominacion;
    }

    public function setDenominacion(string $denominacion): void
    {
        $this->denominacion= $denominacion;
    }

    public function getPrecio(){
        return $this->precio;
    }

    public function setPrecio($precio){
        $this->precio=$precio;
    }

    public function getStock(){
        return $this->stock;
    }

    public function setStock($stock){
        $this->stock=$stock;
    }

    public function jsonSerialize()
    {
        return [
            "id" => $this->id,
            "denominacion" => $this->denominacion,
            "precio" => $this->precio,
            "stock" => $this->stock,
        ];

        // Esto sería lo mismo:
        //$array["nombre"] = $this->nombre;
        //$array["id"] = $this->id;
        //return $array;
    }
}