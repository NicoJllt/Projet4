<html>
<!-- PAGE D'ACCUEIL -->
    <div class="blocpage">
        <head>
            <title>Billet simple pour l'Alaska</title>
            <meta charset="utf-8">
            <link href="../../CSS/frontend/frontend.css" rel="stylesheet" />
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        </head>

        <body>

            <header>
                <h1 id="title">Billet simple pour l'Alaska</h1>
                <h2 id="author">Par Jean Forteroche</h2>
            </header>

            <section id="newsPreview">

            <div class="col-md-8">
            <?php
                foreach($news as $showNews)
            { ?>
                <h1 class="newsTitlePreview"><?= $showNews->title()?></h1>
                <article class="newsContentPreview"><?= $showNews->content()?></article>
                <button class="showNewsButton">Lire la suite</button>
            <?php } ?>
            </div>

            </section>

        </body>
    </div>
</html>