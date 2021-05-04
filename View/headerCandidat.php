
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" name="viewport"/>
    <link type="text/css" rel="stylesheet" href="styleHeader.css"/>
    <link type="text/css" rel="stylesheet" href="style.css"/>
    <link rel="shortcut icon" type="image/x-icon" href="../Images/ATC_v200.png"/>
    <title>Helitest</title>
</head>
<body>
<nav>
    <img src="../Images/ATC_v200.png" alt="Logo ATC">
    <a href="resultat.php">Résultats</a>
    <a href="faq.php">FAQ</a>
    <a href="contact.php">Contact</a>
    <div class="profil"><a href class="modif_profil"><h2><?=$_SESSION['prenom']." ". strtoupper($_SESSION['nom'])?></h2>Mon profil</a>
    <div class = "sous_profil">
        <a href="modificationProfil.php">Modification profil</a>
        <a href="modificationMdp.php">Modification mot de passe</a>
        <a href="deconnexion.php">Déconnexion</a>
    </div></div>
</nav>
