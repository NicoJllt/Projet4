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
                    <h1 class="news-title"><?= $news->title() ?></h1>
                    <div class="news-content"><?= $news->content() ?></div>

                    <?php
                    if ($newsId >= 2) { ?>
                        <a href="index.php?action=showNewsNumber&id=<?= $news->previous() ?>">
                            <button class="next-episode-button">Épisode précédent</button>
                        </a>
                    <?php } ?>
                    <?php
                    if (isset($newsId)) { ?>
                        <a href="index.php?action=showNewsNumber&id=<?= $news->next() ?>">
                            <button class="next-episode-button">Épisode suivant</button>
                        </a>
                    <?php } ?>
                </article>
            </div>
        </section>

        <section class="row">
            <div class="col-lg-12">
                <div id="comment-page-bloc">
                    <a href="index.php?action=showMessages">
                        <div id="show-comments-button">Afficher les commentaires</div>
                    </a>
                    <?php
                    foreach ($message as $showMessage) {
                    ?>
                        <div class="comment-bloc">
                            <div class="message-user-name"><?= $showMessage->userName() ?></div>
                            <div class="message-date"><?= date_parse($showMessage->dateMessage()) ?></div>
                            <p class="message-content"><?= $showMessage->content() ?></p>
                        </div>
                        </a>
                    <?php } ?>

                    <form method="post">
                    <div id="add-comment-bloc">
                        <h1 id="header-form-comment">Ajouter un commentaire</h1>

                        <input type="text" name="comment" value="Ajouter un commentaire" placehorder="Ajouter un commentaire" id="add-comment-text" />

                        <div id="comment-form-button">
                            <button type="submit" value="Ajouter le commentaire" action="admin.php?action=addComment">Ajouter le commentaire</button>
                        </div>
                    </div>
                </form>

                </div>
            </div>
        </section>
    </div>
</body>

</html>