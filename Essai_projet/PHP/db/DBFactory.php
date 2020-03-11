<?php

class DBFactory
{
    public static function getPDOConnection() {
        
        // Connexion à la BDD MySQL sur 1&1
        $dataBase = new PDO('mysql:host=db5000269963.hosting-data.io;dbname=dbs263509;charset=utf8', 'dbu427269', 'nicoAsc159vhu753kom0@');
        
        $dataBase->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        return $dataBase;
    }
}
