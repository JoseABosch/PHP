<?php
namespace DWES\app\repository;
use DWES\core\database\QueryBuilder;
use DWES\app\entity\Editorial;

class EditorialRepository extends QueryBuilder
{
    /**
     * EditorialRepository constructor.
     */
    public function __construct()
    {
        parent::__construct(
            'editorial', Editorial::class
        );
    }
}
