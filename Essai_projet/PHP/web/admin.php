<?php
// ROUTEUR ADMIN
require_once('../autoload.php');
require_once('../controler/NewsController.php');

require('../template/global.php');

if (isset($_GET['action'])) {
    if ($_GET['action'] == 'createNews') {
        if (isset($_POST['title']) && isset($_POST['content'])) {
            $newsCtlr = new NewsController();
            $news = $newsCtlr->createNews($_POST['title'], $_POST['content']);
            require('index.php');
        }
    } else if (($_GET['action']) == 'deleteNews') {
        $newsId = $_POST('id');
        $newsCtlr = new NewsController();
        $newsCtlr->deleteNews($newsId);
        require('index.php');
    } else if (($_GET['action']) == 'showMessages') {
        $msgCtrl = new MessagesController();
        $message = $msgCtrl->getMessages($id);

        if (!empty($message)) {
            require('../view/front/showMessages.php');
        } else {
            echo 'Aucun commentaire n\'a été trouvé';
        }
    } else if (($_GET['action']) == 'addComment') {
        if (isset($_POST['content'])) {
            $userName = $_GET['userName'];
            $dateMsg = $_GET['dateMessage'];
            $content = $_GET['content'];

            $msgCtrl = new MessagesController();
            $message = $msgCtlr->createMessage($_POST['userName'], $_POST['dateMessage'], $_POST['content']);
            require('index.php');
        }
    } else {
        require('../view/back/createNews.php');
    }
} else {
    require('../view/back/createNews.php');
}
