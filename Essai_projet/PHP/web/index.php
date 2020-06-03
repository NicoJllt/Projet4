<?php
// ROUTEUR
require_once('../autoload.php');
require_once('../controler/NewsController.php');

if (isset($_GET['action'])) {
    // S'il y a une action et si l'action est "showNews" : on affiche les premières news
    if ($_GET['action'] == 'showNews') {
        $offset = $_GET['offset'];
        $newsCtlr = new NewsController();
        $news = $newsCtlr->getXNewsFrom(10, $offset, true);

        if (!empty($news)) {
            require('../view/front/showNews.php');
        } else {
            echo 'Aucun épisode n\'a été trouvé';
        }
    }

    // S'il y a une action et si l'action est "showLastNews" : on affiche les dernières news
    else if ($_GET['action'] == 'showLastNews') {
        $newsCtlr = new NewsController();
        $news = $newsCtlr->getXNewsFrom(2, 0, false);

        if (!empty($news)) {
            require('../view/front/showNews.php');
        } else {
            echo 'Aucun épisode n\'a été trouvé';
        }
    }

    // si on trouve showNewsNumber dans l'action, on récupère l'id de la news correspondante et on l'affiche
    else if (($_GET['action']) === 'showNewsNumber') {
        $newsId = $_GET['id'];
        $newsCtlr = new NewsController();
        $news = $newsCtlr->getNews($newsId);

        if (!empty($news)) {
            require('../view/front/viewNews.php');
        } else {
            echo 'L\'épisode n\'existe plus';
        }
    }
    
    // // si on trouve l'action previousPage on affiche la page précédente
    // else if (($_GET['action']) === 'previousPage')
    // {
    //     $offset = $_GET['offset'];
    //     $newsCtlr = new NewsController();
    //     $news = $newsCtlr->getPreviousPage(10, $offset); 
    //     require('../view/front/firstNews.php');
    // }

    // // si on trouve l'action nextPage on affiche la page suivante
    // else if (($_GET['action']) === 'nextPage') 
    // {
    //     $offset = $_GET['offset'];
    //     $newsCtlr = new NewsController();
    //     $news = $newsCtlr->getNextPage(10, $offset); 
    //     require('../view/front/firstNews.php');
    // }

    // // si on trouve l'action previousEpisode on affiche l'épisode précédent
    // else if (($_GET['action']) === 'previousEpisode')
    // {
    //     $previousId = $_GET['previous'];
    //     $newsCtlr = new NewsController();
    //     $news = $newsCtlr->getPreviousEpisode($previousId);
    //     require('../view/front/viewNews.php');
    // }

    // // si on trouve l'action nextEpisode on affiche l'épisode suivant
    // else if (($_GET['action']) === 'nextEpisode')
    // {
    //     $nextId = $_GET['next'];
    //     $newsCtlr = new NewsController();
    //     $news = $newsCtlr->getNextEpisode($nextId);
    //     require('../view/front/viewNews.php');
    // }

    // Si l'action est "synopsis" : on affiche la page synopsis
    else if ($_GET['action'] === 'synopsis') {
        require('../view/front/synopsis.php');
    } else {
        $offset = 0;
        $newsCtlr = new NewsController();
        $news = $newsCtlr->getXNewsFrom(10, $offset, true);
        require('../view/front/showNews.php');
    }

    // on affiche par défaut les dernières news
} else {
    $offset = 0;
    $newsCtlr = new NewsController();
    $news = $newsCtlr->getXNewsFrom(10, $offset, true);
    require('../view/front/showNews.php');
}
