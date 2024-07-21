<?php

$title = "formulaire d'ajout";

ob_start();

?>


<form action="" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="title">title</label>

        <input type="text" class="form-control" id="title" name="title">
        <?php if (isset($errors['title'])) : ?>
            <span class="text-danger"><?= $errors['title'] ?></span>
        <?php endif; ?>


    </div>
    <div class="form-group">
        <label for="content">content</label>
        <textarea class="form-control" id="content" rows="3" name="content"></textarea>
        <?php if (isset($errors['content'])) : ?>
            <span class="text-danger"><?= $errors['content'] ?></span>
        <?php endif; ?>

    </div>
    <form>
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" class="form-control-file" id="image" name="file">
            <?php if (isset($errors['image'])) : ?>
                <span class="text-danger"><?= $errors['image'] ?></span>
            <?php endif; ?>

        </div>
        <div class="form-group">
            <input type="submit" name="submit">
        </div>
    </form>

    <?php
    $content = ob_get_clean();
    require_once 'layout.php';
    ?>