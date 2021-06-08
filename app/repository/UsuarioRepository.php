<?php


namespace JOSE\app\repository;

use JOSE\app\entity\Usuario;
use JOSE\core\database\QueryBuilder;

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