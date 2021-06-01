<html>
  <head>
    <meta charset="utf-8" name="viewport"/>
    <link type="text/css" rel="stylesheet" href="./vues/style.css"/>
      <link rel="shortcut icon" type="image/x-icon" href="./images/ATC_v200.png"/>
      <script src="./vues/verificationFormulaire.js" type="text/javascript"></script>
    <title>Helitest</title>
  </head>
  <body>
    <div class="header">
      <a href="index.php?cible=utilisateurs&fonction=afficher_page&page=accueil"><img src="./images/ATC_v200.png" alt="Logo ATC"></a>
        <div class="navbar">
            <a href="index.php?cible=test.session&fonction=afficher_resultats">Résultats</a>
            <a href="index.php?cible=test.session&fonction=afficher_sessions">Tests</a>
            <a href="index.php?cible=faq&fonction=afficher_faq">FAQ</a>
            <a href="index.php?cible=utilisateurs&fonction=afficher_page&page=contact">Contact</a>
            <form class="recherche" method="post" action ="index.php?cible=utilisateurs&fonction=recherche">
                <input type="text" name="recherche" placeholder="Recherche" required onchange="verificationNom(this.value, this.id)">
                <button type="submit" ><img src="./images/loupe.png" alt="Loupe"></button>
            </form>
        </div>
      <div class="profil">
        <a href class="modif_profil"><h2><?=$_SESSION['prenom']." ". strtoupper($_SESSION['nom'])."</h2>".strtoupper($_SESSION['role'])?><br>Mon profil</a>
        <div class = "sous_profil">
          <a href="index.php?cible=utilisateurs&fonction=modification_mdp">Modification mot de passe</a>
          <a href="index.php?cible=utilisateurs&fonction=deconnexion">Déconnexion</a>
        </div>
      </div>
    </div>
