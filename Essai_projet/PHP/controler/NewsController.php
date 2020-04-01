<?php
// CONTROLLER DES NEWS

require_once('../entity/News.php');
require_once('../model/NewsManager_PDO.php');
require_once('../db/DBFactory.php');

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

    function getNews($id) 
    {
        $news = $this->manager->getUnique($id);
        return $news;
    }

    function createNews($title, $content)
    {
        $create = new News(array('title' => $title, 'content' => $content));
        $this->manager->save($create);
        return $create;
    }

    function deleteNews($id)
    {
        $news = $this->manager->delete($id);
        return $news;
    }

    function updateNews($id)
    {
        $news = $this->manager->update($id);
        return $news;
    }
}