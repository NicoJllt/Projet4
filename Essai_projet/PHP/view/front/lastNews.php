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

<?php

foreach($news as $showNews)
{ ?>
        <h1 class="news"><?= $showNews->title()?></h1>
                <article class="news"><?= $showNews->content()?></article>
<?php } ?>

    </body>
</html>