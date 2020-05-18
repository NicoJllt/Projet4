<!DOCTYPE html>
<!-- PAGE D'ACCUEIL -->
<html lang="fr">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Les derniers épisodes</title>
        <link rel="stylesheet" href="../../CSS/frontend/frontend.css" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">        
        <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    </head>

    <body>
        <div class="blocpage">

        <?= include("../template/templateHeader.php") ?>

        <?= include("../template/templateShowNews.php") ?>

            <footer>
                <section class="row">
                    <div class="col-lg-12">
                        <div id="change-page">
                            <ul>
                                <li><a href="index.php?action=previousPage&offset=10"><button class="previous-episodes-button">Épisodes précédents</button></a></li>
                                <li><a href="index.php?action=nextPage&offset=10"><button class="next-episodes-button">Épisodes suivants</button></a></li>
                            </ul>
                        </div>
                    </div>
                </section>
            </footer>
        </div>
    </body>
</html>