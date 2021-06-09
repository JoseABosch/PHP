<?php


namespace DWES\app\repository;

use DWES\app\entity\Usuario;
use DWES\core\database\QueryBuilder;

class UsuarioRepository extends QueryBuilder
{
    /**
     * UsuarioRepository constructor.
     */
    public function __construct()
    {
        parent::__construct(
            'usuarios', Usuario::class
        );
    }
}