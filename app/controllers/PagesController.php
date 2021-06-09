<?php


namespace DWES\app\controllers;

use DWES\core\Response;

class PagesController
{
    public function aboutUs()
    {
        require __DIR__ . '/../views/about-us.view.php';
    }

    public function property()
    {
        Response:: renderView('property', []);
    }

    public function propertyDetails()
    {
        Response:: renderView('property-details', []);
    }

    public function main()
    {
        require __DIR__ . '/../views/main.view.php';
    }

    public function notFound()
    {
        header ('HTTP/1.1 404 Not Found', true, 404);
        Response:: renderView ('404');
    }

}