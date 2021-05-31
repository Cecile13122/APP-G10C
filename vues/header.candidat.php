<html>
  <head>
    <meta charset="utf-8" name="viewport"/>
    <link type="text/css" rel="stylesheet" href="./vues/style.css"/>
      <link rel="shortcut icon" type="image/x-icon" href="./images/ATC_v200.png"/>
    <title>Helitest</title>
  </head>
  <body>
    <div class="header">
      <a href="index.php?cible=utilisateurs&fonction=afficher_page&page=accueil"><img src="./images/ATC_v200.png" alt="Logo ATC"></a>
      <div class="navbar">
        <a href="index.php?cible=test&fonction=resultat">Résultats</a>
        <a href="index.php?cible=faq&fonction=afficher_faq">FAQ</a>
        <a href="index.php?cible=utilisateurs&fonction=afficher_page&page=contact">Contact</a>
      </div>
      <div class="profil">
        <a href class="modif_profil"><h2><?=$_SESSION['prenom']." ". strtoupper($_SESSION['nom'])?></h2><br>Candidat<br>Mon profil</a>
        <div class = "sous_profil">
          <a href="index.php?cible=utilisateurs&fonction=modification_profil">Modification profil</a>
          <a href="index.php?cible=utilisateurs&fonction=modification_mdp">Modification mot de passe</a>
          <a href="index.php?cible=utilisateurs&fonction=deconnexion">Déconnexion</a>
        </div>
      </div>
    </div>
