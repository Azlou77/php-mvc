<?php

namespace App\Controller;

abstract class Controller
{
    public function render(string $path, array $params = [])
    {
        extract($params);
        ob_start();
        require 'views/' . $path . '.php';
        $content = ob_get_clean();
        require 'views/layout.php';
    }
}
