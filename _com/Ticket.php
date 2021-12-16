<?php

require_once "__RequireOnceComunes.php";

class Ticket extends Dato
{
    use Identificable;



    private DateTime $apertura;
    private DateTime $cierre;
    private int $empleadoId;


    public function __construct(int $id,DateTime $apertura,DateTime $cierre,int $empleadoId)
    {
        $this->id = $id;
        $this->setApertura($apertura);
        $this->setApertura($cierre);
        $this->setApertura($empleadoId);
    }

    public function setId(int $id)
    {
        $this->id = $id;
    }

    public function getApertura(): DateTime
    {
        return $this->apertura;
    }

    public function setApertura(DateTime $apertura)
    {
        $this->apertura = $apertura;
    }

    public function getCierre(): DateTime
    {
        return $this->cierre;
    }

    public function setCierre(DateTime $cierre)
    {
        $this->cierre = $cierre;
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
            "empleadoId" => $this->empleadoId,
        ];

        // Esto sería lo mismo:
        //$array["nombre"] = $this->nombre;
        //$array["id"] = $this->id;
        //return $array;
    }
}