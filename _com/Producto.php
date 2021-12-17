<?php

require_once "__RequireOnceComunes.php";

class Producto extends Dato
{
    use Identificable;

    private string $denominacion;
    private string $tipo;
    private string $precio;
    private string $stock;

    public function __construct($id, $denominacion, $tipo, $precio, $stock)
    {
        $this->id = $id;
        $this->denominacion = $denominacion;
        $this->tipo = $tipo;
        $this->precio = $precio;
        $this->stock = $stock;
    }

    public function getDenominacion()
    {
        return $this->denominacion;
    }

    public function setDenominacion($denominacion)
    {
        $this->denominacion = $denominacion;
    }

    public function getTipo()
    {
        return $this->tipo;
    }

    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
    }

    public function getPrecio()
    {
        return $this->precio;
    }

    public function setPrecio($precio)
    {
        $this->precio = $precio;
    }

    public function getStock()
    {
        return $this->stock;
    }

    public function setStock($stock)
    {
        $this->stock = $stock;
    }

    public function jsonSerialize()
    {
        return [
            "id" => $this->id,
            "denominacion" => $this->denominacion,
            "tipo" => $this->tipo,
            "precio" => $this->precio,
            "stock" => $this->stock,
        ];

        // Esto sería lo mismo:
        //$array["nombre"] = $this->nombre;
        //$array["id"] = $this->id;
        //return $array;
    }
}
