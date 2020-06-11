<?php

class DBFactory
{
    public static function getPDOConnection()
    {

        require 'dbdata.php';

        // Connexion à la BDD MySQL sur 1&1
        $dataBase = new PDO("$dbtype:host=$host; dbname=$dbname; charset=$charset", $login, $pwd);

        $dataBase->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $dataBase;
    }
}
