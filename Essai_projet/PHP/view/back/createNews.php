<html>
    <div class="blocpageAdmin">
        <head>
            <link rel="stylesheet" href="../../../CSS/backend/backend.css"/>
            <title>Création d'une news</title>
        </head>

        <body>
            <form method="post" action="admin.php?action=createNews">
                <div id="newsForm">
                    <h1 id="createNewsTitleForm">Créer une news</h1>

                    <h2 class="createNewsElementsForm">ID de l'épisode :</h2>
                        <input type="text" name="id" placeholder="L'id"/><br>

                    <h2 class="createNewsElementsForm">Titre de l'épisode :</h2>
                        <input type="text" name="title" placeholder="Le titre"/><br>

                    <h2 class="createNewsElementsForm">Contenu de l'épisode :</h2>
                        <textarea name="content" placeholder="Message"></textarea><br>
                        <input >

                    <div class="button-form">
                        <button type="submit" value="Ajouter l'épisode">Ajouter l'épisode</button>
                    </div>
                </div>
            </form>
        </body>
    </div>
</html>