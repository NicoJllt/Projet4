<!DOCTYPE html>
<!-- PAGE DE CREATION D'UN EPISODE -->
<html lang="fr">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Création d'un épisode</title>
        <link rel="stylesheet" href="../../CSS/frontend/frontend.css" />
        <link rel="stylesheet" href="../../CSS/backend/backend.css"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">        
        <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script> 
        <script>tinymce.init({ selector:'textarea' });</script>
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
                                <li><a href="index.php" class="last-episodes-nav">Derniers épisodes</a></li>

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
                    <form method="post" action="admin.php?action=createNews">
                        <div id="news-form-bloc">                                                
                            <h1 id="header-form">Ajout d'un nouvel épisode</h1>

                            <h2 class="elements-form">Titre</h2>
                                <input type="text" name="title" placeholder="Titre de l'épisode"/><br>

                            <h2 class="elements-form">Contenu</h2>
                                <textarea name="content" rows="8" cols="30" placeholder="Contenu de l'épisode"></textarea><br>

                            <div id="button-form">
                                <button type="reset" value="Annuler">Annuler</button>
                                <button type="submit" value="Ajouter l'épisode">Ajouter l'épisode</button>
                            </div>
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </body>
</html>