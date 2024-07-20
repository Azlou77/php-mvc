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
    $date = 'Y-m-d h-m-i';
    $connexion = connectBdd();
    $request = "INSERT INTO post (title, content, image, date) VALUES (:title, :content, :image, :date)";
    $request = $connexion->prepare($request);
    $request->bindParam(':title', $title);
    $request->bindParam(':content', $content);
    $request->bindParam(':image', $image);
    $request->bindParam(':date', $date);
    $success = $request->execute();
    return $success;
}

function modifyPosts($id, $title, $content, $image)
{
    $connexion = connectBdd();
    $request = "UPDATE post SET title = :title, content = :content, image = :image WHERE id = :id";
    $request = $connexion->prepare($request);
    $request->bindParam(':id', $id);
    $request->bindParam(':title', $title);
    $request->bindParam(':content', $content);
    $request->bindParam(':image', $image);
    $success = $request->execute();
    return $success;
}
