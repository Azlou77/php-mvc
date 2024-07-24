<?php
require_once 'models/post.php';
function getListPosts()
{
    $posts = getPosts();
    require_once  'views/listPost.php';
}

function addPostPage()
{
    if (!empty($_POST) and !empty($_FILES)) {
        if (validation() == false) {
            addPosts($_POST['title'], $_POST['content'], $_FILES['file']['name']);
            header("Location: /php-mvc/AdminController/getListPosts");
        }
    }

    require_once "views/formPost.php";
}


function validation()
{
    if (!empty($_FILES['file']['name'])) {
        // récupération du nom du fichier dans la variable $nom_du_fichier
        $nom_du_fichier = $_FILES['file']['name'];
        // récupération du type du fichier dans la variable $type_du_fichier
        $type_du_fichier = $_FILES['file']['type'];
        //récupération du dossier temporaire
        $dossier_temporaire = $_FILES['file']['tmp_name'];
        //récupération du dossier d'upload
        $dossier_uploads = 'assets/uploads/' . $nom_du_fichier;

        $extension_du_fichier = strrchr($nom_du_fichier, '.');
        $extensions_autorisees = array('.jpg', '.JPG', '.jpeg', '.png', '.PNG');
    }
    $error = false;

    if (!isset($_POST['title']) || strlen($_POST['title']) < 1) {
        echo "<span class='alert alert-danger mr-5'>le titre est invalide</span>";
        $error =  true;
    }

    if (!isset($_POST['content']) || strlen($_POST['content']) < 1) {
        echo "<span class='alert alert-danger mr-5'>le contenu est invalide</span>";
        $error =  true;
    }

    if (!empty($_FILES['file']['name'])) {
        if (!in_array($extension_du_fichier, $extensions_autorisees)) {
            echo "l'extension n'est pas autorisée";
            $error = true;
        }
    }

    if (!empty($_FILES['file']['name'])) {
        if (move_uploaded_file($dossier_temporaire, $dossier_uploads)) {
            echo "le fichier a été uploadé avec succès";
        } else {
            echo "Echec de l'upload";
            $error = true;
        }
    }

    return $error;
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
            echo  "Error: title too short";
        } else {
            $title = test_input($_POST['title']);
            if (!$validedTitle) {
                echo  "Error: title contains only letters and white spaces";
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
function deletePostPage($id)
{
    $post = getPostsInfo($id);
    unlink("assets/uploads/" . $post['image']);
    deletePost($id);
    header("Location: /php-mvc/AdminController/getListPosts");
}
