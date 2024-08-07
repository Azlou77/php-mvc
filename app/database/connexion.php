<?php

namespace App\Database;

use PDO;


class Connexion
{

    private string $dbname  = "blog";
    private string $dbhost = "localhost";
    private string  $username = "root";
    private string $password = "";

    private  $connexion;


    public function __construct($dbname, $dbhost, $username, $password)
    {
        $this->dbname = $dbname;
        $this->dbhost = $dbhost;
        $this->username = $username;
        $this->password = $password;
    }

    public function getPDO()
    {
        if ($this->connexion === null) {
            $this->connexion = new PDO("mysql:dbname={$this->dbname};host={$this->dbhost}", $this->username, $this->password);
            $this->connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->connexion;
        }
    }
}
