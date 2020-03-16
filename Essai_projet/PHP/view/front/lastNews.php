<html>
    <head>
        <title>Accueil</title>
    </head>
    <body>
        <h1><?= $news->title()?></h1>
                <article><?= $news->content()?></article>

    <?php

    foreach($news as $showNews)
    {
        echo $showNews->content();
    }
    ?>

    </body>
</html>