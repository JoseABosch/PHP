<?php

use DWES\app\repository\LibroRepository;
use DWES\app\repository\EditorialRepository;

$libroRepository = new LibroRepository();
$libros = $libroRepository->findAll();

$editorialRepository = new EditorialRepository();
$editoriales = $editorialRepository->findAll();

require __DIR__ . '/../views/index.view.php';