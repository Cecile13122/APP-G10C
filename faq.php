<?php
require_once('requestsFaq.php');
$faq=recuperation_faq();
$themes= $faq[0];
$donne_faq= $faq[1];
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" name="viewport"/>
        <link rel="stylesheet" type="text/css" href="style.css"/>
        <title>Helitest</title>
    </head>
    <body>
      <div class="navbar">
        <img src="ATC_v200.png" alt="Logo ATC">
        <a href="resultats.html" >Résultats</a>
        <a href="test.html">Test</a>
        <a class="active" href="faq.php">FAQ</a>
        <a href="contact.html">Contact</a>
        <a href="#recherche"><textarea name="informations" rows="1" cols="20">Recherche</textarea></a>
        <a class ="profil" href="#profil">Luc Colin</a>
      </div>
      <div class="main">
          <?php foreach ($themes as $theme): ?>
        <h2><?=$theme['theme']?></h2>
        <div class= "themeFAQ">
            <?php foreach ($donne_faq as $donnee):
            if ($donnee['theme'] == $theme['theme']){?>
            <p><h3><?=$donnee['question'] ?></h3><br><?=$donnee['reponse'] ?><br></p>
            <?php }
           endforeach;?>
        </div>
          <?php endforeach;?>
      </div>
      <div class="footer">
        <a href="CGU.php">CGU</a>  |  <a href="mentionsLegales.php">Mentions Légales</a>  |  <a href="planDuSite.html">Plan du site</a>
      </div>
    </body>
</html>
