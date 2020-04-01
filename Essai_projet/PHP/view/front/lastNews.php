<html>
    <div class="blocpage">
        <head>
            <link rel="stylesheet" href="../../CSS/frontend/frontend.css"/>
            <title>Accueil</title>
        </head>

        <body>
            <?php
            foreach($news as $showNews)
            { ?>
                    <h1 class="newsTitle"><?= $showNews->title()?></h1>
                    <article class="newsContent"><?= $showNews->content()?></article>
            <?php } ?>
        </body>
    </div>
</html>