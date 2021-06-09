<?php
namespace DWES\core;

use DWES\app\controllers\AuthController;
use DWES\app\controllers\PagesController;
use Exception;

class Router
{
    private $routes = [
        'GET' => [],
        'POST' => [],
        'DELETE' => []
    ];

    public function get(string $uri, string $controller, string $action, string $role='ROLE_ANONIMO') {
        $this->routes['GET'][$uri] = [
            'controller' => $controller  . '@' . $action,
            'role' => $role
        ];
    }

    public function post(string $uri, string $controller, string $action, string $role='ROLE_ANONIMO') {
        $this->routes['POST'][$uri] = [
            'controller' => $controller  . '@' . $action,
            'role' => $role
        ];
    }

    public function delete(string $uri, string $controller, string $action, string $role='ROLE_ANONIMO') {
        $this->routes['DELETE'][$uri] = [
            'controller' => $controller  . '@' . $action,
            'role' => $role
        ];
    }

    public static function load(string $file)
    {
        $router = new static;
        App::bind('router', $router);
        require $file;
    }

    private function callAction(string $controller, string $action, array $parameters=[])
    {
        $objController = new $controller;
        if(!method_exists($objController, $action))
        {
            throw new Exception(
                "El controlador $controller no responde al action $action");
        }

        call_user_func_array([$objController, $action], $parameters);

        return true;
    }

    private function prepareRoute(string $route)
    {
        $urlRule = preg_replace (
            '/:([^\/]+)/',
            '(?<\1>[0-9]+)',
            $route
        );

        return str_replace ('/', '\/', $urlRule);
    }

    private function getParametersRoute(string $route, array $matches)
    {
        preg_match_all ('/:([^\/]+)/', $route, $parameterNames);

        return array_intersect_key ($matches, array_flip ($parameterNames[1]));
    }

    public function direct(string $uri, string $method) {

        foreach($this->routes[$method] as $route=>$data) {
            $urlRule = $this->prepareRoute($route);
            if (preg_match('/^' . $urlRule . '\/*$/s', $uri, $matches)) {
                $controller = $data['controller'];
                $role = $data['role'];

                if (Security::isUserGranted($role) === true) {
                    $parameters = $this->getParametersRoute($route, $matches);
                    list($controller, $action) = explode('@', $controller);

                    return $this->callAction($controller, $action, $parameters);
                } else {
                    if (! is_null (App:: get ('user')))
                        return $this->callAction(AuthController::class, 'unauthorized');
                    else
                        $this->redirect('login');
                }
            }
        }

        return $this->callAction(PagesController::class, 'notFound');
    }

    public function redirect(string $path)
    {
        header('location: /' . $path);
        exit;
    }
}
