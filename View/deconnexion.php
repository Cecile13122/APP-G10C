<?php
session_start();
session_destroy();

?>
<!DOCTYPE html>
<head>
    <meta charset="utf-8" name="viewport"/>
    <link rel="stylesheet" type="text/css" href="styleForm.css"/>
    <link rel="shortcut icon" type="image/x-icon" href="../Images/ATC_v200.png"/>
    <title>Helitest</title>
</head>
<body>
<div class="headerForm">
    <img src="../Images/ATC_v200.png" alt="Logo ATC">
    <h1>Merci pour votre visite</h1>
</div>
<div class="mainForm">
    <p>Vous êtes bien déconnecté.</p>
    <a href="accueil.php" class="button">Revenir à la page d'accueil</a>
</div>
<div class="footerForm">
    <a href="cgu.php">CGU</a> | <a href="mentionsLegales.php">Mentions Légales</a>  |  <a href="planDuSite.php">Plan du site</a>
</div>
</body>


</html>