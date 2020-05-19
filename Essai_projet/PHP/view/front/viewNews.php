<!DOCTYPE html>
<!-- PAGE EPISODE -->
<html lang="fr">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Billet simple pour l'Alaska</title>
        <link rel="stylesheet" href="../../CSS/frontend/frontend.css" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">        
        <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    </head>

    <body>
        <div class="blocpage">

        <?= include("../template/templateHeader.php") ?>

            <section class="row">
                <div class="col-lg-12">
                    <article id="episode-page-bloc">  
                        <h1 class="news-title"><?= $news->title()?></h1>
                        <div class="news-content"><?= $news->content()?></div>

                        <a href="index.php?action=previousEpisode&previous=<?= $news->previous()?>">
                        <button class="next-episode-button">Épisode précédent</button>
                        </a>
                        <a href="index.php?action=nextEpisode&next=<?= $news->next()?>">
                        <button class="next-episode-button">Épisode suivant</button>
                        </a>
                    </article>
                </div>
            </section>
        </div>
    </body>
</html>