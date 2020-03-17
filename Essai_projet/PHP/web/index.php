<?php
// ROUTEUR
require('../autoload.php');
require('../news/NewsController.php');

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
        require('../view/front/lastNews.php');
    } 
    else if (preg_match(("showNewsNumber|"), $_GET['action']))
    {
        $newsIdTable = explode("|", $_GET['action']);
        $newsId = $newsIdTable[1];
        return $newsIdTable;
        $newsCtlr = new NewsController();
        $news = $newsCtlr->getNews($id);
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

