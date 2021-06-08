<?php

use JOSE\repository\LibroRepository;
use JOSE\repository\EditorialRepository;

$libroRepository = new LibroRepository();
$libros = $libroRepository->findAll();

$editorialRepository = new EditorialRepository();
$editoriales = $editorialRepository->findAll();

require __DIR__ . '/../views/index.view.php';