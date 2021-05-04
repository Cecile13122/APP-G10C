<?php
require_once("Model/requestsCandidat.php");
session_start();
$info_candidat = recuperation_profil($_SESSION['mail']);

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" name="viewport"/>
    <link type="text/css" rel="stylesheet" href="styleForm.css"/>
    <link rel="shortcut icon" type="image/x-icon" href="../Images/ATC_v200.png"/>
    <title>Helitest</title>
</head>
<body>
<img src="../Images/ATC_v200.png" alt="Logo ATC">
<h1>Modifier ses informations</h1>
<form method="post" action="../Controler/controlModifProfil.php">
    <table>
        <tr>
            <td class="critere"><label for="firstname">Prénom :</label></td>
            <td><input id="firstname" type="text" name="prenom" value="<?= $info_candidat['prenom'] ?>"
                       class="inputForm" required pattern="^[A-Za-zÜ-ü'-]+( *[A-Za-zÜ-ü'-]+)*$"></td>
        </tr>
        <tr>
            <td class="critere"><label for="name">Nom :</label></td>
            <td><input id="name" type="text" name="nom" value="<?= $info_candidat['nom'] ?>" class="inputForm" required pattern="^[A-Za-zÜ-ü'-]+( *[A-Za-zÜ-ü'-]+)*$">
            </td>
        </tr>
        <tr>
            <td class="critere"><label for="tel">Numéro de téléphone :</label></td>
            <td><input type="text" id="tel" name="telephone" class="inputForm"
                       value="<?= $info_candidat['numero_tel'] ?>" class="inputForm" required pattern="(0|\+33) *[1-9]( *[0-9]{2}){4}"></td>
        </tr>
        <tr>
            <td class="critere"><label for="cp">Code postal :</label></td>
            <td><input type="text" id="cp" name="code_postal" value="<?= $info_candidat['code_postal'] ?>"
                       class="inputForm" required pattern="\d{5,6}"></td>
        </tr>
        <tr>
            <td class="critere"><label for="mail">Adresse mail :</label></td>
            <td><input id="mail" type="email" name="email" value="<?= $info_candidat['mail_candidat'] ?>"
                       class="inputForm" required pattern="^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$"></td>
        </tr>
        <tr>
            <td class="critere"><label for="cmail">Confirmation d'adresse mail :</label></td>
            <td><input id="cmail" type="email" name="confemail" value="<?= $info_candidat['mail_candidat'] ?>"
                       class="inputForm" required pattern="^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$"></td>
        </tr>
        <tr>
            <td class="critere"><label for="mdp">Mot de passe actuel :</label></td>
            <td><input type="password" id="mdp" name="mot_de_passe" placeholder="********" class="inputForm" required
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
