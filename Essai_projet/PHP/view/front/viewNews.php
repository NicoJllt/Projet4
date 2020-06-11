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

        <?php include("../template/templateHeader.php") ?>

        <section class="row">
            <div class="col-lg-12">
                <article id="episode-page-bloc">
                    <h1 class="news-title"><?= $news->title() ?></h1>
                    <div class="news-content"><?= $news->content() ?></div>
                </article>
            </div>
        </section>

        <section class="change-episode-buttons">
            <?php
            if (!is_null($news->previous())) { ?>
                <a href="index.php?action=showNewsNumber&id=<?= $news->previous() ?>">
                    <button class="previous-episode-button">Épisode précédent</button>
                </a>
            <?php } ?>
            <?php
            if (!is_null($news->next())) { ?>
                <a href="index.php?action=showNewsNumber&id=<?= $news->next() ?>">
                    <button class="next-episode-button">Épisode suivant</button>
                </a>
            <?php } ?>
        </section>

        <section class="row">
            <div class="col-lg-12">
                <div id="comment-page-bloc">
                    <div class="show-comments">
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
                    </div>

                    <div id="add-comment-bloc">
                        <form method="post" action="admin.php?action=addComment">
                            <h1>Laisser un commentaire</h1>

                            <textarea name="content" rows="5" cols="130"></textarea>

                            <div id="comment-form-button">
                                <button type="submit" value="Valider le commentaire">Valider</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

    </div>
</body>

</html>