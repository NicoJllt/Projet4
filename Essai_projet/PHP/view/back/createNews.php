<?php
if (isset($_POST['title']) && isset($_POST['content'])) {

    header('Location: http://www.nicoju.com/projet4/PHP/web/index.php');
    exit();

    $news->title($_POST['title']);
    $news->content($_POST['content']);
}
?>

<html>
    <div class="blocpageAdmin">
        <head>
            <link rel="stylesheet" href="../../../CSS/backend/backend.css"/>
            <title id="newsTitleAdmin">Création d'une news</title>
        </head>

        <body>
            <form method="post" action="admin.php?action=createNews">
                <p id="newsFormAdmin">
                    <h1>Créer une news</h1>

                        <h2>Titre de la news</h2>
                            <input type="text" name="title" placeholder="Title" /><br>

                        <h2>Contenu de la news</h2>
                            <textarea name="content" placeholder="Message"></textarea><br>
                            <input id="bouton_form" type="submit" value="Create News" />
                </p>
            </form>
        </body>
    </div>
</html>