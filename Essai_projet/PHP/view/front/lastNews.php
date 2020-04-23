<html>
<!-- PAGE D'ACCUEIL -->
    <div class="blocpage">
        <head>
            <title>Billet simple pour l'Alaska</title>
            <link rel="stylesheet" href="../../CSS/frontend/frontend.css" />
            <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
            <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
        </head>

        <body>
            <header>
                <img src="../image-fond.jpeg" id="background-image" class="background-image" alt="background image"/>
                <section class="row">
                    <div class="col-lg-12">
                        <nav id="summary">
                            <ul>
                                <li><a href="http://www.nicoju.com/projet4/PHP/view/front/synopsis.php" id="synopsis">Synopsis</a></li>
                                <li><a href="http://www.nicoju.com/projet4/PHP/web/index.php" id="home">Accueil</a></li>
                                <li><a href="http://nicoju.com/projet4/PHP/view/front/lastEpisodes.php" id="last-episodes">Derniers épisodes</a></li>

                                <li><input type="search" id="site-search" name="q" aria-label="Search"></li>
                                <li><button type="submit" id="register">S'inscrire</button></li>
                                <li><button type="submit" id="connection">Se connecter</button></li>
                                <!-- <li><p>Bienvenue <//?= $user->userId()?></p></li> -->
                                <li><button type="submit" id="logout">Se déconnecter</button></li>
                            </ul>
                        </nav>
                    </div>
                </section>

                <section class="row">
                    <div class="col-lg-12">
                        <div id="title-framed">
                            <h1 id="title">Billet simple pour l'Alaska</h1>
                            <h2 id="author">Par Jean Forteroche</h2>
                        </div>
                    </div>
                </section>
            </header>
                    
                <form action="http://www.nicoju.com/projet4/PHP/view/front/viewNews.php" method="get">
                <section id="news-preview-bloc">
                    <section class="row">
                    <?php
                        foreach($news as $showNews)
                    { ?>
                        <div class="col-md-offset-1 col-md-5">
                            <div id="news-preview">
                                <h1 class="newsTitlePreview"><?= $showNews->title()?></h1>
                                <article class="newsContentPreview"><?= $showNews->content(substr($content, 0, 250).'...')?></article>
                            </div>
                        </div>
                    <?php } ?>
                    </section>
                </section>
                </form>

                <footer>
                    <section class="row">
                        <div class="col-lg-12">
                            <div id="next-page">
                                <ul>
                                    <li><button>1</button></li>
                                    <li><button>2</button></li>
                                    <li><button>3</button></li>
                                </ul>
                            </div>
                        </div>
                    </section>
                </footer>
        </body>
    </div>
</html>