<?php


namespace JOSE\app\entity;


use JOSE\core\database\IEntity;

class Usuario implements IEntity
{
    private int $id;
    public string $username;
    private string $password;
    private string $role;

    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @param string $username
     * @return Usuario
     */
    public function setUsername(string $username): Usuario
    {
        $this->username = $username;
        return $this;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     * @return Usuario
     */
    public function setPassword(string $password): Usuario
    {
        $this->password = $password;
        return $this;
    }

    /**
     * @return string
     */
    public function getRole(): string
    {
        return $this->role;
    }

    /**
     * @param string $role
     * @return Usuario
     */
    public function setRole(string $role): Usuario
    {
        $this->role = $role;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'username' => $this->getUsername(),
            'password' => $this->getPassword(),
            'role' => $this->getRole()
        ];
    }

}