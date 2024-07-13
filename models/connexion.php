<?php

function  connectBdd()
{

    $dbname = "blog";
    $dbhost = "localhost";
    $username = "root";
    $password = "";

    $dns = "mysql:host=$dbhost;dbname=$dbname;charset=UTF8";
    try {

        $connexion = new PDO($dns, $username, $password);
        $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $connexion;
    } catch (PDOException $e) {
        die('Erreur : ' . $e->getMessage());
    }
}

$connexion = connectBdd();
