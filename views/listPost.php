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
                <th scope="row"><?php echo $post['post_id']; ?></th>
                <td><?php echo $post['title'];  ?></td>
                <td><?php echo $post['content'];  ?></td>
                <td><?php echo $post['date'];  ?></td>
                <td><a href="" class="btn btn-warning">modifier</a><a href="" class="btn btn-danger">supprimer</td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<a href="" class="btn btn-primary"> Create posts</a>

<?php
$content = ob_get_clean();

require_once 'layout.php';
?>