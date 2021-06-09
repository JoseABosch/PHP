<?php

namespace DWES\app\controllers;

use DWES\app\BLL\LibroBLL;
use DWES\core\App;
use DWES\core\Response;
use DWES\app\entity\Libro;
use DWES\app\helpers\MyLogger;
use DWES\app\repository\LibroRepository;
use DWES\app\repository\EditorialRepository;
use Exception;

class LibroController
{
    public function listar($titulo = '')
    {

        if(!empty($titulo))
        {
            //Filtrar por habitacion solo
            $editorialRepository = new EditorialRepository();
            $editoriales = $editorialRepository->findAll();

            $libroRepository = new LibroRepository();

            $libros = $libroRepository->findAllEqual(["titulo"], [$titulo],[],'precio',"ASC");

            if(sizeof($libros) == 0) {App::get('router')->redirect('');}
            else{
                Response:: renderView('index',
                    [
                        'libros' => $libros,
                        'editoriales' => $editoriales
                    ]);
            }

        }
        else
        {
            $editorialRepository = new EditorialRepository();
            $editoriales = $editorialRepository->findAll();

            $libroRepository = new LibroRepository();
            $libros = $libroRepository->findAll();
            //$libros = $libroRepository->findAllEqual([], [],[],'precio',"ASC");

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

        if($usuario->getRole() === "ROLE_ADMIN")
            //$casas = $casaRepository->findAll();
            $libros = $libroRepository->findAllOrderByDesc('id');

        else
        {
            $libros = $libroRepository->findBy([
                'usuario' => $usuario->getId()
            ]);
            $libros = array_reverse($libros);
        }


        Response:: renderView('libreria',
            [
                'libros' => $libros,
                'editoriales' => $editoriales,
                'errores' => $errores,
            ]);
    }

    public function nuevoLibro()
    {
        $LibroRepository = new LibroRepository();

        $errores =  [];
        if(!isset($_POST['precio']) ||  !is_numeric($_POST['precio'])) array_push($errores,'El campo precio es obligatorio');
        if(!isset($_POST['editorial']) || strlen($_POST['editorial']) == 0) array_push($errores,'El campo editorial es obligatorio');
        if(!isset($_POST['titulo']) || strlen($_POST['titulo']) == 0) array_push($errores,'El campo título es obligatorio');
        if(!isset($_POST['autor']) || strlen($_POST['autor']) == 0) array_push($errores,'El campo autor es obligatorio');

        if(sizeof($errores) == 0)
        {
            try {
                $usuario = App::get('user');
                $LibroRepository->getConnection()->beginTransaction();
                $precio = $_POST['precio'];
                $editorialLibro = $_POST['editorial'];
                $titulo = $_POST['titulo'];
                $autor = $_POST['autor'];
                $imagenBLL = null;
                $nombre = "";
                if(isset($_FILES['imagen']) && sizeof($_FILES['imagen']) > 0)
                {
                    $imagenBLL = new LibroBLL($_FILES['imagen']);
                    $imagenBLL->uploadImagen();
                    $nombre = $imagenBLL->getUploadedFileName();
                }

                $libro = new Libro();

                $libro->setPrecio(intval($precio))
                    ->setEditorial($editorialLibro)
                    ->setTitulo($titulo)
                    ->setEditorial($editorialLibro)
                    ->setAutor($autor)
                    ->setUsuario($usuario->getId());

                if(strlen($nombre) > 0)
                {
                    $libro->setFoto($nombre);
                }


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
                die('No se ha podido insertar la libro');
            }

            /*MyLogger::createLog(
                'Se ha insertado una nueva imagen llamada ' . $libro->getFoto());*/

            //App::get('router')->redirect('viviendas');
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

            if($usuario ->getId() !== $libro->getUsuario() && $usuario->getRole() !== "ROLE_ADMIN")
                throw new Exception('No se permite borrar libros que no se pertenezcan al usuario');

            $libroRepository->delete($libro);
            $editorialRepository = new EditorialRepository();
            /** @var Editorial $editorial */
            $editorial = $editorialRepository->find($libro->getEditorial());
            $editorial->setNumLibros(
                $editorial->getNumLibros()-1
            );
            $editorialRepository->update($editorial);
            $libroRepository->getConnection()->commit();
        } catch(Exception $exception) {
            $libroRepository->getConnection()->rollBack();
            die('No se ha podido borrar la imagen');
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

        echo json_encode([
            'error' => false,
            'mensaje' => "El libro con id $id se ha eliminado correctamente"
        ]);
    }

    public function comprarLibro()
    {
       /* $usuario = App::get('user');
        //var_dump($_POST['idCasa'], );
        //echo $_POST['idCasa'] . "<br>";
        //echo $usuario->getId();

        if(isset($_POST['idLibro']) != null)
        {
            $libroRepository = new LibroRepository();
            $libro = $libroRepository->find($_POST['idLibro']);
            $idLibro = $_POST['idLibro'];
            $libro->setComprador($usuario->getId());
            $libroRepository->update($libro);

        }

        //
        App::get('router')->redirect('');*/
    }

    public function editarLibro($id,$errores = null)
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
            if(isset($_POST['id']) && strlen($_POST['id']) > 0)
            {


                $errores = [];
                if(!isset($_POST['precio']) ||  !is_numeric($_POST['precio'])) array_push($errores,'El campo precio es obligatorio');
                if(!isset($_POST['titulo']) || strlen($_POST['titulo']) == 0) array_push($errores,'El campo título es obligatorio');
                if(!isset($_POST['autor']) || strlen($_POST['autor']) == 0) array_push($errores,'El campo autor es obligatorio');


                if(sizeof($errores) == 0) {
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
                        die('No se ha podido insertar el libro');
                    }

                    /*MyLogger::createLog(
                        'Se ha insertado una nueva imagen llamada ' . $libro->getFoto());*/

                        App::get('router')->redirect('libreria/' . $id);

                }
                else{
                    $this->editarLibro($id, $errores);
                }
            }
    }

    public function buscar($titulo = '')
    {
        $this->listar($titulo);
    }
}