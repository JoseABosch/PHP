<?php

namespace JOSE\app\controllers;

use JOSE\app\repository\UsuarioRepository;
use JOSE\core\App;
use JOSE\core\Response;
use JOSE\app\entity\Mensaje;
use JOSE\app\repository\MensajeRepository;
use Exception;
use ArrayObject;
use JOSE\app\helpers\MyMail;

class MensajeController
{
    public function formulario()
    {

        $nombre = '';
        $apellidos = '';
        $email = '';
        $asunto = '';
        $texto = '';
        $mensaje = '';
        $nuevo = '';

        $usuarioRepository = new UsuarioRepository();
        $usuarios = $usuarioRepository->findAllOrderBy('username');

        Response:: renderView('contact',
            [
                'nombre' => $nombre,
                'apellidos' => $apellidos,
                'email' => $email,
                'asunto' => $asunto,
                'texto' => $texto,
                'mensaje' => $mensaje,
                'nuevo' => $nuevo,
                'usuarios' => $usuarios
            ]);
    }

    public function nuevo()
    {

        $errores = [];
        $mensaje = '';
        $nombre = '';
        $apellidos = '';
        $email = '';
        $asunto = '';
        $texto = '';
        $nuevo = '';

        $usuarioRepository = new UsuarioRepository();
        $usuarios = $usuarioRepository->findAllOrderBy('username');

        try {
            $usuario = App::get('user');
            $mensajeRepository = new MensajeRepository();
            $conexion = $mensajeRepository->getConnection();
            $conexion->beginTransaction();

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $nombre = trim(htmlspecialchars($_POST['nombre']));
                $apellidos = trim(htmlspecialchars($_POST['apellidos']));
                $email = trim(htmlspecialchars($_POST['email']));
                $asunto = trim(htmlspecialchars($_POST['asunto']));
                $texto = trim(htmlspecialchars($_POST['texto']));

                if (empty($nombre))
                    $errores[] = "El nombre no se puede quedar vacío";

                if (empty($email))
                    $errores[] = "El e-mail no se puede quedar vacío";
                else {
                    if (filter_var($email, FILTER_VALIDATE_EMAIL) === false)
                        $errores[] = "El e-mail no es válido";
                }

                if (empty($asunto))
                    $errores[] = "El asunto no se puede quedar vacío";

                if (empty($errores)) {
                    $usuarioMensaje = $usuario->getId();

                    foreach ($usuarios as $usuario) {
                        if ($usuario->getUsername() === $nombre)
                            $receptor = $usuario->getId();
                    }

                    $mensaje = new Mensaje($nombre, $apellidos, $asunto, $email, $texto, $usuarioMensaje, $receptor);

                    $mensajeRepository->save($mensaje);
                    $conexion->commit();

                    $nuevo = "Tu mensaje se ha enviado";


                    try {
                        $mymail = new MyMail();
                        $mymail->send($mensaje->getAsunto(), $mensaje->getEmail(), 'pablonisen@gmail.com', $mensaje->getTexto());

                        $errores = [];
                        $mensaje = '';
                        $nombre = '';
                        $apellidos = '';
                        $email = '';
                        $asunto = '';
                        $texto = '';

                    } catch (Exception $e) {
                        //Error mail
                        //var_dump($e);
                    }
                }
            }
        } catch (Exception $exception) {
            $conexion->rollBack();
        }

        Response:: renderView('contact',
            [
                'errores' => $errores,
                'nombre' => $nombre,
                'apellidos' => $apellidos,
                'email' => $email,
                'asunto' => $asunto,
                'texto' => $texto,
                'mensaje' => $mensaje,
                'nuevo' => $nuevo,
                'usuarios' => $usuarios
            ]);


    }

    private function array_sort_by(&$arrIni, $col, $order = SORT_ASC)
    {
        $arrAux = array();
        foreach ($arrIni as $key => $row) {
            $arrAux[$key] = is_object($row) ? $arrAux[$key] = $row->$col : $row[$col];
            $arrAux[$key] = strtolower($arrAux[$key]);
        }
        array_multisort($arrAux, $order, $arrIni);
    }
}