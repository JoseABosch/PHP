<?php
namespace DWES\app\entity;

class Contactar implements IEntity
{
    private int $id;
    private string $nombre;
    private string $apellidos;
    private string $asunto;
    private string $email;
    private string $texto;
    private  DateTime $fecha;

    /**
     * Contactar constructor.
     * @param int $id
     * @param string $nombre
     * @param string $apellidos
     * @param string $asunto
     * @param string $email
     * @param string $texto
     * @param DateTime $fecha
     */
    public function __construct(int $id, string $nombre, string $apellidos, string $asunto, string $email, string $texto, DateTime $fecha)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->asunto = $asunto;
        $this->email = $email;
        $this->texto = $texto;
        $this->fecha = $fecha;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Contactar
     */
    public function setId(int $id): Contactar
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
     * @return Contactar
     */
    public function setNombre(string $nombre): Contactar
    {
        $this->nombre = $nombre;
        return $this;
    }

    /**
     * @return string
     */
    public function getApellidos(): string
    {
        return $this->apellidos;
    }

    /**
     * @param string $apellidos
     * @return Contactar
     */
    public function setApellidos(string $apellidos): Contactar
    {
        $this->apellidos = $apellidos;
        return $this;
    }

    /**
     * @return string
     */
    public function getAsunto(): string
    {
        return $this->asunto;
    }

    /**
     * @param string $asunto
     * @return Contactar
     */
    public function setAsunto(string $asunto): Contactar
    {
        $this->asunto = $asunto;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return Contactar
     */
    public function setEmail(string $email): Contactar
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string
     */
    public function getTexto(): string
    {
        return $this->texto;
    }

    /**
     * @param string $texto
     * @return Contactar
     */
    public function setTexto(string $texto): Contactar
    {
        $this->texto = $texto;
        return $this;
    }

    /**
     * @return DateTime
     */
    public function getFecha(): DateTime
    {
        return $this->fecha;
    }

    /**
     * @param DateTime $fecha
     * @return Contactar
     */
    public function setFecha(DateTime $fecha): Contactar
    {
        $this->fecha = $fecha;
        return $this;
    }

    public function toArray() : array
    {
        return [
            'nombre' => $this->getNombre(),
            'apellidos' => $this->getApellidos(),
            'asunto' => $this->getAsunto()
        ];
    }
}
