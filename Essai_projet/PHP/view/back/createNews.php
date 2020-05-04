<html>
<!-- PAGE DE CREATION D'UN EPISODE -->
    <head>
        <title>Création d'un épisode</title>
        <link rel="stylesheet" href="../../CSS/frontend/frontend.css" />
        <link rel="stylesheet" href="../../CSS/backend/backend.css"/>
        <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
        <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    </head>

    <body>
        <div class="blocpage-form-admin">
            <header>
                <img src="../image-fond.jpeg" id="background-image" class="background-image" alt="background image"/>
                <section class="row">
                    <div class="col-lg-12">
                        <nav id="summary">
                            <ul>
                                <li><a href="../view/front/synopsis.php" id="synopsis-nav">Synopsis</a></li>
                                <li><a href="index.php" id="home-nav">Accueil</a></li>
                                <li><a href="../view/front/lastEpisodes.php" id="last-episodes-nav">Derniers épisodes</a></li>

                                <li><input type="search" id="site-search-nav" name="q" aria-label="Search"></li>
                                <li><button type="submit" id="register-nav">S'inscrire</button></li>
                                <li><button type="submit" id="connection-nav">Se connecter</button></li>
                                <!-- <li><p>Bienvenue <//?= $user->userId()?></p></li> -->
                                <li><button type="submit" id="logout-nav">Se déconnecter</button></li>
                            </ul>
                        </nav>
                    </div>
                </section>
            </header>

            <section class="row">
                <div class="col-lg-12">
                    <form method="post" action="admin.php?action=createNews">
                        <div id="news-form-bloc">                                                
                            <h1 id="header-form">Ajout d'un nouvel épisode</h1>

                            <h2 class="elements-form">Titre</h2>
                                <input type="text" name="title" placeholder="Titre de l'épisode"/><br>

                            <h2 class="elements-form">Contenu</h2>
                                <textarea name="content" rows="8" cols="30" placeholder="Contenu de l'épisode"></textarea><br>

                            <div id="button-form">
                                <button type="submit" value="Annuler">Annuler</button>
                                <button type="submit" value="Ajouter l'épisode">Ajouter l'épisode</button>
                            </div>
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </body>
</html>