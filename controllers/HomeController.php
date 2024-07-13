<?php
require 'models/post.php';
function getHome()
{
    $posts = getPosts();
    require 'views/home.php';
}
