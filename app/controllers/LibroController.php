<?php

namespace JOSE\app\controllers;

use JOSE\app\BLL\LibroBLL;
use JOSE\core\App;
use JOSE\core\Response;
use JOSE\app\entity\Libro;
use JOSE\app\helpers\MyLogger;
use JOSE\app\repository\LibroRepository;
use JOSE\app\repository\EditorialRepository;
use Exception;

class LibroController
{

    public function listar($titulo = '')
    {

        if($titulo != '')
        {
            //Filtrar por habitacion solo
            $editorialRepository = new EditorialRepository();
            $editoriales = $editorialRepository->findAll();

            $libroRepository = new LibroRepository();
            $libros = $libroRepository->findAllEqual(["titulo"], [$titulo,"0"],[],'precio',"ASC");

            if(sizeof($libros) == 0) {App::get('router')->redirect('');}
            else{
                Response:: renderView('index',
                    [
                        'libros' => $libros,
                        'editoriales' => $editoriales
                    ]);
            }

        }
        else if($titulo == '')
        {
            $editorialRepository = new EditorialRepository();
            $editoriales = $editorialRepository->findAll();

            $libroRepository = new LibroRepository();
            $libros = $libroRepository->findAllEqual([], [],[],'precio',"ASC");

            Response:: renderView('index',
                [
                    'libros' => $libros,
                    'editoriales' => $editoriales
                ]);
        }
    }

    public function formularioLibro($errores = array())
    {

        $usuario = App::get('user');
        $editorialRepository = new EditorialRepository();
        $editoriales = $editorialRepository->findAll();

        $libroRepository = new LibroRepository();

        if ($usuario->getRole() === "ROLE_ADMIN")
            $libros = $libroRepository->findAllOrderByDesc('id');

        else {
            $libros = $libroRepository->findBy([
                'usuario' => $usuario->getId()
            ]);
            $libros = array_reverse($libros);
        }

        Response:: renderView('libreria', ['libros' => $libros, 'editorial' => $editoriales,
            'errores' => $errores,]);
    }

    public function nuevoLibro()
    {

        $LibroRepository = new LibroRepository();

        $errores = [];
        if (!isset($_POST['precio']) || !is_numeric($_POST['precio'])) array_push($errores, 'El precio es obligatorio.');
        if (!isset($_POST['titulo']) || !is_numeric($_POST['titulo'])) array_push($errores, 'El título es obligatorio.');
        if (!isset($_POST['autor']) || !is_numeric($_POST['autor'])) array_push($errores, 'El autor es obligatorio.');
        if (!isset($_POST['editorial']) || strlen($_POST['editorial']) == 0) array_push($errores, 'La editorial es obligatoria.');

        if (sizeof($errores) == 0) {
            try {
                $usuario = App::get('user');
                $LibroRepository->getConnection()->beginTransaction();
                $precio = $_POST['precio'];
                $titulo = $_POST['titulo'];
                $autor = $_POST['autor'];
                $editorialLibro = $_POST['editorial'];

                $imagenBLL = null;
                $nombre = "";
                if (isset($_FILES['imagen']) && sizeof($_FILES['imagen']) > 0) {
                    $imagenBLL = new LibroBLL($_FILES['imagen']);
                    $imagenBLL->uploadImagen();
                    $nombre = $imagenBLL->getUploadedFileName();
                }

                $libro = new Libro();

                $libro->setPrecio(intval($precio))
                    ->setTitulo($titulo)
                    ->setAutor($autor)
                    ->setEditorial($editorialLibro)
                    ->setUsuario($usuario->getId());

                if (strlen($nombre) > 0) {
                    $libro->setFoto($nombre);
                }


                $casa2 = $LibroRepository->save($libro);

                $editorialRepository = new EditorialRepository();
                /** @var Editorial $editorial */
                $editorial = $editorialRepository->find($editorialLibro);
                $editorial->setNumLibros(
                    $editorial->getNumLibros() + 1
                );
                $editorialRepository->update($editorial);

                $LibroRepository->getConnection()->commit();

            } catch (Exception $exception) {
                $LibroRepository->getConnection()->rollBack();
                die('No se ha podido insertar el libro.');
            }

            MyLogger::createLog(
                'Se ha insertado la imagen  ' . $libro->getFoto());
        }
        $this->formularioLibro($errores);
    }

