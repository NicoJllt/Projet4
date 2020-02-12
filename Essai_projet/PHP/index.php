<?php
// ROUTEUR
require('autoload.php');

if (isset($_GET['action'])) {
    if ($_GET['action'] === "homepage") {
        $data = homePage($_GET['search']);
    } 
} else {
    require("homepage.html");
}
