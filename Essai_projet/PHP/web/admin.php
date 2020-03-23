<?php
// ROUTEUR
require('../autoload.php');
require('../controler/NewsController.php');

if (isset($_GET['action']))
{
    if ($_GET['action'] == 'createNews')
    {
        $newsCtlr = new NewsController();
        $news = $newsCtlr->getLastNews();
        require('../view/front/lastNews.php');
    } 
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
} else {
    $newsCtlr = new NewsController();
    $news = $newsCtlr->getLastNews();
    require('../view/front/lastNews.php');
}