<?php

use Model\Posts;

function getHome()
{
    $posts = getPosts();
    require 'views/home.php';
}
