<html>
    <head>
        <title>Accueil</title>
    </head>
    <body>
        <h1>News</h1>
            <h2>Titre news 1</h2>
                <article>Contenu</article>

    <?php

    foreach($news as $showNews)
    {
        echo $showNews->content();
    }
    ?>

    </body>
</html>