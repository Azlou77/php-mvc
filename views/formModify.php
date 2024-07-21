<?php

$title = "formulaire de modification";

ob_start();

?>


<form action="/php-mvc/AdminController/modifyPostPage" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="title">title</label>

        <input type="text" class="form-control" id="title" name="title">
    </div>
    <div class="form-group">
        <label for="content">content</label>
        <textarea class="form-control" id="content" rows="3" name="content"></textarea>
    </div>
    <form>
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" class="form-control-file" id="image" name="file">
        </div>
        <div class="form-group">
            <input type="submit" name="submit">
        </div>
    </form>

    <?php
    $content = ob_get_clean();
    require_once 'layout.php';
    ?>