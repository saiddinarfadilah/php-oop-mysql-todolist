<?php

namespace Config;

class Database
{
    public static function getConnection():\PDO
    {
        $host = "localhost";
        $dbname = "php-mysql-todolist";
        $username = "root";
        $password = "root";

        return new \PDO("mysql:host=$host;dbname=$dbname",$username, $password);
    }
}