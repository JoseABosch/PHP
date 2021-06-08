<?php
namespace JOSE\app\repository;
use JOSE\core\database\QueryBuilder;
use JOSE\app\entity\Editorial;

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
