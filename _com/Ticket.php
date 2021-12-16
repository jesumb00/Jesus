<?php

require_once "__RequireOnceComunes.php";

class Ticket extends Dato
{
    use Identificable;

    private string $cif;
    private int $numeroTicket;
    private date $fechaHora;
    private string $lugar;
    private int $caja;
    private int $precio;
    private bool $descuento;
    private int $total;

    private ?array $personasPertenecientes = null;

    public function __construct(int $id, string $cif,int $numeroTicket,date $fechaHora,string $lugar,int $caja,int $precio,bool $descuento,int $total)
    {
        $this->id = $id;
        $this->setCif($cif);
        $this->setNumeroTicket($numeroTicket);
        $this->setFechaHora($fechaHora);
        $this->setLugar($lugar);
        $this->setCaja($caja);
        $this->setPrecio($precio);
        $this->setDescuento($descuento);
        $this->setTotal($total);
    }

    public function getCif(): string
    {
        return $this->cif;
    }

    public function setCif(string $cif)
    {
        $this->cif = $cif;
    }
    public function getNumeroTikect(): int
    {
        return $this->numeroTicket;
    }

    public function setNumeroTicket(int $numeroTicket)
    {
        $this->numeroTicket = $numeroTicket;
    }

    public function getFechaHora(): date
    {
        return $this->fechaHora;
    }

    public function setFechaHora(date $fechaHora)
    {
        $this->fechaHora = $fechaHora;
    }

    public function getLugar(): string
    {
        return $this->lugar;
    }

    public function setLugar(string $lugar)
    {
        $this->lugar = $lugar;
    }

    public function getCaja(): int
    {
        return $this->caja;
    }

    public function setCaja(int $caja)
    {
        $this->caja = $caja;
    }

    public function getPrecio(): int
    {
        return $this->precio;
    }

    public function setPrecio(int $precio)
    {
        $this->precio = $precio;
    }

    public function getDescuento(): bool
    {
        return $this->descuento;
    }

    public function setDescuento(int $descuento)
    {
        $this->descuento = $descuento;
    }

    public function getTotal(): int
    {
        return $this->total;
    }

    public function setTotal(int $total)
    {
        $this->total = $total;
    }

    public function jsonSerialize()
    {
        return [
            "id" => $this->id,
            "nombre" => $this->nombre,
        ];

        // Esto sería lo mismo:
        //$array["nombre"] = $this->nombre;
        //$array["id"] = $this->id;
        //return $array;
    }

    public function eliminar(): bool {
        // Esto sería un control para NO eliminar una categoría si "contiene" personas.
        if ($this->obtenerPersonasPertenecientes()) return false;

        return DAO::categoriaEliminarPorId($this->id);
    }

    public function obtenerPersonasPertenecientes(): array
    {
        if ($this->personasPertenecientes == null) $personasPertenecientes = DAO::personaObtenerPorCategoria($this->id);

        return $personasPertenecientes;
    }
}