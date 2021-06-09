<?php
use DWES\app\BLL\LibroBLL;
use DWES\app\entity\Libro;
use DWES\app\helpers\MyLogger;
use DWES\app\repository\EditorialRepository;
use DWES\app\repository\LibroRepository;

$LibroRepository = new LibroRepository();

try {
    $LibroRepository->getConnection()->beginTransaction();
    $precio = $_POST['precio'];
    $editorialLibro = $_POST['editorial'];
    $titulo = $_POST['titulo'];
    $autor = $_POST['autor'];
    $imagenBLL = new LibroBLL($_FILES['imagen']);
    $imagenBLL->uploadImagen();
    $nombre = $imagenBLL->getUploadedFileName();

    $libro = new Libro();
    $libro->setPrecio(intval($precio))
        ->setEditorial($editorialLibro)
        ->setTitulo($titulo)
        ->setFoto($nombre)
        ->setEditorial($editorialLibro)
        ->setAutor($autor);

    $libro2 = $LibroRepository->save($libro);

    $editorialRepository = new EditorialRepository();
    /** @var Editorial $editorial */
    $editorial = $editorialRepository->find($editorialLibro);
    $editorial->setNumLibros(
        $editorial->getNumLibros()+1
    );
    $editorialRepository->update($editorial);

    $LibroRepository->getConnection()->commit();

} catch(Exception $exception) {
    $LibroRepository->getConnection()->rollBack();
    var_dump($exception);
}

MyLogger::createLog(
    'Se ha insertado una nueva imagen llamada ' . $libro->getFoto());

App::get('router')->redirect('blog');
