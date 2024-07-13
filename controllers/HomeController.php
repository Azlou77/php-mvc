<?php
require 'models/post.php';
function HomeController()
{
    $posts = getPosts();
    require 'views/home.php';
}
