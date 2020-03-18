<html>
    <head>
        <title>Accueil</title>
    </head>
    <body>
    
    <style>
    .news {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        margin-left: 25%;
        margin-right: 25%;
    }
    </style>

        <h1 class="news"><?= $news->title()?></h1>
                <article class="news"><?= $news->content()?></article>

    <?php

    foreach($news as $showNews)
    {
        echo $showNews->content();
    }
    ?>

    </body>
</html>