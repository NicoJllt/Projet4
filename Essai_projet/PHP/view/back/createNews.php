<html>
    <div class="blocpageAdmin">
        <head>
            <link rel="stylesheet" href="../../../CSS/backend/backend.css"/>
            <title>Création d'une news</title>
        </head>

        <body>
            <form method="post" action="admin.php?action=createNews">
                <p id="newsForm">
                    <h1 id="createNewsTitleForm">Créer une news</h1>

                        <h2 class="createNewsForm">Titre de la news</h2>
                            <input type="text" name="title" placeholder="Title"/><br>

                        <h2 class="createNewsForm">Contenu de la news</h2>
                            <textarea name="content" placeholder="Message"></textarea><br>
                            <input id="bouton_form" type="submit" value="Create News"/>
                </p>
            </form>
        </body>
    </div>
</html>