<?php
require_once 'models/post.php';
function getListPosts()
{
    $posts = getPosts();
    require_once  'views/listPost.php';
}

function addPostPage()
{


    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Title: : contains only letters and white spaces
        // Sanitize the title
        $sanitizedTitle = filter_var($_POST['title'], FILTER_SANITIZE_SPECIAL_CHARS);

        // Validate the title
        $validedTitle = preg_match("/^[a-zA-Z ]*$/", $sanitizedTitle);
        $errors = [];

        if (isset($_POST['title']) && strlen($_POST['title']) === 0) {
            $errors['title'] = "Error: title too short";
        } else {
            $title = test_input($_POST['title']);
            if (!$validedTitle) {
                $errors['title'] = "Error: title contains only letters and white spaces";
            }
        }
        if (isset($_POST['content']) && strlen($_POST['content']) === 0) {
            $errors['content'] = "Error: content too short";
        } else {
            $content = test_input($_POST['content']);
        }
        if (isset($_FILES['file']['name']) && strlen($_FILES['file']['name']) === 0) {
            $errors['image'] =  "Error: missing image";
        } else if (isset($_FILES['file']['name']) && strlen($_FILES['file']['name']) > 0) {
            validation();
        } else {
            $image = test_input($_FILES['file']['name']);
        }
        if (empty($errors)) {
            addPosts($_POST['title'], $_POST['content'], $_FILES['file']['name']);
            header("Location: /php-mvc/AdminController/getListPosts");
        }
        // Vérifiez la fonction de validation ici
    }

    require_once "views/formPost.php";
}


function validation()
{
    $path_directory = "assets/uploads/";
    $path_file = $path_directory . basename($_FILES['file']['name']);
    $temp_directory = $_FILES['file']['tmp_name'];
    $size_file = $_FILES['file']['size'];
    $errors = [];


    // Check size of file
    if ($size_file > 500000) {
        $errors['image'] =  "Sorry, your file is too large.";
    }

    // Allow certain file formats
    $file_extension = strrchr($path_file, ".");
    $allowed_extensions = array(".jpg", ".png", ".jpeg", ".gif");
    if (!in_array($file_extension, $allowed_extensions)) {
        $errors['image'] =  "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    }


    if (empty($errors) == true) {
        move_uploaded_file($temp_directory, $path_file);
        $errors['image'] = "Success";
    }

    // Display errors message size, format, success in view
    foreach ($errors as $error) {
        echo "<span class='alert alert-danger'>$error</span>";
    }
}
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function modifyPostPage($id)
{
    $post = getPostsInfo($id);
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Title: : contains only letters and white spaces
        // Sanitize the title
        $sanitizedTitle = filter_var($_POST['title'], FILTER_SANITIZE_SPECIAL_CHARS);

        // Validate the title
        $validedTitle = preg_match("/^[a-zA-Z ]*$/", $sanitizedTitle);
        $errors = [];

        if (isset($_POST['title']) && strlen($_POST['title']) === 0) {
            $errors['title'] = "Error: title too short";
        } else {
            $title = test_input($_POST['title']);
            if (!$validedTitle) {
                $errors['title'] = "Error: title contains only letters and white spaces";
            }
        }
        if (isset($_POST['content']) && strlen($_POST['content']) === 0) {
            $errors['content'] = "Error: content too short";
        } else {
            $content = test_input($_POST['content']);
        }
        if (isset($_FILES['file']['name']) && strlen($_FILES['file']['name']) === 0) {
            $errors['image'] =  "Error: missing image";
        } else if (isset($_FILES['file']['name']) && strlen($_FILES['file']['name']) > 0) {
            validation();
            $image = test_input($_FILES['file']['name']);
        } else {
            $image = $post['image'];
        }
        if (empty($errors)) {
            modifyPosts($id, $image, $_POST['title'], $_POST['content']);
            header("Location: /php-mvc/AdminController/getListPosts");
        }
    }

    require_once "views/formModify.php";
}
