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
