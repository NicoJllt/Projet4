<?php
// ROUTEUR
require_once('../autoload.php');
require_once('../controler/NewsController.php');

if (isset($_GET['action']))
{
    // S'il y a une action et si l'action est "showNews" : on affiche les dernières news
    if ($_GET['action'] == 'showNews')
    {
        $newsCtlr = new NewsController();
        $news = $newsCtlr->getFirstNews();
        
        if (!empty($news)) {
            require('../view/front/firstNews.php');
        } else {
            echo 'Aucun épisode n\'a été trouvé';
        }
    }

    // S'il y a une action et si l'action est "showLastNews" : on affiche les dernières news
    if ($_GET['action'] == 'showLastNews')
    {
        $newsCtlr = new NewsController();
        $news = $newsCtlr->getLastNews();
        
        if (!empty($news)) {
            require('../view/front/lastNews.php');
        } else {
            echo 'Aucun épisode n\'a été trouvé';
        }
    }

    // si on trouve /showNewsNumber/ dans l'action, on récupère l'id de la news correspondante et on l'affiche
    else if (($_GET['action']) === 'showNewsNumber')
    {
        $newsId = $_GET['id'];
        $newsCtlr = new NewsController();
        $news = $newsCtlr->getNews($newsId);
        require('../view/front/viewNews.php');
    } 
    // on affiche par défaut les dernières news
} else {
    $newsCtlr = new NewsController();
    $news = $newsCtlr->getFirstNews();
    require('../view/front/firstNews.php');
}