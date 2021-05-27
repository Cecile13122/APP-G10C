<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" name="viewport"/>
    <link type="text/css" rel="stylesheet" href="styleForm.css"/>
    <link rel="shortcut icon" type="image/x-icon" href="../Images/ATC_v200.png"/>
    <script src="verificationFormulaire.js" type="text/javascript"></script>
    <title>Helitest</title>
</head>
<body>
<a href="accueil.php"><img src="../Images/ATC_v200.png" alt="Logo ATC"></a>
<h1>Connexion</h1>
<form method="post" action="../Controler/controlConnexion.php">
    <label for="email">Adresse mail :<br>
        <input id="email" type="email" name="email" placeholder="exemple@mail.com" class="inputForm" required
               pattern="^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$">
    </label>
    <br>
    <label>Mot de passe :<br>
        <input type="password" name="mot_de_passe" placeholder="********" class="inputForm" required
               pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&\._-])[A-Za-z\d@$!%*?&\._-]{8,}$">
    </label><br>
    <span class="erreur"><?php
              if (isset($_GET['err'])) {
    if ($_GET['err'] == 1) {
        echo "Votre identifiant et/ou votre mot de passe sont incorrects.";
    }
}?>
          </span>
    <p>Pas encore de compte ? <a href="inscription.php" class="underline">S'inscrire.</a></p>
    <input type="submit" value="Envoyer" class="buttonForm">
</form>
<div class="footerForm"><a href="cgu.php">CGU</a> | <a href="mentionsLegales.php">Mentions Légales</a> | <a
            href="planDuSite.php">Plan du site</a></div>
</body>
</html>
