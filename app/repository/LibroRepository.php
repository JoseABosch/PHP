<?php
namespace DWES\app\repository;

use DWES\core\database\QueryBuilder;
use DWES\app\entity\Libro;
use DWES\app\entity\Editorial;

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