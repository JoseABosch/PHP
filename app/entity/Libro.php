<?php
namespace DWES\app\entity;
use DWES\app\repository\UsuarioRepository;
use DWES\core\database\IEntity;
use DWES\app\repository\EditorialRepository;

class Libro implements IEntity
{
    const RUTA_FEATURE = 'img/feature/';
    private int $id = 0;
    private int $precio = 0;
    private string $foto = '';
    private string $titulo = '';
    private string $autor = '';
    private int $editorial = 0;
    private int $usuario;
    //private int $comprador = 0;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Libro
     */
    public function setId(int $id): Libro
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return int
     */
    public function getPrecio(): int
    {
        return $this->precio;
    }

    /**
     * @param int $precio
     * @return Libro
     */
    public function setPrecio(int $precio): Libro
    {
        $this->precio = $precio;
        return $this;
    }

    /**
     * @return string
     */
    public function getFoto(): string
    {
        return $this->foto;
    }

    /**
     * @param string $foto
     * @return Libro
     */
    public function setFoto(string $foto): Libro
    {
        $this->foto = $foto;
        return $this;
    }

    /**
     * @return string
     */
    public function getTitulo(): string
    {
        return $this->titulo;
    }

    /**
     * @param string $titulo
     * @return Libro
     */
    public function setTitulo(string $titulo): Libro
    {
        $this->titulo = $titulo;
        return $this;
    }

    /**
     * @return string
     */
    public function getAutor(): string
    {
        return $this->autor;
    }

    /**
     * @param string $autor
     * @return Libro
     */
    public function setAutor(string $autor): Libro
    {
        $this->autor = $autor;
        return $this;
    }

    /**
     * @return int
     */
    public function getEditorial(): int
    {
        return $this->editorial;
    }

    /**
     * @param int $editorial
     * @return Libro
     */
    public function setEditorial(int $editorial): Libro
    {
        $this->editorial = $editorial;
        return $this;
    }

    public function getPathFeature()
    {
        return self::RUTA_FEATURE . $this->foto;
    }

    /**
     * @return int
     */
    public function getUsuario(): int
    {
        return $this->usuario;
    }

    /**
     * @param int $usuario
     */
    public function setUsuario(int $usuario): void
    {
        $this->usuario = $usuario;
    }

    /**
     * @return int
     */
    /*public function getComprador(): int
    {
        return $this->comprador;
    }*/

    /**
     * @param int $comprador
     */
    /*public function setComprador(int $comprador): void
    {
        $this->comprador = $comprador;
    }*/


    public function toArray() : array
    {
        return [
            'precio' => $this->getPrecio(),
            'foto' => $this->getFoto(),
            'titulo' => $this->getTitulo(),
            'autor' => $this->getAutor(),
            'editorial' => $this->getEditorial(),
            'usuario' => $this->getUsuario()
            //'comprador' => $this->getComprador()
        ];
    }

    public function getEditorialAsociada() : ?Editorial
    {
        $editorialRepository = new EditorialRepository();
        return $editorialRepository->find($this->getEditorial());
    }

    public function getUsuarioAsociado() : ?Usuario
    {
        $usuarioRepository = new UsuarioRepository();
        return $usuarioRepository->find($this->getUsuario());
    }
}
