<?php

namespace App\Controllers;

abstract class MainController
{
    public function render(string $path, array $params = [])
    {
        extract($params);
        ob_start();
        require 'View/' . $path . '.php';
        $content = ob_get_clean();
        require 'View/layout.php';
    }
}
