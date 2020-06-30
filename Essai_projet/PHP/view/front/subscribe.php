<!DOCTYPE html>
<!-- PAGE D'INSCRIPTION AU SITE -->
<html lang="fr">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Inscription</title>
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
                <form method="post" action="../../web/index.php?action=subscribe">
                    <div id="subscribe-form-bloc">
                        <h1 id="header-form-subscribe">Inscription</h1>

                        <h2 class="subscribe-elements-form">Identifiant</h2>
                        <input type="text" name="username" placeholder="Votre identifiant" /><br>

                        <h2 class="subscribe-elements-form">Adresse mail</h2>
                        <input type="email" name="mail" placeholder="Votre adresse mail" /><br>

                        <h2 class="subscribe-elements-form">Mot de passe</h2>
                        <input type="password" name="password" placeholder="Votre mot de passe" /><br>

                        <h2 class="subscribe-elements-form">Confirmer le mot de passe</h2>
                        <input type="password" name="confirm-password" placeholder="Confirmer votre mot de passe" /><br>

                        <div id="subscribe-form-buttons">
                            <button type="reset" value="Annuler">Annuler</button>
                            <button type="submit" value="Valider">S'enregistrer</button>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>
</body>

</html>