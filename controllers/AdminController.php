<?php
require_once 'models/post.php';
function getListPosts()
{
    $posts = getPosts();
    require 'views/listPost.php';
}

function addPostPage()
{
    $title = $content = $image = "";
    if (!empty($_POST['title']) && !empty($_POST['content'])) {
        $title = $_POST['title'];
        $content = $_POST['content'];
    } else {
        die("Error: missing title or content");
    }
    $success = addPosts($title, $content, $image);
    if (!$success) {
        die("Error: could not add post");
    } else {
        header("Location: /php-mvc/AdminController/getListPosts");
    }
    require "views/formPost.php";
}
