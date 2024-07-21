<?php
require 'controllers/TestController.php';
require 'controllers/HomeController.php';
require 'controllers/AdminController.php';

if ($_GET['action']) {
    // Define the path
    define('PATH', str_replace('index.php', "", $_SERVER['SCRIPT_FILENAME']));

    // Get the parameters
    $params = explode("/", $_GET['action']);

    // Expected  : Array ( [0] => AdminController [1] => getListPosts )
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
            } else if ($action == 'getListPosts') {
                getListPosts();
            } else if ($action === 'addPostPage') {
                addPostPage();
            } else if ($action === 'modifyPostPage') {
                if (!empty($params[2])) {
                    $id = $params[2];
                    modifyPostPage($id);
                }
            }
        }
    }
}
