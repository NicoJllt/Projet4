<?php
// ROUTEUR
require('autoload.php');
require('./news/NewsController.php');

// if (isset($_GET['action'])) {
//     if ($_GET['action'] === "homepage") {
//         $data = homePage($_GET['search']);
//     } 
// } else {
//     require("homepage.html");
// }

if (isset($_GET['action']))
{
    if ($_GET['action'] == 'showNews')
    {
        $newsCtlr = new NewsController();
        $news = $newsCtlr->getLastNews();
        require('view.php');
    } else {
        echo 'Aucune news n\'a été trouvée';
    }
} else {
    $newsCtlr = new NewsController();
    $news = $newsCtlr->getLastNews();
    // require('view.php');
    echo $news;
}