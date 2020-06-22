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
            require('../view/front/allNews.php');
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
            require('../view/front/allNews.php');
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

    // si on trouve log-in dans l'action, on récupère le mail/identifiant et le mot de passe de l'utilisateur et on le compare?
    else if ($_GET['action'] == 'log-in') {
        if (isset($_GET['id']) && isset($_GET['password'])) {
            $id = $_GET['id'];
            $pwd = $_GET['password'];
            $userCtlr = new UsersController();
            $user = $userCtlr->logInUser($id, $pwd);
        }
    }

    // si on trouve subscribe dans l'action, on récupère le mail/identifiant et le mot de passe de l'utilisateur et on l'enregistre
    else if ($_GET['action'] == 'subscribe') {
        if ((isset($_POST['username']) && (isset($_POST['mail'])) && isset($_POST['password']) && isset($_POST['confirm-password']))) {
            $username = $_POST['username'];
            $mail = $_POST['mail'];
            $pwd = $_POST['password'];
            $confirmPwd = $_POST['confirm-password'];
            $userCtlr = new UsersController();
            $user = $userCtlr->subscribeUser($username, $mail, $pwd, $confirmPwd);
        } else {
            echo 'Informations incomplètes';
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
        require('../view/front/allNews.php');
    }

    // on affiche par défaut les dernières news
} else {
    $offset = 0;
    $newsCtlr = new NewsController();
    $news = $newsCtlr->getXNewsFrom($showNbNews + 1, $offset, true);
    require('../view/front/allNews.php');
}
