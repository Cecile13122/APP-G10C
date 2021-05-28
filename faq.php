<?php
require_once('requestsFaq.php');
$faq=recuperation_faq();
$themes= $faq[0];
$donne_faq= $faq[1];

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
    <a href="cgu.php">CGU</a> | <a href="mentionsLegales.php">Mentions Légales</a>  |  <a href="planDuSite.php">Plan du site</a>
</div>
</body>
</html>
