<?php
session_start();
if (empty($_SESSION)){
    include_once("headerNonConnecte.php");
}
elseif ($_SESSION['role']=="candidat"){
include_once("headerCandidat.php");}
elseif ($_SESSION['role']=="recruteur"){
    include_once("headerRecruteur.php");
}
        ?>
      <div class="main">
        <a href="accueil.php" class="link">Accueil</a><br>
        <a href="connexion.php" class="link">Connexion</a><br>
        <a href="inscription.php" class="link">Inscription</a><br>
        <a href="modificationProfil.php" class="link">Modification du profil</a><br>
        <a href="modificationMdp.php" class="link">Modification du mot de passe</a><br>
        <a href="resultat.php" class="link">Résultats</a><br>
        <a href="test.php" class="link">Test</a><br>
        <a href="faq.php" class="link">FAQ</a><br>
        <a href="contact.php" class="link">Contact</a><br>
        <a href="mentionsLegales.php" class="link">Mentions Légales</a><br>
        <a href="cgu.php" class="link">Conditions Générales d'Utilisation</a><br>
      </div>
      <div class="footer"><a href="cgu.php">CGU</a>  |  <a href="mentionsLegales.php">Mentions Légales</a>  |  <a href="planDuSite.php">Plan du site</a></div>
    </body>
</html>
