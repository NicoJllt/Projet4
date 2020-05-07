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

            <img class="background-image" src="../image-fond.jpeg" alt="background image"/>

            <header>
                <section class="row">
                    <div class="col-lg-12">
                        <nav class="summary">
                            <ul>
                                <li><a href="../view/front/synopsis.php" class="synopsis-nav">Synopsis</a></li>
                                <li><a href="index.php" class="home-nav">Accueil</a></li>
                                <li><a href="index.php?action=showLastNews" class="last-episodes-nav">Derniers épisodes</a></li>

                                <li><input type="search" class="site-search-nav" name="q" aria-label="Search"></li>
                                <li><button type="submit" class="register-nav">S'inscrire</button></li>
                                <li><button type="submit" class="connection-nav">Se connecter</button></li>
                                <!-- <li><p>Bienvenue <//?= $user->userId()?></p></li> -->
                                <li><button type="submit" class="logout-nav">Se déconnecter</button></li>
                            </ul>
                        </nav>
                    </div>
                </section>
            </header>

            <section class="row">
                <div class="col-lg-12">
                    <div class="title-framed">
                        <h1 class="book-title">Billet simple pour l'Alaska</h1>
                        <h2 class="book-author">Par Jean Forteroche</h2>
                    </div>
                </div>
            </section>
                
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