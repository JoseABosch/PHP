<?php
namespace JOSE\app\repository;

use JOSE\core\database\QueryBuilder;
use JOSE\app\entity\Libro;
use JOSE\app\entity\Editorial;

class LibroRepository extends QueryBuilder
{

    /**
     * LibroRepository constructor.
     */
    public function __construct()
    {
        parent::__construct(
            'libros', Libro::class
        );
    }

    public function getEditorial(Libro $libro) : ?Editorial
    {
        $editorialRepository = new EditorialRepository();
        return $editorialRepository->find($libro->getEditorial());
    }

}