<?php
// ROUTEUR
require('./autoload.php');
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
        require('./view/front/lastNews.php');
    } else {
        echo 'Aucune news n\'a été trouvée';
    }
} else {
    $newsCtlr = new NewsController();
    $news = $newsCtlr->getLastNews();
    require('./view/front/lastNews.php');
}

if ($_GET['action'] == 'idNews')
    {
        $newsCtlr = new NewsController();
        $news = $newsCtlr->getNews();
        require('./view/front/viewNews.php');
    }