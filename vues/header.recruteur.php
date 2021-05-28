<html>
  <head>
    <meta charset="utf-8" name="viewport"/>
    <link type="text/css" rel="stylesheet" href="../vues/style.css"/>
    <title>Helitest</title>
  </head>
  <body>
    <div class="header">
      <a href="index.php?cible=utilisateurs&fonction=accueil"><img src="../images/ATC_v200.png" alt="Logo ATC"></a>
      <div class="profil">
        <a href class="modif_profil"><h2><?=$_SESSION['prenom']." ". strtoupper($_SESSION['nom'])?></h2>Mon profil</a>
        <div class = "sous_profil">
          <a href="index.php?cible=utilisateurs&fonction=modification_profil">Modification profil</a>
          <a href="index.php?cible=utilisateurs&fonction=modification_mdp">Modification mot de passe</a>
          <a href="index.php?cible=utilisateurs&fonction=deconnexion">Déconnexion</a>
        </div>
      </div>
    </div>
    <div class="navbar">
      <a href="index.php?cible=test&fonction=afficher_resultats">Résultats</a>
      <a href="index.php?cible=test.session&fonction=afficher_vierge">Tests</a>
      <a href="index.php?cible=faq&fonction=afficher_faq">FAQ</a>
      <a href="index.php?cible=utilisateurs&fonction=contact">Contact</a>
      <div class="recherche">
        <input type="text" name="recherche" placeholder="Recherche">
        <button type="submit"><img src="../images/loupe.png" alt="Loupe"></button>
      </div>
    </div>
