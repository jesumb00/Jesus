<?php

require_once "__RequireOnceComunes.php";

class Usuario extends Dato
{
    use Identificable;

    //private int $id;
    private string $identificador;
    private string $contrasenna;
    private ?string $codigoCookie;
    private ?string $caducidadCodigoCookie;
    private string $tipoUsuario;
    private string $nombre;
    private string $apellidos;


    public function __construct($id, $identificador, $contrasenna, $codigoCookie, $caducidadCodigoCookie, $tipoUsuario, $nombre, $apellidos)
    {
        $this->id = $id;
        $this->identificador = $identificador;
        $this->contrasenna = $contrasenna;
        $this->codigoCookie = $codigoCookie;
        $this->caducidadCodigoCookie = $caducidadCodigoCookie;
        $this->tipoUsuario = $tipoUsuario;
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
    }

    public function jsonSerialize()
    {
        return [
            "id" => $this->id,
            "identificador" => $this->identificador,
            "contrasenna" => $this->contrasenna,
            "codigoCookie" => $this->codigoCookie,
            "caducidadCodigoCookie" => $this->caducidadCodigoCookie,
            "tipoUsuario" => $this->tipoUsuario,
            "nombre" => $this->nombre,
            "apellidos" => $this->apellidos
        ];

        // Esto sería lo mismo:
        //$array["nombre"] = $this->nombre;
        //$array["id"] = $this->id;
        //return $array;
        //}
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getIdentificador(): string
    {
        return $this->identificador;
    }

    public function setIdentificador(string $identificador): void
    {
        $this->identificador = $identificador;
    }

    public function getContrasenna(): string
    {
        return $this->contrasenna;
    }

    public function setContrasenna(string $contrasenna): void
    {
        $this->contrasenna = $contrasenna;
    }

    public function getCodigoCookie(): string
    {
        return $this->codigoCookie;
    }

    public function setCodigoCookie(string $codigoCookie): void
    {
        $this->codigoCookie = $codigoCookie;
    }

    public function getCaducidadCodigoCookie(): string
    {
        return $this->caducidadCodigoCookie;
    }

    public function setCaducidadCodigoCookie(string $caducidadCodigoCookie): void
    {
        $this->caducidadCodigoCookie = $caducidadCodigoCookie;
    }

    public function getTipoUsuario(): string
    {
        return $this->tipoUsuario;
    }

    public function setTipoUsuario(string $tipoUsuario): void
    {
        $this->tipoUsuario = $tipoUsuario;
    }

    public function getNombre(): string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): void
    {
        $this->nombre = $nombre;
    }

    public function getApellidos(): string
    {
        return $this->apellidos;
    }

    public function setApellidos(string $apellidos): void
    {
        $this->apellidos = $apellidos;
    }
}