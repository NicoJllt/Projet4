<!DOCTYPE html>
<!-- PAGE SYNOPSIS -->
<html lang="fr">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Synopsis</title>
        <link rel="stylesheet" href="../../../CSS/frontend/frontend.css" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">        
        <link href="../../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    </head>

    <body>
        <div class="blocpage">
            <div class="background-image" >
                <img src="../../image-fond.jpeg" alt="background image"/>
            </div>            
            <header>
                <section class="row">
                    <div class="col-lg-12">
                        <nav class="summary">
                            <ul>
                                <li><a href="synopsis.php" class="synopsis-nav">Synopsis</a></li>
                                <li><a href="../../web/index.php" class="home-nav">Accueil</a></li>
                                <li><a href="../view/front/lastEpisodes.php" class="last-episodes-nav">Derniers épisodes</a></li>

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
                    <div id="title-framed">
                        <h1 id="book-title">Billet simple pour l'Alaska</h1>
                        <h2 id="book-author">Par Jean Forteroche</h2>
                    </div>
                </div>
            </section>

            
            <section id="synopsis-bloc">
                <section class="row">
                    <div class="col-lg-12">
                        <div id="synopsis-content">
                            <h1>Résumé de l'histoire</h1>
                            <p>CONTENU</p>
                        </div>
                    </div>
                </section>

                <section class="row">
                    <div class="col-lg-12">
                        <div id="synopsis-biography">
                            <h1>Biographie de l'auteur</h1>
                            <p>Bonjour, je suis Jean Forteroche, écrivain.</p>
                        </div>
                    </div>
                </section>
            </section>
        </div>
    </body>
</html>