<?php

require_once "__RequireOnceComunes.php";

class Producto extends Dato
{
    use Identificable;

    private string $denominacion;
    private string $precioUnidad;
    private string $stock;
    private ?Producto $producto = null;

    public function __construct($id, $denominacion, $precioUnidad, $stock)
    {
        $this->id = $id;
        $this->denominacion= $denominacion;
        $this->precioUnidad= $precioUnidad;
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
        return $this->precioUnidad;
    }

    public function setPrecio($precioUnidad){
        $this->precioUnidad=$precioUnidad;
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
            "precioUnidad" => $this->precioUnidad,
            "stock" => $this->stock,
        ];

        // Esto sería lo mismo:
        //$array["nombre"] = $this->nombre;
        //$array["id"] = $this->id;
        //return $array;
    }
}