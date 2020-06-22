<!DOCTYPE html>
<!-- PAGE DE CONNECTION AU SITE -->
<html lang="fr">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Connection</title>
    <link rel="stylesheet" href="../../CSS/frontend/frontend.css" />
    <link rel="stylesheet" href="../../CSS/backend/backend.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="blocpage">

        <?php include("../template/templateHeader.php") ?>

        <section class="row">
            <div class="col-lg-12">
                <form method="get" action="index.php?action=log-in">
                    <div id="log-in-form-bloc">
                        <h1 id="header-form-log-in">Identification</h1>

                        <h2 class="log-in-elements-form">Identifiant ou adresse mail</h2>
                        <input type="text" name="mail" placeholder="Votre identifiant ou mail" /><br>

                        <h2 class="log-in-elements-form">Mot de passe</h2>
                        <input type="password" name="password" placeholder="Votre mot de passe" /><br>

                        <div id="create-form-buttons">
                            <button type="reset" value="Annuler">Annuler</button>
                            <button type="submit" value="Valider">S'identifier</button>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>
</body>

</html>