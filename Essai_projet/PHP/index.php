<?php
// ROUTEUR
require('autoload.php');
require('NewsController.php');

if (isset($_GET['action'])) {
    if ($_GET['action'] === "homepage") {
        $data = homePage($_GET['search']);
    } 
} else {
    require("homepage.html");
}

if (isset($_GET['action']))
{
    if ($_GET['action'] == 'showNews')
    {
        getLastNews();
    } else {
        echo 'Aucune news n\'a été trouvée';
    }
} else {
    getLastNews();
}