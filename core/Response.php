<?php

namespace DWES\core;

class Response
{
    public static function renderView(string $name, array $data = [])
    {
        extract($data);

        $_usuario = App:: get('user');

        ob_start();
        require __DIR__ . "/../app/views/$name.view.php";
        $mainContent = ob_get_clean();
        require __DIR__ . '/../app/views/layout.view.php';
    }
}