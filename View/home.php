<?php
$title = "Home page";
ob_start()
?>


<div class="container">
    <div class="row">

        <!-- Loop through the posts and display them -->
        <?php foreach ($posts as $post) { ?>
            <div class="card" style="width:18rem">
                <div class="card-body">
                    <h5 class="card-title"><?= $post['title'] ?></h5>
                    <p class="card-text"><?= $post['content'] ?></p>
                    <p class="card-text"><small class="text-body-secondary"><?= $post['date'] ?></small></p>
                </div>
                <img src="https://placehold.co/250x250" class="card-img-bottom" alt="...">
            </div>
        <?php } ?>

    </div>
</div>

<?php
$content = ob_get_clean();
require 'layout.php';
?>