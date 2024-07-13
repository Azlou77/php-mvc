<?php
require_once 'models/post.php';
function getListPosts()
{
    $posts = getPosts();
    require 'views/listPost.php';
}
