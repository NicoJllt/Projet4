<?php
// CONTROLLER DES NEWS

require ('News.php');
require ('NewsManager_PDO.php');

class NewsController
{
    private $manager;

    function __construct()
    {
        $db = DBFactory::getPDOConnection();
        $this->manager = new NewsManager_PDO($db);
    }

    function getLastNews() 
    {
        $news = $this->manager->lastNews();
        return $news;
    }
}