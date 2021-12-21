<?php

require_once "__RequireOnceComunes.php";

class Ticket extends Dato
{
    use Identificable;


    private DateTime $apertura;
    private int $caja;
    private int $empleadoId;

    private ?DateTime $cierre;
    private ?int $total = null;
    private ?array $linea = null;


    public function __construct(int $id, DateTime $apertura, int $caja, int $empleadoId)
    {
        $this->id = $id;
        $this->setApertura($apertura);
        $this->setCaja($caja);
        $this->setEmpleadoId($empleadoId);
    }

    public function getApertura(): DateTime
    {
        return $this->apertura;
    }

    public function setApertura(DateTime $apertura)
    {
        $this->apertura = $apertura;
    }

    public function getCaja(): int
    {
        return $this->caja;
    }

    public function setCaja(int $caja)
    {
        $this->caja = $caja;
    }

    public function getEmpleadoId(): int
    {
        return $this->empleadoId;
    }

    public function setEmpleadoId(int $empleadoId)
    {
        $this->empleadoId = $empleadoId;
    }

    public function jsonSerialize()
    {
        return [
            "id" => $this->id,
            "apertura" => $this->apertura,
            "cierre" => $this->cierre,
            "caja" => $this->caja,
            "empleadoId" => $this->empleadoId,
        ];

        // Esto sería lo mismo:
        //$array["nombre"] = $this->nombre;
        //$array["id"] = $this->id;
        //return $array;
    }

}