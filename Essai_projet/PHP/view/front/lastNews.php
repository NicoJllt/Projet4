<html>
    <div class="blocpage">
        <head>
            <link rel="stylesheet" href="../../CSS/frontend/frontend.css"/>

            <title>Billet simple pour l'Alaska</title>
        </head>

        <body>

            <header>
                <h1 id="title">Billet simple pour l'Alaska</h1>
                <h2 id="author">Par Jean Forteroche</h2>
            </header>

            <section id="newsPreview">
            <?php
                foreach($news as $showNews)
            { ?>
                <h1 class="newsTitlePreview"><?= $showNews->title()?></h1>
                <article class="newsContentPreview"><?= $showNews->content()?></article>
                <button class="showNewsButton">Lire la suite</button>
            <?php } ?>
            </section>

        </body>
    </div>
</html>