    public function show(string $id)
    {
        $libroRepository = new LibroRepository();
        $libro = $libroRepository->find($id);

        Response:: renderView('show-blog',
            [
                'libro' => $libro,
            ]);
    }

    private function deleteLibro(string $id)
    {
        try {
            $usuario = App::get('user');

            $libroRepository = new LibroRepository();
            $libroRepository->getConnection()->beginTransaction();

            $libro = $libroRepository->find($id);

            if ($usuario->getId() !== $libro->getUsuario() && $usuario->getRole() !== "ROLE_ADMIN")
                throw new Exception('No se permite borrar libros que no se pertenezcan al usuario');

            $libroRepository->delete($libro);
            $editorialRepository = new EditorialRepository();
            /** @var Editorial $editorial */
            $editorial = $editorialRepository->find($libro->getEditorial());
            $editorial->setNumLibros(
                $editorial->getNumLibros() - 1
            );
            $editorialRepository->update($editorial);
            $libroRepository->getConnection()->commit();
        } catch (Exception $exception) {
            $libroRepository->getConnection()->rollBack();
            die('No se ha podido borrar la imagen.');
        }
    }

    public function delete(string $id)
    {
        $this->deleteLibro($id);

        App::get('router')->redirect('libreria');
    }

    public function deleteJson(string $id)
    {
        $this->deleteLibro($id);
        header('Content-Type: application/json');

        echo json_encode([ 'error' => false, 'mensaje' => "El libro con id $id se ha eliminado correctamente."]);
    }

    public function comprarLibro()
    {
        $usuario = App::get('user');

        if (isset($_POST['idLibro']) != null) {
            $libroRepository = new LibroRepository();
            $libro = $libroRepository->find($_POST['idLibro']);
            $idLibro = $_POST['idLibro'];
            $libro->setComprador($usuario->getId());
            $libroRepository->update($libro);
        }

        App::get('router')->redirect('');
    }

    public function editarLibro($id, $errores = null)
    {
        $libroRepository = new LibroRepository();
        $libro = $libroRepository->find($id);

        $editorialesRepository = new EditorialRepository();
        $editoriales = $editorialesRepository->findAll();

        Response:: renderView('libreria-editar',
            [
                'libro' => $libro,
                'editorial' => $editoriales,
                'errores' => $errores,
            ]);
    }

    public function actualizarLibro()
    {
        $LibroRepository = new LibroRepository();
        $id = $_POST['id'];
        if (isset($_POST['id']) && strlen($_POST['id']) > 0) {

            $errores = [];
            if (!isset($_POST['precio']) || !is_numeric($_POST['precio'])) array_push($errores, 'El precio es obligatorio.');
            if (!isset($_POST['titulo']) || !is_numeric($_POST['titulo'])) array_push($errores, 'El titulo es obligatorio.');
            if (!isset($_POST['autor']) || !is_numeric($_POST['autor'])) array_push($errores, 'El autor es obligatorio.');

            if (sizeof($errores) == 0) {
                try {
                    $LibroRepository->getConnection()->beginTransaction();
                    $precio = $_POST['precio'];
                    $titulo = $_POST['titulo'];
                    $autor = $_POST['autor'];

                    $libroRepository = new LibroRepository();
                    $libro = $libroRepository->find($id);

                    $libro->setPrecio(intval($precio))
                        ->setTitulo($titulo)
                        ->setAutor($autor);

                    $LibroRepository->update($libro);
                    $LibroRepository->getConnection()->commit();

                } catch (Exception $exception) {
                    $LibroRepository->getConnection()->rollBack();
                    die('No se ha podido insertar el libro.');
                }

                MyLogger::createLog(
                    'Se ha insertado la imagen ' . $libro->getFoto());

                App::get('router')->redirect('libreria/' . $id);

            } else {
                $this->editarLibro($id, $errores);
            }
        }
    }

    public function buscar($titulo = '')
    {
        $this->listar($titulo);
    }
}