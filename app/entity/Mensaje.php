<?php


namespace JOSE\app\entity;


use JOSE\core\database\IEntity;

class Mensaje implements IEntity
{
    private int $id;
    private string $nombre;
    private string $apellidos;
    private string $asunto;
    private string $email;
    private string $texto;
    private  string $fecha;
    private int $usuario;
    private int $receptor;

    /**
     * Contactar constructor.
     * @param int $id
     * @param string $nombre
     * @param string $apellidos
     * @param string $asunto
     * @param string $email
     * @param string $texto
     * @param string $fecha
     * @param int $usuario
     * @param int $receptor
     */
    public function __construct(string $nombre='', string $apellidos='',
            string $asunto='', string $email='', string $texto='', int $usuario, int $receptor)
    {
        $this->id = 0;
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->asunto = $asunto;
        $this->email = $email;
        $this->texto = $texto;
        $this->fecha = '';
        $this->usuario = $usuario;
        $this->receptor = $receptor;
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
    public function getReceptor(): int
    {
        return $this->receptor;
    }

    /**
     * @param int $receptor
     */
    public function setReceptor(int $receptor): void
    {
        $this->receptor = $receptor;
    }

    public function toArray() : array
    {
        return [
            'id'=> $this->id,
            'nombre' => $this->nombre,
            'apellidos' => $this->apellidos,
            'asunto' => $this->asunto,
            'email' => $this->email,
            'texto' => $this->texto,
            'usuario' => $this->usuario,
            'receptor' => $this->receptor
        ];
    }
}