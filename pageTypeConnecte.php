<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="inscription.css">
    <title>Helitest</title>
</head>
<body>
<p><?= "Bonjour ".$_SESSION['prenom']."  ".$_SESSION['nom'];?></p>
<p>Vous êtes bien connecté</p>
<a href="deconnexion.php">Déconnexion</a>
<br>
<a href="modificationProfil.php">Modifier son profil</a>
<br>
<a href="modificationMdp.php">Modifier son mot de passe</a>
</body>
</html>


