<?php
// ROUTEUR
require_once('../autoload.php');
require_once('../controler/NewsController.php');

require('../template/global.php');

if (isset($_GET['action'])) {
    // S'il y a une action et si l'action est "showNews" : on affiche les premières news
    if ($_GET['action'] == 'showNews') {
        $offset = $_GET['offset'];
        $newsCtlr = new NewsController();
        $news = $newsCtlr->getXNewsFrom($showNbNews + 1, $offset, true);

        if (!empty($news)) {
            require('../view/front/showNews.php');
        } else {
            echo 'Aucun épisode n\'a été trouvé';
        }
    }

    // S'il y a une action et si l'action est "showLastNews" : on affiche les dernières news
    else if ($_GET['action'] == 'showLastNews') {
        $offset = 0;
        $newsCtlr = new NewsController();
        $news = $newsCtlr->getXNewsFrom($showXLastNews, $offset, false);

        if (!empty($news)) {
            require('../view/front/showNews.php');
        } else {
            echo 'Aucun épisode n\'a été trouvé';
        }
    }

    // si on trouve showNewsNumber dans l'action, on récupère l'id de la news correspondante et on l'affiche
    else if (($_GET['action']) == 'showNewsNumber') {
        $newsId = $_GET['id'];
        $newsCtlr = new NewsController();
        $news = $newsCtlr->getNews($newsId);

        if (!empty($news)) {
            require('../view/front/viewNews.php');
        } else {
            echo 'L\'épisode n\'existe plus';
        }
    }

    // Si l'action est "synopsis" : on affiche la page synopsis
    else if ($_GET['action'] == 'synopsis') {
        require('../view/front/synopsis.php');
    }

    // sinon on affiche les dernières news
    else {
        $offset = 0;
        $newsCtlr = new NewsController();
        $news = $newsCtlr->getXNewsFrom($showNbNews + 1, $offset, true);
        require('../view/front/showNews.php');
    }

    // on affiche par défaut les dernières news
} else {
    $offset = 0;
    $newsCtlr = new NewsController();
    $news = $newsCtlr->getXNewsFrom($showNbNews + 1, $offset, true);
    require('../view/front/showNews.php');
}
