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
        $news = $newsCtlr->getLastNews();
        require('../view/front/lastNews.php');
    } 
    // si on trouve /showNewsNumber/ dans l'action, on récupère l'id de la news correspondante et on l'affiche
    else if (preg_match(("/showNewsNumber|/"), $_GET['action']))
    {
        $newsIdTable = explode("|", $_GET['action']);
        $newsId = $newsIdTable[1];
        $newsCtlr = new NewsController();
        $news = $newsCtlr->getNews($newsId);
        require('../view/front/viewNews.php');
    } 
    else
    {
        echo 'Aucune news n\'a été trouvée';
    }
    // on affiche par défaut les dernières news
} else {
    $newsCtlr = new NewsController();
    $news = $newsCtlr->getLastNews();
    require('../view/front/lastNews.php');
}