<?php
// ROUTEUR
require_once('../autoload.php');
require_once('../controler/NewsController.php');
require_once('../controler/UsersController.php');

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
            $error = 'Aucun épisode n\'a été trouvé';
            require('../view/front/error.php');
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
            $error = 'Aucun épisode n\'a été trouvé';
            require('../view/front/error.php');
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
            $error = 'L\'épisode n\'existe plus';
            require('../view/front/error.php');
        }
    } else if ($_GET['action'] == 'subscribe-page') {
        require('../view/front/subscribe.php');
    } else if ($_GET['action'] == 'login-page') {
        require('../view/front/log-in.php');
    } else if ($_GET['action'] == 'logout') {
        require('../view/front/allNews.php');
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
            if (!is_null($user)) {
                header('Location: index.php');
            } else {
                $error = 'Il manque des informations.';
                require('../view/front/error.php');
            }
        } else {
            $error = 'Informations incomplètes.';
            require('../view/front/error.php');
        }
    }

    // si on trouve log-in dans l'action, on récupère le mail/identifiant et le mot de passe de l'utilisateur et on le compare?
    else if ($_GET['action'] == 'log-in') {
        if (isset($_GET['id']) && isset($_GET['password'])) {
            $userId = new Users();
            if (preg_match($_GET['id'], '@', $id)) {
                $userId->mail($id);
            } else {
                $userId->username($id);
            }

            $pwd = $_GET['password'];
            $isPasswordCorrect = password_verify($pwd, $pass_hache);

            $userCtlr = new UsersController();
            $user = $userCtlr->logInUser($id, $isPasswordCorrect);
        } else {
            $error = 'Informations incomplètes';
            require('../view/front/error.php');
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
