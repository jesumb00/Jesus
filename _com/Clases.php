<?php

abstract class Dato
{
}

trait Identificable
{
    protected int $id;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id)
    {
        $this->id = $id;
    }
}

class Categoria extends Dato implements JsonSerializable
{
    use Identificable;

    private string $nombre;
    private ?array $personasPertenecientes = null;

    public function __construct(int $id, string $nombre)
    {
        $this->id = $id;
        $this->setNombre($nombre);
    }

    public function getNombre(): string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre)
    {
        $this->nombre = $nombre;
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

    public function eliminar(): bool
    {
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

class Persona extends Dato implements JsonSerializable
{
    use Identificable;

    private string $nombre;
    private string $apellidos;
    private string $telefono;
    private bool $estrella;
    private int $categoriaId;
    private ?Categoria $categoria = null;

    public function __construct(int $id, string $nombre, ?string $apellidos, string $telefono, bool $estrella, int $categoriaId)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->telefono = $telefono;
        $this->estrella = $estrella;
        $this->categoriaId = $categoriaId;
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

    public function getTelefono(): string
    {
        return $this->telefono;
    }

    public function setTelefono(string $telefono): void
    {
        $this->telefono = $telefono;
    }

    public function isEstrella(): bool
    {
        return $this->estrella;
    }

    public function setEstrella(bool $estrella): void
    {
        $this->estrella = $estrella;
    }

    public function getCategoriaId(): int
    {
        return $this->categoriaId;
    }

    public function setCategoriaId(int $categoriaId): void
    {
        $this->categoriaId = $categoriaId;
    }

    public function jsonSerialize()
    {
        return [
            "id" => $this->id,
            "nombre" => $this->nombre,
            "apellidos" => $this->apellidos,
            "telefono" => $this->telefono,
            "estrella" => $this->estrella,
            "categoriaId" => $this->categoriaId,
        ];

        // Esto sería lo mismo:
        //$array["nombre"] = $this->nombre;
        //$array["id"] = $this->id;
        //return $array;
    }

    public function obtenerCategoria(): Categoria
    {
        if ($this->categoria == null) $categoria = DAO::categoriaObtenerPorId($this->categoriaId);

        return $categoria;
    }

    public function perteneceA(Categoria $categoria): bool
    {
        return ($this->categoriaId == $categoria->getId());
    }
}

class Producto extends Dato
{

    private string $id;
    private string $nombre;
    private string $precio;
    private string $stock;

    public function __construct( $id,  $nombre, $precio , $stock)
    {
        $this->id = $id;
        $this->nombre=$nombre;
        $this->precio=$precio;
        $this->stock=$stock;
    }

    public function getId(){
        return $this->id;
    }

    public function setId($nuevoId){
         $this->id=$nuevoId;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function setNombre($nuevoNombre){
         $this->nombre=$nuevoNombre;
    }


    public function getPrecio(){
        return $this->precio;
    }

    public function setPrecio($nuevoPrecio){
         $this->precio=$nuevoPrecio;
    }

    public function getStock(){
        return $this->stock;
    }

    public function setStock($nuevoStock){
         $this->stock=$nuevoStock;
    }

}

class Ticket extends Dato implements JsonSerializable
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