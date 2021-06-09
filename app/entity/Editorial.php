<?php
namespace DWES\app\entity;

use DWES\core\database\IEntity;

class Editorial implements IEntity
{
    private int $id;
    private string $nombre;
    private int $numLibros;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Editorial
     */
    public function setId(int $id): Editorial
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getNombre(): string
    {
        return $this->nombre;
    }

    /**
     * @param string $nombre
     * @return Editorial
     */
    public function setNombre(string $nombre): Editorial
    {
        $this->nombre = $nombre;
        return $this;
    }

    /**
     * @return int
     */
    public function getNumLibros(): int
    {
        return $this->numLibros;
    }

    /**
     * @param int $numLibros
     * @return Editorial
     */
    public function setNumLibros(int $numLibros): Editorial
    {
        $this->numLibros = $numLibros;
        return $this;
    }

    public function toArray() : array
    {
        return [
            'nombre' => $this->getNombre(),
            'numLibros' => $this->getNumLibros()
        ];
    }
}
