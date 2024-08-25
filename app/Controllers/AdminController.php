<?php

namespace App\Controllers;

use App\Models\Posts;


class AdminController extends MainController
{
    public function posts()
    {

        $postsModel = new Posts();
        $posts = $postsModel->findAll();
        $this->render('listPost', ['posts' => $posts]);
    }
}
