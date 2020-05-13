<!DOCTYPE html>
<!-- PAGE D'ACCUEIL -->
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
            
        <?= include("../view/front/template.php") ?>
                
            <section class="news-preview-bloc">
                <section class="row">
                <?php
                    foreach($news as $showNews)
                { ?>
                    <div class="col-md-6">
                        <a href="index.php?action=showNewsNumber&id=<?= $showNews->newsId()?>">
                            <article class="news-preview">
                                <div class="news-preview-marge">
                                    <h1 class="news-title-preview"><?= $showNews->title()?></h1>
                                    <p class="news-content-preview"><?= substr($showNews->content(), 0, 250).'...'?></p>
                                </div>
                            </article>
                        </a>
                    </div>
                <?php } ?>
                </section>
            </section>

            <footer>
            </footer>
        </div>
    </body>
</html>