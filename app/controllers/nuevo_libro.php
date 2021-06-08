<?php

use JOSE\BLL\LibroBLL;
use JOSE\entity\Libro;
use JOSE\helpers\MyLogger;
use JOSE\repository\EditorialRepository;
use JOSE\repository\LibroRepository;

$libroRepository = new LibroRepository();

try {
    $libroRepository->getConnection()->beginTransaction();
    $precio = $_POST['precio'];
    $titulo = $_POST['titulo'];
    $editorialLibro = $_POST['editorial'];
    $autor = $_POST['autor'];
    $imagenBLL = new LibroBLL($_FILES['imagen']);
    $imagenBLL->uploadImagen();
    $nombre = $imagenBLL->getUploadedFileName();

    $libro = new Libro();
    $libro->setPrecio(intval($precio))
        ->setTitulo($titulo)
        ->setAutor($autor)
        ->setEditorial($editorialLibro)
        ->setFoto($nombre)
        ->setEditorial($editorialLibro);

    $libro2 = $LibroRepository->save($libro);

    $editorialRepository = new EditorialRepository();
    /** @var Editorial $editorial */
    $editorial = $editorialRepository->find($editorialLibro);
    $editorial->setNumLibros(
        $editorial->getNumCasas() + 1
    );
    $editorialRepository->update($editorial);

    $LibroRepository->getConnection()->commit();

} catch (Exception $exception) {
    $LibroRepository->getConnection()->rollBack();
    var_dump($exception);
}

MyLogger::createLog(
    'Se ha insertado la imagen ' . $libro->getFoto());

App::get('router')->redirect('blog');
