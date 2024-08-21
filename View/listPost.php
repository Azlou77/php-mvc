<?php

$title = "List of Posts";

ob_start();

?>


<table class="table">
    <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Titre</th>
            <th scope="col">Content</th>
            <th scope="col">Date</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>

        <?php foreach ($posts as $post) { ?>
            <tr>
                <th scope="row"><?= $post->post_id;  ?></th>
                <td><?= $post->title;  ?></td>
                <td><?= $post->content;  ?></td>
                <td><?= $post->date;  ?></td>
                <td><a href="/php-mvc/AdminController/modifyPostPage/<?= $post->post_id;  ?>" class="btn btn-warning">modifier</a><a href="/php-mvc/AdminController/deletePostPage/<?= $post->post_id  ?>" class="btn btn-danger">supprimer</td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<a href="/php-mvc/AdminController/addPostPage" class="btn btn-primary"> Create posts</a>

<?php
$content = ob_get_clean();

require_once 'layout.php';
?>