<?php


namespace JOSE\app\repository;

use JOSE\core\database\QueryBuilder;
use JOSE\app\entity\Editorial;

class MensajeRepository extends QueryBuilder
{

    /**
     * MensajeRepository constructor.
     */
    public function __construct()
    {
        parent::__construct(
            'mensajes', Mensaje::class
        );    }
}