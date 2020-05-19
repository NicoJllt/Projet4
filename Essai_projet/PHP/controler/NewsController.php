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

    function getFirstNews() 
    {
        $news = $this->manager->firstNews();
        return $news;
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
        $this->manager->delete($id);
    }

    function getPreviousPage($nb, $offset)
    {
        $nb--;
        $offset =- 10;
        $news = $this->manager->changePage($nb, $offset);
        return $news;
    }

    function getNextPage($nb, $offset)
    {
        $nb++;
        $offset =+ 10;
        $news = $this->manager->changePage($nb, $offset);
        return $news;
    }

    function getPreviousEpisode($id) {
        $news = $this->manager->previousEpisode($id);
        return $news;
    }

    function getNextEpisode($id) {
        $news = $this->manager->nextEpisode($id);
        return $news;
    }

    // function updateNews($id)
    // {
    //     $news = $this->manager->update($id);
    //     return $news;
    // }
}