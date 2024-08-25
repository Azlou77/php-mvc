<?php

namespace App\Database;

use PDO;
use PDOException;


class DBConnection
{

    private const DBNAME  = "blog";
    private const DBHOST = "localhost";
    private const  USERNAME = "root";
    private const PASSWORD = "";

    private  static $connexion;


    public function __construct()
    {
        $dns = "mysql:dbname=" . self::DBNAME . ";host=" . self::DBHOST;
        try {
            self::$connexion = new PDO($dns, self::USERNAME, self::PASSWORD);
            self::$connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public static function getPDO()
    {
        if (self::$connexion === null) {
            self::$connexion = new DBConnection();
        }
        return self::$connexion;
    }
}
