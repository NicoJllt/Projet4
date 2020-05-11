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
                    <article id="episode-page-bloc">  
                        <h1 class="news-title"><?= $news->title()?></h1>
                        <p class="news-content"><?= $news->content()?></p>
                        <button class="next-episode-button">Épisode suivant</button>
                    </article>
                </div>
            </section>
        </div>
    </body>
</html>