<?php
// ROUTEUR ADMIN
require('../autoload.php');
require('../controler/NewsController.php');

if (isset($_GET['action']))
{
    if ($_GET['action'] == 'createNews')
    {
        $newsCtlr = new NewsController();
        $news = $newsCtlr->createNews();
        require('../view/back/createNews.php');
    } else if ($_GET['action'] == 'deleteNews')
    {
        $newsCtlr = new NewsController();
        $news = $newsCtlr->deleteNews($id);
        require('../view/back/deleteNews.php');
    } else if ($_GET['action'] == 'updateNews')
    {
        $newsCtlr = new NewsController();
        $news = $newsCtlr->updateNews($id);
        require('../view/back/updateNews.php');
    }
} else 
{
    echo 'Impossible d\'ajouter une news';
}