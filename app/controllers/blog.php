<?php
use DWES\app\repository\LibroRepository;
use DWES\app\repository\EditorialRepository;

$editorialRepository = new EditorialRepository();
$editoriales = $editorialRepository->findAll();

require __DIR__ . '/../views/blog.view.php';