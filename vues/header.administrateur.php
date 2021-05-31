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
      <div class="profil">
        <a class="modif_profil"><h2><?=$_SESSION['prenom']." ". strtoupper($_SESSION['nom'])."</h2>".strtoupper($role)?><br>Mon profil</a>
        <div class = "sous_profil">
          <a href="index.php?cible=utilisateurs&fonction=modification_mdp">Modification mot de passe</a><br>
          <a href="index.php?cible=utilisateurs&fonction=deconnexion">Déconnexion </a><br>
        </div>
      </div>
      <div class="navbar">
        <a href="index.php?cible=faq&fonction=afficher_faq">FAQ</a>
        <div class="header_utilisateurs">
          <a class="modif_header_utilisateurs">Utilisateurs</a>
          <div class="sous_header_utilisateurs">
            <a href="index.php?cible=utilisateurs&fonction=afficher_utilisateurs&role_utilisateur=candidat">Candidats</a><br>
            <a href="index.php?cible=utilisateurs&fonction=afficher_utilisateurs&role_utilisateur=recruteur">Recruteurs</a><br>
            <a href="index.php?cible=utilisateurs&fonction=afficher_utilisateurs&role_utilisateur=administrateur">Administrateurs</a><br>
          </div>
        </div>
        <a href="index.php?cible=utilisateurs&fonction=afficher_page&page=contact">Contact</a>
        <form class="recherche" method="post" action ="index.php?cible=utilisateurs&fonction=recherche">
            <input type="text" name="recherche" placeholder="Recherche" required onchange="verificationNom(this.value, this.id)">
            <button type="submit" class="loupe"><img src="./images/loupe.png" alt="Loupe" class="add"></button>
        </form>
      </div>

    </div>
