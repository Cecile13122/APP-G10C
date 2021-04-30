<?php

require_once("requestsConnexion.php");
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" name="viewport"/>
    <link type="text/css" rel="stylesheet" href="styleForm.css"/>
    <link rel="shortcut icon" type="image/x-icon" href="ATC_v200.png"/>
    <title>Helitest</title>
</head>
<body>
<img src="ATC_v200.png" alt="Logo ATC">
<h1>Modifier son mot de passe</h1>
<form method="post" action="controlModifMdp.php">
    <table>
        <tr>
            <td class="critere"><label for="mdp">Mot de passe actuel :</label></td>
            <td><input type="password" id="mdp" name="mot_de_passe" placeholder="********" class="inputForm" required
                       pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&\._-])[A-Za-z\d@$!%*?&\._-]{8,}$"></td>
        </tr>
        <tr>
            <td class="critere"><label for="nmdp">Nouveau mot de passe :</label></td>
            <td><input type="password" id="nmdp" name="nouveau_mdp" placeholder="********" class="inputForm" required
                       pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&\._-])[A-Za-z\d@$!%*?&\._-]{8,}$"></td>
        </tr>
        <tr>
            <td class="critere"><label for="cnmdp">Confirmation de nouveau mot de passe :</label></td>
            <td><input type="password" id="cnmdp" name="conf_nouveau_mdp" placeholder="********" class="inputForm" required
                       pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&\._-])[A-Za-z\d@$!%*?&\._-]{8,}$"></td>
        </tr>
    </table>
    <input type="submit" value="Envoyer" class="buttonForm">
</form>
<div class="footerForm">
    <a href="cgu.php">CGU</a> | <a href="mentionsLegales.php">Mentions Légales</a>  |  <a href="planDuSite.php">Plan du site</a>
</div>
</body>
</html>