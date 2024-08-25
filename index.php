<?php
require 'app/Controllers/MainController.php';
require 'app/Controllers/AdminController.php';

use App\Controllers\AdminController;
use App\Controllers\MainController;




if (isset($_GET['action'])) {
    define('PATH', str_replace('index.php', "", $_SERVER['SCRIPT_FILENAME']));
    $params = explode("/", $_GET['action']);
    print_r($params);

    if (!empty($params[0])) {
        $controllerName = $params[0] . 'Controller';
        $action = $params[1];
        if (file_exists(PATH . 'app/Controllers/' . $controllerName . '.php')) {
            require PATH . 'app/Controllers/' . $controllerName . '.php';
            $controller = new $controllerName();
            if (method_exists($controller, $action)) {
                $controller->$action();
            }
        } else {
            echo "Action $action not found in controller $controllerName.";
        }
    } else {
        echo "Controller $controllerName not found.";
    }
}
