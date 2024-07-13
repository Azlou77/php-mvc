<?php
require 'controllers/TestController.php';
require 'controllers/HomeController.php';

if ($_GET['action']) {
    // Define the path to use it in controller
    define('PATH', str_replace('index.php', "", $_SERVER['SCRIPT_FILENAME']));

    // Add parameters to the url like this http://localhost:8080/php-mvc/index.php?action=controller/method
    $params = explode("/", $_GET['action']);

    // Return the parameters first [0] : controller and second [1] method
    print_r($params);



    // Check if the parameters is not empty and take values
    if (!empty($params[0])) {
        $controller = $params[0];

        if (!empty($params[1])) {
            $action = $params[1];
            require_once(PATH . 'controllers/' . $controller . '.php');

            if ($action == 'getTest') {
                getTest();
            } else if ($action == 'getHome') {
                getHome();
            }
        }
    }
}
