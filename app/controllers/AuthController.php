<?php


namespace DWES\app\controllers;

use DWES\app\entity\Usuario;
use DWES\app\repository\UsuarioRepository;
use DWES\core\App;
use DWES\core\Response;
use DWES\core\Security;

class AuthController
{
    public function login($errores = null)
    {
        $usuario = App::get('user');

        if (is_null($usuario))
            Response::renderView('login',
            [
                'errores' => $errores,
            ]);
        else
            App::get('router')->redirect('libreria');
    }

    public function checkLogin()
    {
        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';

        if(strlen($username) == 0 || strlen($password) == 0)
        {
            $errores[] = "Debes introducir un usuario";
            $this->login($errores);
            return;
        }
        $usuario = App::getRepository(UsuarioRepository::class)->findOneBy([
            'username' => $username
        ]);

        if(is_null($usuario))
        {
            $errores[] = "El usuario no existe";
            $this->login($errores);

        }
        else{
            if (Security:: checkPassword(
                    $password,
                    $usuario->getPassword()
                )=== true)
            {
                $_SESSION['usuario'] = $usuario->getId();
                App::get('router')->redirect('libreria');
            }
            else
            {
                $errores[] = "Contraseña incorrecta";
                $this->login($errores);

            }

        }

    }

    public function logout()
    {
        $_SESSION['usuario'] = null;
        unset($_SESSION['usuario']);

        App::get('router')->redirect('login');
    }

    public function registro($errores = null)
    {
        $nuevo = '';
        $username = '';
        $usuario = App::get('user');

        if (is_null($usuario))
            Response::renderView('registro',
                [
                    'errores' => $errores,
                    'nuevo' => $nuevo,
                    'username' => $username
                ]);
        else
            App::get('router')->redirect('libreria');
    }

    public function checkRegistro()
    {
        $errores = [];
        $nuevo = '';
        $username = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST')
            $username = $_POST['username'];


        //validacion
        if(!isset($_POST['username']) || empty($_POST['username']))
            $errores[] = "El nombre no se puede quedar vacío";

        if(!isset($_POST['password']) || empty($_POST['password']))
            $errores[] = "El password no se puede quedar vacío";

        if(!isset($_POST['re-password']) || empty($_POST['re-password'])
            || $_POST['password'] !== $_POST['re-password'])
            $errores[] = "Ambos passwords deben coincidir";

        //

        //Comprobar en bd
        $usuarios = App::getRepository(UsuarioRepository::class)->findBy(['username' => $_POST['username']]);

        if(sizeof($usuarios) > 0)
        {
            $errores[] = "Usuario ya existe.";

        }


        if (empty($errores)) {
            $password = $_POST['password'];
            $passwordEncriptado = Security::encrypt($password);
            $usuario = new Usuario();
            $usuario->setUsername($_POST['username']);
            $usuario->setRole('ROLE_USER');
            $usuario->setPassword($passwordEncriptado);

            App::getRepository(UsuarioRepository::class)->save($usuario);

            $this->checkLogin(); //Se entra a la parte privada sin pasar por el login
        }
        else {

            $this->registro($errores);
        }
    }

    public function unauthorized()
    {
        header ('HTTP/1.1 403 Forbidden', true, 403);
        Response:: renderView ('403');
    }
}