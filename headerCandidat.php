<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" name="viewport"/>
    <link type="text/css" rel="stylesheet" href="style.css"/>
    <link rel="shortcut icon" type="image/x-icon" href="ATC_v200.png"/>
    <title>Helitest</title>
</head>
<body>
<nav>
    <img src="ATC_v200.png" alt="Logo ATC">
    <div class="nav"><a href="resultats.html" >Résultats</a></div>
    <div class="nav"><a href="test.html">Test</a></div>
    <div class="nav"><a href="faq.php">FAQ</a></div>
    <div class="nav"><a href="contact.html">Contact</a></div>
    <div class="nav"><input type="text" name="recherche" placeholder="Recherche"><button type="submit" ><img src="loupe.png" alt="Loupe"></button></div>
    <div class="nav"><p><?=$_SESSION['prenom']." ". strtoupper($_SESSION['nom'])?></p><br><a href="deconnexion.php">Se déconnecter</a></div>
</nav>