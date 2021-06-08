<?php

use JOSE\app\controllers\AuthController;
use JOSE\app\controllers\LibroController;
use JOSE\app\controllers\MensajeController;
use JOSE\app\controllers\PagesController;
use JOSE\core\App;

$router = App::get('router');

$router->get('', LibroController::class, 'listar');
$router->get('about-us', PagesController::class, 'aboutUs');
$router->get('libreria', LibroController::class, 'formularioLibro', 'ROLE_USER');
$router->get('libreria/:id', LibroController::class, 'show');
$router->get('libreria-editar/:id', LibroController::class, 'editarLibro');
$router->post('libreria-update', LibroController::class, 'actualizarLibro','ROLE_USER');
$router->get('libreria/:id/delete', LibroController::class, 'delete', 'ROLE_USER');
$router->get('blog-details', 'controllers/blog-details.php', '');
$router->get('contact', MensajeController::class, 'formulario', 'ROLE_USER');
$router->get('login', AuthController::class, 'login');
$router->post('login', AuthController::class, 'checkLogin');
$router->get('registro', AuthController::class, 'registro');
$router->post('check-registro', AuthController::class, 'checkRegistro');
$router->get('logout', AuthController::class, 'logout', 'ROLE_USER');
$router->post('contact', MensajeController::class, 'nuevo');
$router->get('main', PagesController::class, 'main');
$router->get('property', PagesController::class, 'property', 'ROLE_USER');
$router->get('property-details', PagesController::class, 'propertyDetails', 'ROLE_USER');
$router->post('libreria', LibroController::class, 'nuevoLibro', 'ROLE_USER');
$router->post('', LibroController::class, 'comprarLibro', 'ROLE_USER');
$router->delete('libreria/:id', LibroController::class, 'deleteJson', 'ROLE_USER');

$router->get('buscar/:titulo', LibroController::class, 'listar');
