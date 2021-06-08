<?php
use JOSE\repository\LibroRepository;
use JOSE\repository\EditorialRepository;

$editorialRepository = new EditorialRepository();
$editoriales = $editorialRepository->findAll();

require __DIR__ . '/../views/blog.view.php';