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
        $errors = [];

        if (isset($_POST['title']) && strlen($_POST['title']) === 0) {
            $errors['title'] = "Error: title too short";
        }
        if (isset($_POST['content']) && strlen($_POST['content']) === 0) {
            $errors['content'] = "Error: content too short";
        }
        if (isset($_FILES['file']['name']) && strlen($_FILES['file']['name']) === 0) {
            $errors['image'] = "Error: missing image";
        }

        if (empty($errors)) {
            addPosts($_POST['title'], $_POST['content'], $_FILES['file']['name']);
        }
        // Vérifiez la fonction de validation ici
    }

    require_once "views/formPost.php";
}


// function validation()
// {

//     $title = $content = $image = "";
//     $isFormValid = true;

//     if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
//         $errors = [];
//         if (!empty($_POST['title'])) {
//             $title = $_POST['title'];
//         } else {
//             $isFormValid = false;
//             $errors['title'] = "Error: missing title";
//         }
//     }



//     if (!empty($_POST['content'])) {
//         $content = $_POST['content'];
//     } else {
//         $isFormValid = false;
//         $errors['content'] = "Error: missing content";
//     }
//     if (!empty($_FILES['file']['name'])) {
//         $image = $_FILES['file']['name'];
//     } else {
//         $isFormValid = false;
//         $errors['image'] =  "Error: missing image";
//     }



//     return $isFormValid;
// }

function modifyPostPage($id)
{
    $post = getPostsInfo($id);
    $title = $content = $image = "";
    if (!empty($_POST['title']) && !empty($_POST['content'])) {
        $title = $_POST['title'];
        $content = $_POST['content'];
    } else {
        die("Error: missing title or content");
    }
    $success = modifyPosts($id, $title, $content, $image);
    if (!$success) {
        die("Error: could not modify post");
    } else {
        header("Location: /php-mvc/AdminController
        /getListPosts");
    }
    require_once "views/formModify.php";
}
