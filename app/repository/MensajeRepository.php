<?php


namespace DWES\app\repository;

use DWES\core\database\QueryBuilder;
use DWES\app\entity\Editorial;

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