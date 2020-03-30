<?php
// ROUTEUR ADMIN
require('../autoload.php');
require('../controler/NewsController.php');

if (isset($_GET['action']))
{
    if ($_GET['action'] == 'createNews')
    {
        $newsCtlr = new NewsController();
        $news = $newsCtlr->createNews($_POST['title'], $_POST['content']);
        require('index.php');
        // if (true) {
        //     echo 'La news a bien été ajoutée.';
        // } else {
        //     echo 'Impossible d\'ajouter une news.';
        // }
    // } else if ($_GET['action'] == 'deleteNews') {
    //     $newsCtlr = new NewsController();
    //     $news = $newsCtlr->deleteNews($id);
    //     require('../view/back/deleteNews.php');
    //     if (true) {
    //         echo 'La news a bien été supprimée.';
    //     } else {
    //         echo 'Impossible de supprimer cette news.';
    //     }
    // } else if ($_GET['action'] == 'updateNews') {
    //     $newsCtlr = new NewsController();
    //     $news = $newsCtlr->updateNews($id);
    //     require('../view/back/updateNews.php');
    //     if (true) {
    //         echo 'La news a bien été mise à jour.';
    //     } else {
    //         echo 'Impossible de mettre à jour cette news.';
    //     }
    }

} else {
    require('../view/back/createNews.php');
}