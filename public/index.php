<?php

use JOSE\app\repository\UsuarioRepository;
use JOSE\core\App;
use JOSE\core\Request;
use JOSE\core\Router;

require __DIR__ . '/../core/bootstrap.php';

if (isset($_SESSION['usuario']))
{
    $usuario = App::getRepository(UsuarioRepository::class)->find(
        $_SESSION['usuario']
    );
}
else
    $usuario = null;

App::bind('user', $usuario);

Router::load (__DIR__. '/../app/routes.php');

App::get('router')->direct(Request::uri(), Request::method());