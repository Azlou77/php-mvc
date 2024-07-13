<?php

require 'connexion.php';

function getPosts()
{
    $connexion = connectBdd();
    $request = "SELECT * from post";
    $request = $connexion->query($request);
    $results = $request->fetchAll(PDO::FETCH_ASSOC);
    return $results;
}

function addPosts($title, $content, $image)
{
    $date = ('Y-m-d-h-m-i');
    $connexion = connectBdd();
    $request = $connexion->prepare("INSERT INTO post (post_id, title, content, image, date ) VALUES (null, ?, ?, ?, ?)");
    $affectedLines = $request->execute([$title, $content, $image, $date]);
    return $affectedLines > 0;
}
