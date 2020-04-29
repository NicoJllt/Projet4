<html>
    <div class="blocpage">
        <head>
            <title>Billet simple pour l'Alaska</title>
            <link rel="stylesheet" href="../../CSS/frontend/frontend.css" />
            <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
            <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
        </head>

        <body>
            <header>
                <div id="title-framed">
                    <h1 id="title">Billet simple pour l'Alaska</h1>
                    <h2 id="author">Par Jean Forteroche</h2>
                </div>
            </header>

                <article>  
                    <h1 class="newsTitle"><?= $news->title()?></h1>
                    <p class="newsContent"><?= $news->content()?></p> 
                </article>
                
        </body>
    </div>
</html>