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
        <a href="index.php?cible=faq&fonction=afficher_faq">FAQ</a>
        <!--<div class="profil">
          <a class="modif_profil">Utilisateurs</a>
          <div class="sous_profil">-->
            <a href="index.php?cible=utilisateurs&fonction=afficher_utilisateurs&role_utilisateur=candidat">Candidats</a>
            <a href="index.php?cible=utilisateurs&fonction=afficher_utilisateurs&role_utilisateur=recruteur">Recruteurs</a>
            <a href="index.php?cible=utilisateurs&fonction=afficher_utilisateurs&role_utilisateur=administrateur">Administrateurs</a>
        <!--  </div>
        </div>-->
        <a href="index.php?cible=contact&fonction=afficher_page&page=contact">Contact</a>
        <div class="recherche">
          <input type="text" name="recherche" placeholder="Recherche">
          <button type="submit"><img src="./images/loupe.png" alt="Loupe"></button>
        </div>
      </div>
      <div class="profil">
        <a class="modif_profil"><h2><?=$_SESSION['prenom']." ". strtoupper($_SESSION['nom'])."</h2>".strtoupper($role)?><br>Mon profil</a>
        <div class = "sous_profil">
          <a href="index.php?cible=utilisateurs&fonction=modification_mdp"> Modification mot de passe </a>
          <a href="index.php?cible=utilisateurs&fonction=deconnexion"> Déconnexion </a>
        </div>
      </div>
    </div>
